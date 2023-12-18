$(document).ready(function(){
    $('#allTableInfo').DataTable({
        "paging":true,
        "lengthChange":true,
        "searching":true,
        "ordering":false,
        "info":true,
        "autoWidth":false,
    });
});

//datepicker code start
$(function () {
    $("#myDate").datepicker({
      autoclose: true,
      format:'dd-mm-yyyy',
      todayHighlight: true
    });
  });