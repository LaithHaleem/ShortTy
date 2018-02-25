<?php require 'core/init.php';
IncPart::Inc('inc/parts/header');
IncPart::Inc('inc/parts/navbar');
?>

<!-- Start Short Form Box -->
<div class="container sh-c">
	<div id="errMsg" class="col-lg-7 col-md-10 mr-auto ml-auto" ></div>
	<div class="card col-lg-7 col-md-10 mr-auto ml-auto">
	  <div class="card-body">
	  	<h3 class="card-title text-center">Simple Way To Short Link</h3>
	  	<form action="" method="POST" >
		<div class="input-group col-sm-12">
		  <input type="url" id="linkInput" name="link" class="form-control" placeholder="Put Your Url To Shorting" aria-label="" aria-describedby="basic-addon1">
		  <div class="input-group-prepend" id="pBtn">
		    <button class="btn btn-outline-secondary" id="shrtBtn" type="button" name="short" onclick="request('process.php', 'POST', 'linkInput', 'shrtBtn')"><i class="fas fa-link"></i> Less</button>
		  </div>
		</div>
		</form>
	  </div>
	</div>
</div>
<!-- End Short Form Box -->

<?php IncPart::Inc('inc/parts/footer'); ?>

