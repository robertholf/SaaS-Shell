<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$data = array(
					'content'=>'site/home', 
					'titleseo'=>'Test > TEST Title',
					'titleh1'=>'Test', 
					'titlesub'=>'Testesr asdkljaskdlj  asdjkl asd sdfkjl', 
					'icon'=>'fa-users',
					'class'=>'home',
					);
		$this->load->view('template/template_app',$data);
	}
}
