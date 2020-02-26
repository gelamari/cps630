$(document).ready(function() {
  $('select').on('change', function() {
    var target = $(this).find(":selected").attr("data-target");
    var id = $(this).attr("id");
    $("div[id^='" + id + "']").hide();
    $("#" + id + "-" + target).show();
  });
});