var $this = $('#authfrm'); 
$this.on('submit', function(e) {
	$('#authBtn').attr('disabled', 'disabled');
	var rtyp = window.location.search;
	e.preventDefault();
	var datare = new FormData(this);
		$.ajax({
		method: 'POST',
		url: 'ath.php'+rtyp,
		data: datare,
		processData: false,
		contentType: false,
		error: function(err) {console.log(err)},
		success: function(res) {
			if(res == 0) {
				MsgHandle('Register Successfully!', 'success', 'successhandle');
				redirect('auth.php?a=login');
			}else if(res == 1){
				MsgHandle('Logged Successfully Will Redirect You Now', 'success', 'successhandle');
				redirect('index.php');
			}else {
				MsgHandle(res, 'danger', 'errorhandle');
				$('input[type=password]').val('');
				$('#authBtn').removeAttr('disabled');
			}
		}
	})
})

function redirect(path) {
	setTimeout(function() {
		window.location = path;
	}, 700);
}

function MsgHandle(msg, clss, parent) {
	var tag = "<div class='alert alert-"+clss+"'>"+msg+"</div>";
	$('#'+parent).append(tag);
	$('#'+parent).fadeIn().delay(2000).fadeOut(400, function() {
		$('.alert').remove();
	});
}


