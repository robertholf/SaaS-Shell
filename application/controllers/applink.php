<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AppLink extends CI_Controller {

/************************************************************************/
/* CONSTRUCT															*/


	public function __construct() {
		parent:: __construct();
		// Get Helpers/Library Support
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->library('form_validation');
		// load Breadcrumbs
		$this->load->library('breadcrumbs');
		// Define Model
		$this->load->model("Links");
	}


/************************************************************************/
/* CRUD																	*/


/**
 * This provides the view to list the links
 */
	public function index()
	{

		// Add Breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i>', '/dashboard');
		$this->breadcrumbs->push('SEO', '/seo');
		$this->breadcrumbs->push('Links', '#');

		// Get Search Term & Type
		$searchtype = $this->input->get('searchtype',TRUE);
		$searchterm = $this->input->get('searchterm',TRUE);
			$searchterm_url = !empty($searchterm)|| isset($searchtype) ? "searchterm=". $searchterm : "";
		// Record Count
		$search_count = $this->Links->fetch_link_count($searchterm, $searchtype);

		// Config
		$config = array();
		$config["base_url"] = base_url() . "seo/link?". $searchterm_url;
		$config["total_rows"] = $search_count;
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['query_string_segment'] = "page";
		$config['full_tag_open'] = "<ul class='pagination'>\n";
		$config['full_tag_close'] = "</ul>\n";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>\n";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>\n";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>\n";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>\n";
		$config['first_link'] = "<<";
		$config['prev_link'] = "<strong>Previous</strong>";
		$config['next_link'] = "<strong>Next</strong>";
		$config['last_link'] = ">>\n";

		$this->pagination->initialize($config);

		// Get current page (Default to 1)
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		// Get record offset (Default to 0)
		$first_record = !empty($_GET["page"]) ? $_GET["page"] : 0;

		// Create showing
		$record_start = ( $page == 1 ? 1 : ($page -1) * $config["per_page"] +1 );
		$record_end = ($page * $config["per_page"]);

		// Do not show ackward results
		if ($record_end > $search_count) { 
			$record_end = $search_count;
		}

		if ($search_count == 0) {
			$record_showing = "No records returned.";
		} elseif ($search_count == 1) {
			$record_showing = "Showing 1 record.";
		} else {
			$record_showing = "Showing ". $record_start ." to ". $record_end ." item of ". $search_count;
		}

		$data = $this->Links->fetch_links($searchterm, $searchtype, $config["per_page"], $first_record);
		$count_defunct = $this->Links->fetch_link_deal_defunct_count();

		$atts = array(
					'content'=>'app/seo/link/index', 
					'titleseo'=>'Link Management',
					'titleh1'=>'Link Management', 
					'titlesub'=>'List of opportunities & deals', 
					'icon'=>'fa-link',
					'class'=>'seo linkdeals',
					'breadcrumb'=>$this->breadcrumbs->show(),
					'searchtype'=>$searchtype,
					'searchterm'=>$searchterm,
					'record_showing'=>$record_showing,
					'page'=>$page,
					'data'=>$data,
					'count_defunct'=>$count_defunct,
					'links'=>$this->pagination->create_links(),
					'record_total'=>$search_count,
					);
		$this->load->view('template/template_app',$atts);

	}

/**
 * This provides the view to view the link based on the id
 * @param $id
 */
	public function view($id)
	{
		// Check ID
		if (empty($id) || !is_numeric($id)) {
			show_404();
		}

		// Add Breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i>', '/dashboard');
		$this->breadcrumbs->push('SEO', '/seo');
		$this->breadcrumbs->push('Links', '/seo/link');
		$this->breadcrumbs->push('View', '#');

		// Get Data
		$data = $this->Links->fetch_link($id);
		$data_poc = $this->Links->fetch_link_poc($id);

		// Specify Attributes
		$atts = array(
					'content'=>'app/seo/link/view', 
					'titleseo'=>'View Link Details',
					'titleh1'=>'Link Details for '. $data['url_title'], 
					'titlesub'=>$data['url_root'], 
					'icon'=>'fa-link',
					'class'=>'seo link',
					'breadcrumb'=>$this->breadcrumbs->show(),
					'data'=>$data,
					'data_poc'=>$data_poc,
					);
		$this->load->view('template/template_app', $atts);

	}

/**
 * This provides the view for creating a link
 */
	public function create()
	{

		// Add Breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i>', '/dashboard');
		$this->breadcrumbs->push('SEO', '/seo');
		$this->breadcrumbs->push('Links', '/seo/link');
		$this->breadcrumbs->push('Add', '#');


	}


/**
 * This provides the view to edit the link based on the id
 * @param $id
 */
	public function edit($id)
	{
		// Check ID
		if (empty($id) || !is_numeric($id)) {
			show_404();
		}

		// Add Breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i>', '/dashboard');
		$this->breadcrumbs->push('SEO', '/seo');
		$this->breadcrumbs->push('Links', '/seo/link');
		$this->breadcrumbs->push('Edit', '#');

		$data = $this->Links->fetch_link($id);

		$atts = array(
					'content'=>'app/seo/link/edit', 
					'titleseo'=>'Edit Link Details',
					'titleh1'=>'Link Management for '. $data['url_title'], 
					'titlesub'=>$data['url_root'], 
					'icon'=>'fa-link',
					'class'=>'seo link',
					'breadcrumb'=>$this->breadcrumbs->show(),
					'data'=>$data,
					);
		$this->load->view('template/template_app', $atts);
	}


/**
 * This function will delete the link based on the id
 * @param $id
 */
	public function remove($id) {
		// Remove Link
		$this->db->where('id', $id);
		$this->db->delete('links');
	}


/************************************************************************/
/* DEALS																*/


/**
 * This provides the view to list the link deals
 */
	public function deals()
	{
		// Add Breadcrumbs
		$this->breadcrumbs->push('<i class="fa fa-dashboard"></i>', '/dashboard');
		$this->breadcrumbs->push('SEO', '/seo');
		$this->breadcrumbs->push('Links', '/seo/link');
		$this->breadcrumbs->push('Deals', '#');

		// Get Search Term
		$searchterm = $this->input->get('searchterm',TRUE);
			$searchterm_url = !empty($searchterm) ? "searchterm=". $searchterm : "";
		// Record Count
		$search_count = $this->Links->fetch_link_deal_count($searchterm);

		// Config
		$config = array();
		$config["base_url"] = base_url() . "seo/link/deal?". $searchterm_url;
		$config["total_rows"] = $search_count;
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['query_string_segment'] = "page";
		$config['full_tag_open'] = "<ul class='pagination'>\n";
		$config['full_tag_close'] = "</ul>\n";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>\n";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>\n";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>\n";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>\n";
		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = "</a></li>\n";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>\n";
		$config['first_link'] = "<<";
		$config['prev_link'] = "<strong>Previous</strong>";
		$config['next_link'] = "<strong>Next</strong>";
		$config['last_link'] = ">>\n";

		$this->pagination->initialize($config);

		// Get current page (Default to 1)
		$page = !empty($_GET["page"]) ? $_GET["page"] : 1;
		// Get record offset (Default to 0)
		$first_record = !empty($_GET["page"]) ? $_GET["page"] : 0;

		// Create showing
		$record_start = ( $page == 1 ? 1 : ($page -1) * $config["per_page"] +1 );
		$record_end = ($page * $config["per_page"]);
			// Do not show awkward results
			if ($record_end > $search_count) { 
				$record_end = $search_count;
			}
		$record_showing = "Showing ". $record_start ." to ". $record_end ." item of ". $search_count;

		$data = $this->Links->fetch_link_deals($searchterm, $config["per_page"], $first_record);

		$atts = array(
					'content'=>'app/seo/link/deal', 
					'titleseo'=>'Link Deals',
					'titleh1'=>'Link Deals', 
					'titlesub'=>'List of deals', 
					'icon'=>'fa-link',
					'class'=>'seo linkdeals',
					'breadcrumb'=>$this->breadcrumbs->show(),
					'searchterm'=>$searchterm,
					'record_showing'=>$record_showing,
					'page'=>$page,
					'data'=>$data,
					'links'=>$this->pagination->create_links(),
					'record_total'=>$search_count,
					);
		$this->load->view('template/template_app',$atts);
	}

}