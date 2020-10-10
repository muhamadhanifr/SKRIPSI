<?php 

	session_start();

	//load  kelas

	spl_autoload_register(function($class){
		require_once 'fungsi/'.$class.'.php';	
	});


	$user = new user();
	$fungsiview = new fungsiview();
 ?>