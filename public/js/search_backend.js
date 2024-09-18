$(document).ready(function() {
  $('#searchInput').on('input', function() {
      var query = $(this).val().toLowerCase();

      $('#table tbody tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
      });
  });
});