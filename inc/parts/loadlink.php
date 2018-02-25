<script>
window.onload = function() {

function counter() {
  var timer = 10;
  var interval = setInterval(function() {
    timer--
    $("#discount").html('Wait '+timer+' Sec');
    if (timer === 0) {
      clearInterval(interval);
      $("#discount").html("<a class='shotedlink' href='"+ $('#discount').data('link') +"'>SKIP AD >></a>");
    }
  }, 1000);
}

counter();

};
</script>
                  