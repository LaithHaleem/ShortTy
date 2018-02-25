<?php

 require 'core/init.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$BANList = array('<', '>', '<script', '</', '/', '?');
	$NAME = $_POST['name'];
	$EMAIL = $_POST['email'];
	$oPASS = $_POST['oldpassword'];
	$session = Session::GetSession('u_id');
	if(!in_array($NAME, $BANList) && !in_array($EMAIL, $BANList)) {
		$NAME = filter_var($NAME, FILTER_SANITIZE_STRING);
		$EMAIL = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
		if($NAME == true && $EMAIL == true) {
			if($NAME != '' && $EMAIL != '')
			{

 			$NAME = FillterStr::Clean($_POST['name']);
 			$EMAIL = FillterStr::Clean($_POST['email']);
 			$nPASS = FillterStr::Hash($_POST['newpassword']);
 			$dbInstance = new DB();
 			$get = $dbInstance->Get("users", "WHERE u_id = {$session}");
 			if(password_verify(sha1($oPASS), $get->u_password)) {
 			if($oPASS == '' && $nPASS == '') {
 				$nPASS = $get->u_password;
 			}
			$updating = $dbInstance->Update("users", "u_name = '{$NAME}', u_email = '{$EMAIL}', u_password = '{$nPASS}'", "u_id = {$session}");
				if($updating) {
					$newDetails = array('u_name' => $NAME, 'u_eamil' => $EMAIL);
					echo 1;
				}

 			}else {
 				echo Messages::AuthMsgs('Your Old Password Incorrect!');
 			}

			}else {

			echo Messages::AuthMsgs('Sorry, All Fields Required');

			}

		}else {

		echo Messages::AuthMsgs('There Is An Error Please Try Agin');

		}

	}

	return false;
}