   //color picker with addon
   $('.my-colorpicker2').colorpicker()

   $('.my-colorpicker2').on('colorpickerChange', function(event) {
     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
   })
