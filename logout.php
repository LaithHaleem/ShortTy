<?php
 require 'core/init.php';
 if(isset($_GET['logout']) && $_GET['logout'] == true) {
 	Session::Del('user', 'index.php');
 }