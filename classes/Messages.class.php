<?php
 
 class Messages {
 	public static function AuthMsgs($msg) {
 		return $msg;
 	}

 	public static function ErrRoute($tag, $class, $msg) {
 		echo "<div class='container'>";
 		$str = "<".$tag ." class='".$class."' >". $msg ."</".$tag.">";
 		echo $str;
 		echo "</div>";
 	}

 }