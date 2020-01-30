<?php

namespace MVC\Controllers\Admin;

use MVC\Framework\View;

class AdminController
{
	/**
	 * Returns the index page view
	 * @return type
	 */
	public function index()
	{
		return View::template('admin/index');
	}
}