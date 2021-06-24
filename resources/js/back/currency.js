$(function () {
    $('#currency_list').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#user_list_wrapper .col-md-6:eq(0)');
  });