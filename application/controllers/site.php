<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data = array('
					content'=>'site/home', 
					'titleseo'=>'Test > TEST Title',
					'titleh1'=>'Test', 
					'titlesub'=>'Testesr asdkljaskdlj  asdjkl asd sdfkjl', 
					'icon'=>'fa-users',
					);
		$this->load->view('template/template_app',$data);
	}
}
