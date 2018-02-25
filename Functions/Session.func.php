<?php

 class Session {
 	public static function Set($session, $value) {
 		return $_SESSION[$session] = $value;
 	}

 	public static function Del($session, $goal) {
 		session_unset();
 		session_destroy();
 		Redirect::Head($goal);
 	}

 	public static function Chk($session) {
 		if($_SESSION[$session]) {
 			return true;
 		}
 	}

 	public static function GetSession($session) {
 		return $_SESSION[$session];
 	}
 }