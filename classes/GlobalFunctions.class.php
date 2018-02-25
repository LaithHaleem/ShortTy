<?php
 
 class GlobalFunctions {


 	// Ban Directory Contents
	const BANNAME = array('.', '..');

	// Function To Get Real Files Depend of Path
 	public static function get($path) {
		$dirs = scandir($path);
		foreach($dirs as $dir) {
			if(!in_array($dir, self::BANNAME)) {
				require $path . '/' .$dir;
			}
		}
 	}

 	public static function fDate($date, $style = "") {
 		$norDate = date_create($date);
 		$fdate = date_format($norDate, $style);
 		return $fdate;
 	}

 }