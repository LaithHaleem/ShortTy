$('#uploadFrm').on('change', function() {
  $.ajax({
      url: 'uploadpic.php',
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#overload').css('display', 'flex');
      },
      success: function(data) {
        console.log(data);
        if(data != 0 && data !== 00) {
          $('#u-pic').attr('src', data);
          $('#u-spic').attr('src', data);
        }
        $('#overload').css('display', 'none');
      }
  });
});