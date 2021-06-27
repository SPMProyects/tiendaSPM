$(function () {
    if($('#product_list').length > 0){
        $('#product_list').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
          }).buttons().container().appendTo('#user_list_wrapper .col-md-6:eq(0)');
    }

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });
    
  });