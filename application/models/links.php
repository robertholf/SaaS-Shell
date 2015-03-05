<?php
class Links extends CI_Model
{
	public function __construct() {
		parent::__construct();

		// Load DB
		$this->load->database();
	}

/************************************************************************/
/* LINK TYPES															*/

/**
 * This function queries link types.
 * @return mixed
 */
	public function fetch_link_types() {
		// Sort
		$this->db->order_by('id', 'asc'); 
		// Execute Query
		$query = $this->db->get('link_type');
		// Return Results
		return $query->result();
	}


/**
 * This function looks up a link type title by id.
 * @param int $id
 * @return $title
 */
	public function fetch_link_type($id = 0) {
		// Get Type
		$this->db->select('title'); 
		$this->db->where('id', $id); 
		// Execute Query
		$query = $this->db->get('link_type');
		// Return Results
		return $query->result();
	}


/************************************************************************/
/* LINKS																*/

/**
 * This function counts the number of links for a given search.
 * If no search terms or type is specified counts all records.
 * @param string $searchterm
 * @param int 	 $searchtype
 * @return $count
 */
	public function fetch_link_count($searchterm = NULL, $searchtype = NULL) {
		if ( (isset($searchterm) && !empty($searchterm) ) || ( isset($searchtype) && !empty($searchtype) ) ) {
			if (isset($searchtype) && !empty($searchtype)) {
				$this->db->where('type', $searchtype);
			}
			if (isset($searchterm) && !empty($searchterm)) {
				$this->db->like('url_root', $searchterm, 'both');
				$this->db->or_like('url_title', $searchterm, 'both');
			}
			return $this->db->count_all_results('links');
		} else {
			return $this->db->count_all('links');
		}
	}


/**
 * This function returns the links.
 * If no search terms or type is specified counts all records,
 * Also queries if there is an active contract for the given link.
 * @param string $searchterm
 * @param int 	 $searchtype
 * @param int 	 $limit
 * @param int 	 $start
 * @return mixed
 */
	public function fetch_links($searchterm = NULL, $searchtype = NULL, $limit = 25, $start = 0) {
		// Set Limits
		$this->db->limit($limit, $start);

		if ( (isset($searchterm) && !empty($searchterm) ) || ( isset($searchtype) && !empty($searchtype) ) ) {
			if (isset($searchtype) && !empty($searchtype)) {
				$this->db->where('type', $searchtype);
			}
			if (isset($searchterm) && !empty($searchterm)) {
				$this->db->like('url_root', $searchterm, 'both');
				$this->db->or_like('url_title', $searchterm, 'both');
			}
		}

		// Check if there is a link deal
		$this->db->select('*, (SELECT link_deal.date_contract_end FROM link_deal_links INNER JOIN link_deal ON link_deal.id = link_deal_links.deal_id WHERE link_deal_links.link_id = `links`.id ORDER BY link_deal.date_contract_end DESC LIMIT 0, 1) AS link_deal_expires', false);

		// Execute Query
		$query = $this->db->get('links');

		// Return Results
		return $query->result();
	}


/**
 * This function returns the details of a single link.
 * @param int 	 $id
 * @return mixed
 */
	public function fetch_link($id = 0) {
		if ($id === 0) {
			return false;
		}

		$query = $this->db->get_where('links', array('id' => $id));
		return $query->row_array();
	}


/************************************************************************/
/* LINK DEALS															*/

/**
 * This function identifies how many deals are active.
 * If there is a search term present filter by term.
 * @param int 	 $id
 * @return int
 */
	public function fetch_link_deal_count($searchterm = NULL) {
		// Check Active
		$this->db->where('link_deal.date_contract_start < NOW() 
					AND link_deal.date_contract_end > NOW()');
		// Filter
		if (isset($searchterm) && !empty($searchterm)) {
			$this->db->like('title', $searchterm, 'both');
			return $this->db->count_all_results('link_deal');
		} else {
			return $this->db->count_all_results('link_deal');
		}
	}

/**
 * This function identifies how many accounts are not in good standing.
 * @param int 	 $id
 * @return int
 */
	public function fetch_link_deal_defunct_count() {
		$this->db->select('COUNT(links.id) AS count 
				FROM links 
				INNER JOIN link_deal_links ON link_deal_links.link_id = links.id 
				INNER JOIN link_deal ON link_deal.id = link_deal_links.deal_id 
				WHERE links.mention_url = 0 
					AND link_deal.date_contract_start < NOW() 
					AND link_deal.date_contract_end > NOW()');
		$query = $this->db->get();
		return $query->result();
	}


/**
 * This function identifies if a specific account is not in good standing.
 * @param int 	 $id
 * @return int
 */
	public function fetch_link_deal_defunct_account($id = 0) {
		$this->db->select('COUNT(links.id) AS count 
				FROM links 
				INNER JOIN link_deal_links ON link_deal_links.link_id = links.id 
				INNER JOIN link_deal ON link_deal.id = link_deal_links.deal_id 
				WHERE links.mention_url = 0 
					AND link_deal.date_contract_start < NOW() 
					AND link_deal.date_contract_end > NOW()
					AND link_deal.id = '. $id);
		$query = $this->db->get();
		return $query->result();
	}


/**
 * This function returns the quantity of sites/links in a deal
 * @param int 	 $id
 * @return int
 */
	public function fetch_link_deal_link_count($id = 0) {
		$this->db->where('deal_id', $id);
		$this->db->from('link_deal_links');
		return $this->db->count_all_results();
	}


/**
 * This function looks up the deals for a link $id.
 * @param int 	 $id
 * @return mixed
 */
	public function fetch_link_deal_lookup($id = 0) {
		if ($id === 0) {
			return false;
		}

		$this->db->limit(1, 0);
		$this->db->select('link_deal.*');
		$this->db->join('link_deal_links', 'link_deal_links.deal_id = link_deal.id');
		$this->db->order_by("date_contract_end", "desc");

		$query = $this->db->get_where('link_deal', array('link_deal_links.link_id' => $id));
		return $query->result();
	}


/**
 * This function returns the deals.
 * If no search terms or type is specified counts all deals.
 * @param string $searchterm
 * @param int 	 $searchtype
 * @param int 	 $limit
 * @param int 	 $start
 * @return mixed
 */
	public function fetch_link_deals($searchterm = NULL, $limit = 25, $start = 0) {
		$this->db->limit($limit, $start);

		$this->db->select('*');
		$this->db->where('status', 1);
		if (isset($searchterm) && !empty($searchterm)) {
			$this->db->like('title', $searchterm, 'both');
		}
		$this->db->from('link_deal');

		$query = $this->db->get();
		return $query->result();
	}


/**
 * This function returns the details of a single deal.
 * @param int 	 $id
 * @return mixed
 */
	public function fetch_link_deal($id = 0) {
		if ($id === 0) {
			return false;
		}

		$this->db->select('links.*');
		$this->db->join('link_deal_links', 'link_deal_links.link_id = links.id');
		$this->db->join('link_deal', 'link_deal.id = link_deal_links.deal_id');

		$query = $this->db->get_where('links', array('links.id' => $id));
		return $query->row_array();
	}




/************************************************************************/
/* POINT OF CONTACT														*/

/**
 * This function returns the point of contact(s) for a link.
 * @param int 	 $id
 * @return mixed
 */
	public function fetch_link_poc($id = 0) {
		if ($id === 0) {
			return false;
		}

		$this->db->select('link_poc.*');
		$this->db->join('link_poc_links', 'link_poc_links.poc_id = link_poc.id');
		$this->db->where('link_poc_links.link_id', $id);
		$query = $this->db->get('link_poc');

		return $query->result();
	}




/************************************************************************/
/* LINK OPPORTUNITIES													*/

/**
 * This function returns the count of how many opportunities exist.
 * @return int
 */
	public function fetch_link_opportunity_count() {
		// Execute Query
		$query = $this->db->get_where('links', array('type' => 4));
		// Return Results
		return $this->db->count_all_results();
	}




}