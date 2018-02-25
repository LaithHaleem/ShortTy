<?php

 class GenerateCrypt {

 	private $crptSource = '12df345dh7hj89qASDFGeHJKLQmWERYYUhjIZksXCdfVNM';

 	public function gen($length = 6) {
 		$crypt = $this->crptSource;
	    $charactersLength = strlen($crypt);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $crypt[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
 	} 

 }