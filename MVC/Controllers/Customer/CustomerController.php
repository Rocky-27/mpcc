<?php

namespace MVC\Controllers\Customer;

use MVC\Framework\View;

class CustomerController
{
	/**
	 * Returns the index page view
	 * @return type
	 */
	public function index()
	{
		return View::template('customer/index.php');
	}
}