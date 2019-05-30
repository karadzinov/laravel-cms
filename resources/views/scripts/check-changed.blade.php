<script type="text/javascript">
  $('.btn-change-pw').click(function(event) {
    event.preventDefault();
    $('.pw-change-container').slideToggle(100);
    $(this).find('.fa').toggleClass('fa-times');
    $(this).find('.fa').toggleClass('fa-lock');
    $(this).find('span').toggleText('', 'Cancel');
  });
  $("input").keyup(function() {
    checkChanged(this);
  });
  $("select").change(function() {
    checkChanged(this);
  });
  function checkChanged(el) {
    if(!$(el).val()){
      $(".btn-save").hide();
    }
    else {
      $(".btn-save").show();
    }
  }

</script>