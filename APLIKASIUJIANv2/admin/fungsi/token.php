<?php 

class token{

	public static function generate()
	{
		return session::set('token', md5(uniqid(rand(), true)));
	}

	public static function check($token)
	{
		if ($token == session::get('token') )
			return true;
		else return false;
	}

	public static function generatedata($token)
	{
		return session::set('token',$token);
	}

	public static function checkdata($token)
	{
		if ($token == session::get('token') )
			return true;
		else return false;
	}

}

 ?>