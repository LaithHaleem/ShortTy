var $this = $('#upFrm');
var $upBtn = $this.children('#upBtn');
$this.on('submit', function(e) {
	$upBtn.attr('disabled', 'disabled');
	e.preventDefault();
	var dataUp = new FormData(this);
		$.ajax({
		method: 'POST',
		url: 'update.php',
		data: dataUp,
		processData: false,
		contentType: false,
		error: function(err) {console.log(err)},
		success: function(res) {
			if(res == 1) {
				MsgHandle('Your Details Updated Successfully!', 
					'success', 'successhandle');
				$upBtn.removeAttr('disabled');

			}else {
				MsgHandle(res, 'danger', 'errorhandle');
				$upBtn.removeAttr('disabled');
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

