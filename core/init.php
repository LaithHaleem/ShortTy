<?php
//Start Session
session_start();

//Global Current Path
$CUR_PATH = $_SERVER['DOCUMENT_ROOT'];

//Require All Classes
spl_autoload_register(function($class){
	require 'classes/' . $class . '.class.php';
});

//Dynamic Function To Require All Function
GlobalFunctions::get('Functions');



