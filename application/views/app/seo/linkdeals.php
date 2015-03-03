<?php


foreach ($query->result() as $row)
{
	echo $row->url_root."<br />";
}

echo 'Total Results: ' . $query->num_rows();

?>