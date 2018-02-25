<?php

 class Routing {

 	public static function Route($path, $part, $parent) {
 		$dir = scandir($path);
 		$part = $part . '.' . $parent . '.php';
 		if(in_array($part, $dir)) {
 			require $path . '/' . $part;
 		}else {
 			Messages::ErrRoute('div', 'alert alert-warning', 'Opps!! Page Not Found');
 		}
 	}
 }