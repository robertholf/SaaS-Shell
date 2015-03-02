<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$data = array(
					'content'=>'auth/login', 
					'titleseo'=>'Login',
					'titleh1'=>'Login', 
					'titlesub'=>'', 
					'icon'=>'fa-users',
					'class'=>'login',
					);
		$this->load->view('template/template_auth',$data);
	}
}
