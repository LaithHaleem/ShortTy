<?php

 class IncPart {
 	public static function Inc($path) {
 		$ReallPath = $CUR_PATH . $path . '.php';
 		if($ReallPath) {
 			require $ReallPath;
 		}
 		return self;
 	}
 }