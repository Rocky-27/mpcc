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

	/**
	 * Returns a notes page for the project
	 * @return type
	 */
	public function notes()
	{
		return View::template('pages/notes');
	}
}