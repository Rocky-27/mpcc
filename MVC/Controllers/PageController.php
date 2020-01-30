<?php

namespace MVC\Controllers;

use MVC\Framework\View;

class PageController
{
	/**
	 * Returns the index page view
	 * @return type
	 */
	public function index()
	{
		return View::template('pages/index');
	}
}