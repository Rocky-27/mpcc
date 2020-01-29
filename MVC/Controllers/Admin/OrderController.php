<?php

namespace MVC\Controllers\Admin;

use MVC\Framework\View;

class OrderController
{
	/**
	 * Returns the upload form view
	 * @return type
	 */
	public function uploadForm()
	{
		return View::template('admin/upload.php');
	}

	public function store()
	{	
		//
	}
}