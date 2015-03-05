<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$route['default_controller'] = 'site';

/*
 * Site
 */

	// About
	$route['about'] = 'site/about';
	// Pricing
	$route['pricing'] = 'site/pricing';
	// Contact
	$route['contact'] = 'site/contact';


/*
 * Auth
 */

	// Login
	$route['login'] = 'auth/login';
	$route['logout'] = 'auth/logout';
	// Errors
	$route['404_override'] = 'errors/error_404';


/*
 * App
 */

	$route['dashboard'] = 'app/dashboard';
	// SEO
	$route['seo'] = 'app/seo_dashboard';
	$route['seo/link'] = 'applink/link';
	$route['seo/link/(:num)'] = 'applink/link/$i';
	$route['seo/link/deal'] = 'applink/deals';

	// Links
	$route['seo/link/create'] = 'applink/create';
	$route['seo/link/(:any)/view'] = 'applink/view/$1';
	$route['seo/link/(:any)/edit'] = 'applink/edit/$1';
	$route['seo/link/(:any)/completed'] = 'applink/completed/$1';
	$route['seo/link'] = 'applink/index';


/*
 * SaaS SDK
 */

	$route['switch/(:num)'] = 'welcome/switch_company/$1';
