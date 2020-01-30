<?php

namespace MVC\Framework;

class View
{
	/**
	 * Returns the layout view and optionally assigns an array of variables to pass to the views
	 * @param string $template 
	 * @param array|array $variables 
	 * @return type
	 */
	public static function template(string $template, array $variables = [])
	{
		$template = $template.'.php';

		if(! is_file(__DIR__.'/../Views/'.$template)){
			throw new \Exception('View not found at path '.$template);
		}

		foreach($variables AS $key => $variable){
			$$key = $variable;
		}

		require __DIR__.'/../Views/layout.php';
		exit;
	}
}