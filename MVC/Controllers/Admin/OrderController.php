<?php

namespace MVC\Controllers\Admin;

use MVC\Framework\View;
use MVC\Models\Order;

class OrderController
{
	/**
	 * Returns the index view for all orders
	 * @return type
	 */
	public function index()
	{
		return View::template('admin/orders/index');
	}

	/**
	 * Returns the upload form view
	 * @return type
	 */
	public function uploadForm()
	{
		return View::template('admin/upload');
	}

	/**
	 * Stores newly submitted form data
	 * @return type
	 */
	public function store()
	{	
		$name = $_FILES["upload"]["name"];
		$segments = explode('.', $name);
		$ext = end($segments);
		$method = strtoupper($ext);

		$path = __DIR__.'/../../../storage/uploads/latest_import.'.$ext;
		move_uploaded_file($_FILES['upload']['tmp_name'], $path);
		$data = $this->{'parse'.$method}($path);

		return View::template('admin/upload-confirm', ['data' => $data, 'path' => $path]);
	}

	/**
	 * Confirms the data import after the user has approved the preview
	 * @return type
	 */
	public function storeConfirm()
	{	
		$path = $_POST['path'];
		$segments = explode('.', $path);
		$ext = end($segments);
		$method = strtoupper($ext);

		$data = $this->{'parse'.$method}($path);
		$order = new Order;
		$storeData = $order->normalise($data);

		return header('Location:/admin/orders');

	}

	/**
	 * Returns an array of data parsed from a CSV
	 * @param type $file 
	 * @return type
	 */
	public function parseCSV($file)
	{
		$rows = array_map('str_getcsv', file($file));
		$map = [];
		$data = [];

		foreach($rows[0] AS $header){
			$map[] = $header;
			unset($rows[0]);
		}

		foreach($rows AS $rowKey => $row){
			foreach($row AS $key => $value)
			$data[$rowKey][$map[$key]] = $value;
		}

		return $data;
	}

	/**
	 * For reference this method could be used is an xlsx file was uploaded
	 * @param type $xlsx 
	 * @return type
	 */
	public function parseXLSX($xlsx)
	{
		throw new \Exception('Currently only CSV files are acceptaed. XLSX will be supported in an upcoming release.');
		
	}

	/**
	 * For reference this method could be used is an xls file was uploaded
	 * @param type $xls 
	 * @return type
	 */
	public function parseXLS($xls)
	{
		throw new \Exception('Currently only CSV files are acceptaed. XLS will be supported in an upcoming release.');
	}
}