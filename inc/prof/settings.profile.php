<?php

	if(Session::Chk('user') == true && Session::Chk('u_id') == true) {
		$session = Session::GetSession('u_id');
		$dbInstance = new DB();
		$getInfo = $dbInstance->Get("users", "WHERE u_id = '".$session ."'");
	}else {
	    Messages::ErrRoute('div', 'alert alert-warning', 'Opps!! Page Not Found');
	    die();
	    exit();
	}
?>
<div class="container">
	<div class="row">
		<div class="profile-img">
			<span id="overload" class="overload text-center">
				<img src="assets/imgs/loader.gif" alt="">
			</span>
				<?php 
				if($getInfo->u_pic == '') {
				?>
				<img id="u-pic" src="users/def/u_def.png" class="img-p" alt="">
				<?php
				 }else {
				?>
				<img id="u-pic" src="<?php echo $getInfo->u_pic; ?>" class="img-p" alt="">
				<?php  } ?>
			<form id="uploadFrm">
			<input type="file" id="pic" name="pics" class="img-in">
			</form>
			<i class="fas fa-camera"></i>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<div id="errorhandle" class="col-sm-12 col-lg-6 mr-auto ml-auto" style="display: none"></div>
	  		<div id="successhandle" class="col-sm-12 col-lg-6 mr-auto ml-auto" style="display: none"></div>
	  	</div>
		<form id="upFrm" class="sett-form col-sm-12 col-lg-6 mr-auto ml-auto">
		  <div class="form-group">
		    <input type="text" class="form-control" id="name" placeholder="Your Name" value="<?php echo $getInfo->u_name; ?>" name="name">
		  </div>
		  <div class="form-group">
		    <input type="email" class="form-control" id="email" placeholder="Your Email" value="<?php echo $getInfo->u_email; ?>" name="email">
		  </div>
		  <div class="form-group">
		    <input type="password" class="form-control" id="oldpassword" placeholder="Current Password" name="oldpassword">
		  </div>
		  <div class="form-group">
		    <input type="password" class="form-control" id="newpassword" placeholder="New Password" name="newpassword">
		  </div>
		  <button id="upBtn" type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>