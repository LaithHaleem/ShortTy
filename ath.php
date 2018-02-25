<?php
 require 'core/init.php';
 if(isset($_GET['a']) && $_GET['a'] == 'register') {
 	if($_SERVER['REQUEST_METHOD'] == "POST") {
 		$BANList = array('<', '>', '<script', '</', '/', '?');
 		$NAME = $_POST['name'];
 		$EMAIL = $_POST['email'];
 		$PASS = $_POST['password'];

 		if(!in_array($NAME, $BANList) && !in_array($EMAIL, $BANList)) {
 			$NAME = filter_var($NAME, FILTER_SANITIZE_STRING);
 			$EMAIL = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
 			if($NAME == true && $EMAIL == true) {
 				if($NAME != '' && $EMAIL != '' && $PASS != '') {

		 			$NAME = FillterStr::Clean($_POST['name']);
		 			$EMAIL = FillterStr::Clean($_POST['email']);
		 			$PASS = FillterStr::Hash($_POST['password']);
		 			$dbInstance = new DB();
		 			$get = $dbInstance->Get("users", "WHERE u_email = '{$EMAIL}'");
		 			if($get->u_email !== $EMAIL) {
			 			$stmt = $dbInstance->Insert("users", array(
			 				'u_name'  		=> $NAME,
			 				'u_email' 		=> $EMAIL,
			 				'u_password'	=> $PASS
			 			));

			 			if($stmt) {
			 				echo 0;
			 			}

		 			}else {
		 				echo Messages::AuthMsgs('This Email Already Exists');
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

 }else if(isset($_GET['a']) && $_GET['a'] == 'login') {

 	if($_SERVER['REQUEST_METHOD'] == "POST") {
 		$BANList = array('<', '>', '<script', '</', '/', '?');
 		$EMAIL = $_POST['email'];
 		$PASS = $_POST['password'];

 		if(!in_array($EMAIL, $BANList)) {
 			$EMAIL = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
 			if($EMAIL == true) {
 				if($EMAIL != '' && $PASS != '') {
		 			$EMAIL = FillterStr::Clean($_POST['email']);
		 			$PASS = $_POST['password'];
		 			$dbInstance = new DB();
		 			$get = $dbInstance->Get("users", "WHERE u_email = '{$EMAIL}'");
		 			if(password_verify(sha1($PASS), $get->u_password)) {
						if($get->u_email == $EMAIL) 
			 			{

							Session::Set('user', $EMAIL);
							Session::Set('u_id', $get->u_id);
			 				echo 1;

			 			}

		 			}else {
		 				echo Messages::AuthMsgs('Your Details is Incorrect!');
		 			}

 				}else {

 				echo Messages::AuthMsgs('Sorry, All Fields Required');

 				}

 			}else {

 			echo Messages::AuthMsgs('Your Details is Incorrect!');

 			}

 		}

 		return false;
 	}

 }