<?php
 require_once 'core/init.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

	 	$dataInstance = new DB();
	 	$cryptInstance = new GenerateCrypt();
	 	$cryptCode = $cryptInstance->gen();
	 	$orgLink = $_POST['link'];
	 	if(FillterStr::CleanUrl($orgLink)) {
		 	$u_id = null;
		 	if(Session::Chk('u_id')) {
		 		$u_id = Session::GetSession('u_id');
		 	}else {
		 		$u_id = '';
		 	}

		 	$stmt = $dataInstance->Insert("links", array('crpt_code' => $cryptCode, 'org_link' => $orgLink, 'user_id' => $u_id));

		 	if($stmt) {
		 		echo 'http://localhost/Shortty/' . $cryptCode;
		 		return true;
		 	}
		}else {
			return false;
		}

	 }else {
			return false;
	 }