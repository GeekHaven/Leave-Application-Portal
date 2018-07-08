$(function() {
  $("#datepicker")
    .datepicker({
      autoclose: true,
      todayHighlight: true
    })
    .datepicker("update", new Date());
});

$(function() {
  $("#datepicker1")
    .datepicker({
      autoclose: true,
      todayHighlight: true
    })
    .datepicker("update", new Date());
});
