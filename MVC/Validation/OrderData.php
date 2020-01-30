<?php

namespace MVC\Validation;

class OrderData extends Validate
{
	/**
	 * Returns a properly formatted Order ID - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function order_id($value)
	{
		$this->length('Order ID', $value, 8);
		return $value;
	}

	/**
	 * Returns a properly formatted First Name - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function first_name($value)
	{
		$this->length('First Name', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Last Name - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function last_name($value)
	{
		$this->length('Last Name', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Address Line 1 - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function address_line_1($value)
	{
		$this->length('Address Line 1', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Address Line 2 - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function address_line_2($value)
	{
		$this->length('Address Line 2', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted City - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function city($value)
	{
		$this->length('City', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted County - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function county($value)
	{
		$this->length('County', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Country - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function country($value)
	{
		$this->length('Country', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Postcode - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function post_code($value)
	{
		$this->length('Post Code', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Contact Number - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function contact_number($value)
	{
		$this->length('Contact Number', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Email Address - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function email_address($value)
	{
		$this->email('Email Address', $value);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Product Title - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function product_title($value)
	{
		$this->length('Product Title', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Product SKU - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function product_sku($value)
	{
		$this->length('Product SKU', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Product Image - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function product_image($value)
	{
		$pos = strpos($value, 'myperfectcosmeticscompany.co.uk');
		$value = 'https://'.substr($value, $pos);

		$this->url('Product Image', $value, 255);
		return $value;
	}
	
	/**
	 * Returns a properly formatted Product Price - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function product_price($value)
	{
		$value = preg_replace('/[^0-9.]/', '', $value);
		$this->price('Product Price', $value);
		$this->length('Product Price', $value, 11);
		$this->required('Product Price', $value);

		return $value;
	}

	/**
	 * Returns a properly formatted Type - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function type($value)
	{
		$this->length('Type', $value, 255);
		return $value;
	}

	/**
	 * Returns a properly formatted Payment Method - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function payment_method($value)
	{
		$this->length('Payment Method', $value, 255);
		return $value;
	}

	/**
	 * Returns a properly formatted Order Date - throws an exception if validation rules are not passed
	 * @param type $value 
	 * @return type
	 */
	public function order_date($value)
	{	
		list($dd,$mm,$yyyy) = explode('/', $value);
		$value = $yyyy.'-'.$mm.'-'.$dd;
		$this->date('Order Date', $value);
		
		return $value;
	}

	/**
	 * Returns an array of fields that can be accepted during a data upload and their accepted formats
	 * @return type
	 */
	public static function fieldFormats()
	{
		return [
			'Order ID' => [
				'header' => 'Order ID',
				'format' => 'Must be a string no longer than 10 characters',
			],
			'First Name' => [
				'header' => 'First Name',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Last Name' => [
				'header' => 'Last Name',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Address Line 1' => [
				'header' => 'Address Line 1',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Address Line 2' => [
				'header' => 'Address Line 2',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'City' => [
				'header' => 'City',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'County' => [
				'header' => 'County',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Country' => [
				'header' => 'Country',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Postcode' => [
				'header' => 'Postcode',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Contact Number' => [
				'header' => 'Contact Number',
				'format' => 'Must be a integer no longer than 30',
			],
			'Email Address' => [
				'header' => 'Email Address',
				'format' => 'Must be a string no longer than 255 characters and contact at least one @ symbol and a \'.\' afterwards',
			],
			'Product Title' => [
				'header' => 'Product Title',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Product SKU' => [
				'header' => 'Product SKU',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Product Image' => [
				'header' => 'Product Image',
				'format' => 'Must be a fully qualified URL',
			],
			'Product Price' => [
				'header' => 'Product Price',
				'format' => 'Must be a string, integer or decimal no longer than 11 characters and may optionally contain a £ symbol',
			],
			'Product Type' => [
				'header' => 'Product Type',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Payment Method' => [
				'header' => 'Payment Method',
				'format' => 'Must be a string no longer than 255 characters',
			],
			'Order Date' => [
				'header' => 'Order Date',
				'format' => 'Must be a date string in the format dd/mm/yyyy',
			],
		];
	}
}