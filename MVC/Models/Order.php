<?php

namespace MVC\Models;

use MVC\Validation\OrderData;
use MVC\Framework\DB;
use MVC\Framework\View;

class Order
{
	protected $columns = [
		'order_id', 'first_name', 'last_name', 'address_line_1', 'address_line_2', 'city', 'county', 'country', 'post_code', 'contact_number', 'email_address', 'product_title', 'product_sku', 'product_image', 'product_price', 'type', 'payment_method', 'order_date',
	];

	/**
	 * Loops through an array to normalise all the data before creating or updating a record
	 * @param type $data 
	 * @return type
	 */
	public function normalise(array $data)
	{
		$store = [];

		foreach($data AS $rowKey => $row){
			foreach($row AS $key => $value){
				try{
					$method = strtolower(str_replace([' ','-'],'_',$key));
					$validate = new OrderData;

					if(! method_exists($validate, $method)){
						$error = $key.' is an unrecognised field. Please check the header row of the file you uploaded and try again.';
						return View::template('admin/upload-error', ['error' => $error]);
					}

					$store[$rowKey][$method] = $validate->{$method}($value);
				} catch(\Exception $e){
					return View::template('admin/upload-error', ['error' => $e->getMessage()]);
				}
			}
		}

		$db = new DB;
		$db->updateOrCreate('orders', $store, $this->columns);

		return true;
	}

	/**
	 * Returns all results in the orders table
	 * @return type
	 */
	public static function all()
	{
		$db = new DB;
		return $db->query('SELECT * FROM `orders`');
	}

	/**
	 * Returns all unique order ids in the orders table
	 * @return type
	 */
	public static function ids()
	{
		$db = new DB;
		return $db->query('SELECT order_id FROM `orders` GROUP BY order_id');
	}

	/**
	 * Returns all orders with a given order_id id in the orders table
	 * @return type
	 */
	public static function id($id)
	{
		$db = new DB;
		return $db->query('SELECT * FROM `orders` WHERE `order_id` = "'.$id.'"');
	}

	/**
	 * Calculates the total value of a given order
	 * @return type
	 */
	public static function totalValue($id)
	{
		$total = 0;

		$db = new DB;
		$orders = $db->query('SELECT `product_price` FROM `orders` WHERE `order_id` = "'.$id.'"');

		foreach($orders AS $order){
			$total = $total + $order->product_price;
		}

		return $total;
	}
}
