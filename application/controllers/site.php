<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {


/*
 * Homepage
 */
	public function index()
	{
		$data = array(
					'content'=>'site/home', 
					'titleseo'=>'SEO Toolkit',
					'titleh1'=>'SEO Toolkit', 
					'titlesub'=>'', 
					'icon'=>'fa-users',
					'class'=>'home',
					);
		$this->load->view('template/template_site',$data);
	}


/*
 * About
 */
	public function about()
	{
		$data = array(
					'content'=>'site/about', 
					'titleseo'=>'About',
					'titleh1'=>'', 
					'titlesub'=>'', 
					'icon'=>'fa-users',
					'class'=>'about',
					);
		$this->load->view('template/template_site',$data);
	}


/*
 * Pricing
 */
	public function pricing()
	{
		$data = array(
					'content'=>'site/pricing', 
					'titleseo'=>'Pricing',
					'titleh1'=>'Select your plan', 
					'titlesub'=>'', 
					'icon'=>'fa-users',
					'class'=>'pricing',
					);
		$this->load->view('template/template_site',$data);
	}


/*
 * Contact
 */
	public function contact()
	{
		$data = array(
					'content'=>'site/contact', 
					'titleseo'=>'Contact Us',
					'titleh1'=>'We\'d Love to Hear From You!', 
					'titlesub'=>'', 
					'icon'=>'fa-users',
					'class'=>'contact',
					);
		$this->load->view('template/template_site',$data);
	}


}
