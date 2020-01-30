<?php

namespace MVC\Validation;

class Validate
{
	/**
	 * Validates a given string to a given length
	 * @param string $field 
	 * @param string $value 
	 * @param int $length 
	 * @return type
	 */
	protected function length(string $field, string $value, int $length)
	{
		if(strlen($value) > $length){
			throw new \Exception($field.' must be less than or equal to '.$length.' characters - '.strlen($value).' detected in string "'.$value.'".');
		}

		return true;
	}

	/**
	 * Validates an email address
	 * @param string $field 
	 * @param string $value 
	 * @return type
	 */
	protected function email(string $field, string $value)
	{
		if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
			throw new \Exception($field.' must be a valid email address ('.$value.' is not valid)');
		}
		return true;
	}

	/**
	 * Validates a URL
	 * @param string $field 
	 * @param string $value 
	 * @return type
	 */
	protected function URL(string $field, string $value)
	{
		if (! filter_var($value, FILTER_VALIDATE_URL)) {
			throw new \Exception($field.' must be a valid URL ('.$value.' is not valid)');
		}
		return true;
	}

	/**
	 * Vaidates a price
	 * @param string $field 
	 * @param type $value 
	 * @return type
	 */
	protected function price(string $field, $value)
	{
		if(! (is_float($value) || ! is_int($value))){
			throw new \Exception($field.' must be a valid integer or decimal ('.$value.' is not valid)');
		}

		return true;
	}

	/**
	 * Validates a field that must contain data
	 * @param string $field 
	 * @param type $value 
	 * @return type
	 */
	protected function required(string $field, $value)
	{
		if(empty($value)){
			throw new \Exception($field.' is a required field and cannot be empty');
		}

		return true;
	}

	protected function date(string $field, string $value)
	{
		list($yyyy,$mm,$dd) = explode('-', $value);

		if (! checkdate($mm,$dd,$yyyy)) {
			throw new \Exception($field.' must be provided in the format dd/mm/yyy - ('.$value.' is not valid)');
		}

		return true;
	}
}