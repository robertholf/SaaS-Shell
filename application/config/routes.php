<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$route['default_controller'] = "site";

/*
 * Site
 */

	//$route['/'] = "site/home";
	// About
	$route['about'] = "site/about";
	// Pricing
	$route['pricing'] = "site/pricing";
	// Contact
	$route['contact'] = "site/contact";


/*
 * Auth
 */

	// Login
	$route['login'] = "auth/login";
	$route['logout'] = "auth/logout";
	// Errors
	$route['404_override'] = 'errors/error_404';


/*
 * App
 */

	$route['dashboard'] = "app/index";


/*
 * SaaS SDK
 */

	$route['switch/(:num)'] = "welcome/switch_company/$1";
