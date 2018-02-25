<?php
 require 'core/init.php';
 $session = $_SESSION['user'];
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pics']) && !empty($_FILES['pics']))
 {
 	$PicName = $_FILES['pics']['name'];
 	$PicSize = $_FILES['pics']['size'];
 	$PicTemp = $_FILES['pics']['tmp_name'];

 	$upInstance = new UploadPic();

 	$upInstance->ImgProcess($PicName, $PicSize, $PicTemp, 'users', $session);
 	
 }