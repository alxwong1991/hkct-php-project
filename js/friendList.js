$(document).ready(function () {
    $("#filter-input").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#card div").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });