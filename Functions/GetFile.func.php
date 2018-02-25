<?php

 class GetFile {
 	// Ban Directory Contents
	const BANNAME = array('.', '..');

	// Function To Get Directory Type Depend of Path
	protected function getDirType($dir) {
		$dirType = end(explode('/', $dir));
		return $dirType;
	}

	// Function To Get Real Files Depend of Path
 	public static function get($path) {
		$dirs = scandir($path);
		foreach($dirs as $dir) {
			if(!in_array($dir, self::BANNAME)) {
				if(self::getDirType($path) == 'css') {
					echo "<link rel='stylesheet' href='". $path ."/". $dir ."'>\n\r";
				}elseif(self::getDirType($path) == 'js') {
					echo "<script src='". $path ."/". $dir ."'></script>\n\r";
				}
			}
		}
 	}

 }

 



















