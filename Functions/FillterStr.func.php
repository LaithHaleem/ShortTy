<?php

 class FillterStr {
 
  public static function Clean($str) {
    	$string = strip_tags($str);
    	$string = htmlentities(stripslashes($string));
    	return $string;
  }


  public static function Hash($str) {
    	$pass = sha1($str);
    	$password = password_hash($pass, PASSWORD_DEFAULT);
    	return $password;
  }

  public static function CleanUrl($url) {
      $httpStr = explode(':', $url);
        if($httpStr[0] == 'http' || $httpStr[0] == 'https') {
            $vUrl = filter_var($url, FILTER_VALIDATE_URL);
            if($vUrl) {
              return $vUrl;
            }
        }
  }

 }