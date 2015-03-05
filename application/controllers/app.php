<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

/*
 * General
 */
	public function dashboard()
	{

		$data = array(
					'content'=>'app/dashboard', 
					'titleseo'=>'Dashboard',
					'titleh1'=>'Dashboard', 
					'titlesub'=>'Toolbox', 
					'icon'=>'fa-users',
					'class'=>'dashboard',
					);
		$this->load->view('template/template_app',$data);
	}

/*
 * SEO
 */
	// Dashboard
	public function seo_dashboard()
	{

		$data = array(
					'content'=>'app/seo/dashboard', 
					'titleseo'=>'SEO Dashboard',
					'titleh1'=>'SEO Dashboard', 
					'titlesub'=>'Search Engine Optimization', 
					'icon'=>'fa-users',
					'class'=>'seo-dashboard',
					);
		$this->load->view('template/template_app',$data);
	}



}