
    // Function To Make Shorting Request
	function request(url, method, ele, click = null) {
		var fd = $('#'+ele).val();
		$.ajax({
			type: method,
			url: url,
			data: {"link": fd},
			error: function(err) {console.log(err)},
			success: function(res) {
				if(res == false) {
					MsgHandle('Your Input Link Invalid','danger', 'errMsg');
					return false;
				}else {
					console.log(res);
					$('#'+ele).val(res);
					$('#'+click).attr('id', 'copy')
					.attr('onclick', 'copyLink("linkInput", "copy")')
					.html('<i class="fas fa-copy"></i> Copy');
				}
			}
		})
	}

	// Function Make Copy Short Link Text
	function copyLink(element, click) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($('#'+element).val()).select();
	  document.execCommand("copy");
	  $temp.remove();
	  $('#'+element).val('');
	  $('#'+click).attr('id', 'shrtBtn')
	  .attr('onclick', 
	  	"request('process.php', 'POST', 'linkInput', 'shrtBtn')")
	  .html('<i class="fas fa-link"></i> Less');
	}


	$('.delBtn').click(function() {
		var $this = $(this);
		var link = $this.data('link');
		$.ajax({
			type: 'POST',
			url: 'dellink.php',
			data: {"link": link},
			success: function(res) {
				if(res == 1) {
					$('.index').each(function(){
					if($(this).data('in') > $this.data('index')) {
						$(this).text($(this).text() - 1);
					}
					});
					$('#row-'+link).remove();
				}
				
			}
		})
	});



