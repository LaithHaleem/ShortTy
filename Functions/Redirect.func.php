<?php

 class Redirect {
 	public static function Head($path) {
 		header("Location: {$path}");
 		die();
 		exit();
 	}
 }