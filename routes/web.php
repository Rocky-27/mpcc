<?php

$route 	= $_SERVER['REQUEST_METHOD'].'Methods';
$uri 	= rtrim(strtok($_SERVER["REQUEST_URI"],'?'),'/');


$GETMethods = [
	''		 => [
		'uses'			=> 'PageController',
		'method'		=> 'index',
		'middleware'	=> [],
	],
	'/admin' => [
		'uses' 			=> 'Admin\AdminController',
		'method'		=> 'index',
		'middleware' 	=> ['Admin'],
	],
	'/admin/logout' => [
		'uses' 			=> 'Admin\AdminController',
		'method'		=> 'logout',
		'middleware' 	=> ['Admin'],
	],
	'/admin/orders' => [
		'uses' 			=> 'Admin\OrderController',
		'method'		=> 'index',
		'middleware' 	=> ['Admin'],
	],
	'/admin/upload' => [
		'uses' 			=> 'Admin\OrderController',
		'method'		=> 'uploadForm',
		'middleware' 	=> ['Admin'],
	],
];

$POSTMethods = [
	'/admin/login' => [
		'uses' 			=> 'Admin\AdminController',
		'method'		=> 'login',
		'middleware' 	=> ['Admin', 'XSS'],
	],
	'/admin/store' => [
		'uses' 			=> 'Admin\OrderController',
		'method'		=> 'store',
		'middleware' 	=> ['Admin','XSS'],
	],
	'/admin/store/confirm' => [
		'uses' 			=> 'Admin\OrderController',
		'method'		=> 'storeConfirm',
		'middleware' 	=> ['Admin','XSS'],
	],
];

if(isset($$route) && is_array($$route)){
	if(! isset($$route[$uri])){
		throw new Exception($_SERVER['REQUEST_METHOD'].' route has not been defined for '.$uri);
	}

	foreach($$route[$uri]['middleware'] AS $middleware){
		$middleware = 'MVC\Middleware\\'.$middleware;
		$validate = new $middleware;
		$validate->validate();
	}

	$uses = 'MVC\Controllers\\'.$$route[$uri]['uses'];
	$controller = new $uses;
	return $controller->{$$route[$uri]['method']}();
}


