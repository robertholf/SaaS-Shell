<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data = array('content'=>'site/home');
		$this->load->view('template/template_app',$data);
	}
}
