<?php

 class UploadPic {

 	private $imgName,
 			$ImgSize,
 			$imgTemp,
 			$imgExAllow,
 			$imgSeizAllow = 200001;

 	protected function Mkdir($user) {
 		$path = 'users/imgs/'. $user;
 		if(!file_exists($path)) {
 			mkdir($path);
 		}
 	}


 	public function ImgProcess($imgName, $imgSize, $tempName, $table,  $session) {
 		$this->imgName = $imgName;
 		$this->imgExAllow = array('jpg', 'png', 'ttf', 'jpeg');
 		$this->ImgSize = $imgSize;
 		$this->imgSeizAllow = 200001;
 		$ImgEx = end(explode('.', $this->imgName));
 		if(in_array($ImgEx, $this->imgExAllow) && $this->ImgSize < $this->imgSeizAllow)
 		{
 				$this->Mkdir($session);
	 			$cryptInstance = new GenerateCrypt();
 				$crptCode = $cryptInstance->gen(20);
 				$newImgName = $crptCode . '-'. $session . '.' . $ImgEx;
 				$pathImg = 'users/imgs/' . $session . '/' . $newImgName;

				if(move_uploaded_file($tempName, $pathImg)) {
					$db_inctance = new DB();
					$query = $db_inctance->G_query("UPDATE {$table} SET u_pic = '{$pathImg}' WHERE u_email = '{$session}'")->row;
					if($query == 1) {
						echo $pathImg;
					}
					
				}else {
					echo 00;
				}
 			
 		}else {

 			echo 0;
 		}

 	}


 }