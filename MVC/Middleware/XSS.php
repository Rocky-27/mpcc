<?php

namespace MVC\Middleware;

class XSS
{
	public function validate()
	{
		if(1==1){
			return true;
		}
		
		throw new \Exception("Error Processing Request");
	}
}