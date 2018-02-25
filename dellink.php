<?php
require 'core/init.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

	if(Session::Chk('user') == true && Session::Chk('u_id') == true) {
		 $link = trim($_POST['link']);
		 $dbInstance = new DB();
		 $row = $dbInstance->Delete("links", $link);
		 if($row > 0) {
		 	echo 1;
		 }
	}

}