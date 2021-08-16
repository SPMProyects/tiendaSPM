//Functions
$(function () {

    function addDinamicEvent(elementAdd, eventAdd, functionAdd){

        $(elementAdd).off();
        $(elementAdd).on(eventAdd, functionAdd)

    }

    function addCondictionSelects(){
        
        $(this).parent().siblings('#criterion_row').removeClass('d-none');
        $(this).parent().siblings('#criterion_row > #criterion > option[id=baseCriterio]').attr('selected', true);
        if($(this).val() != 'cart'){
            //Mostrar las opciones correctas de criterio

            $(this).parent().siblings('#criterion_row').children('#criterion').children('#lower').hide()
            $(this).parent().siblings('#criterion_row').children('#criterion').children('#higher').hide()
            $(this).parent().siblings('#criterion_row').children('#criterion').children('#equal').show()
            $(this).parent().siblings('#criterion_row').children('#criterion').children('#different').show()

            //Ocultar el campo valor
            $(this).parent().siblings('#value_row').addClass('d-none');

            //Mostrar el campo elementos
            $(this).parent().siblings('#elements_row').removeClass('d-none');
            $(this).parent().siblings('#criterion_row').children('#criterion > option[id=baseElements]').attr('selected', true);

            //Rellenar el campo elements en base al valor obtenido en este desplegable. AJAX
            var _token = $('input[name=_token]').val();
            var searchElement = $(this).val();
            var listaElementos = $(this).parent().siblings('#elements_row').children('#elements');

            $.post(
                "/backend/cupon/search-element",
                {
                    element: searchElement,
                    _token : _token,
                },
                function(data, status){

                listaElementos.empty();
                    
                listaElementos.append($('<option>',{
                    value: '',
                    text: 'Elementos...',
                    }));

                    $.each(JSON.parse(data), function( index, element){
                        
                        listaElementos.append($('<option>',{
                            value: index,
                            text: element,
                        }));
                        
                    });
                    
                }
            );

        }else{

            $(this).parent().siblings('#criterion_row').children('#criterion').children('#lower').show()
            $(this).parent().siblings('#criterion_row').children('#criterion').children('#higher').show()
            $(this).parent().siblings('#criterion_row').children('#criterion').children('#equal').hide()
            $(this).parent().siblings('#criterion_row').children('#criterion').children('#different').hide()


            //Ocultar el campo elementos
            $(this).parent().siblings('#elements_row').addClass('d-none');

            //Mostrar el campo valor
            $(this).parent().siblings('#value_row').removeClass('d-none');
        }

    }

    //Core
    if($('#reservationtime').length > 0){
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
            format: 'MM/DD/YYYY hh:mm A'
            }
        })
    
        $('.zone').on('change', addCondictionSelects);
    
        $('#addCondition').on('click', function(e){
            e.preventDefault();
            $(this).parent().parent().before($('.conditions-row:first').clone());
            $('#removeCondition').removeClass('disabled');
    
            addDinamicEvent('.zone','click', addCondictionSelects);
    
        });
    
        $('#removeCondition').on('click', function(e){
            e.preventDefault();
            if($('.conditions-row').length > 1){
                $(this).parent().parent().siblings($('.conditions-row:last').remove());
                $('#removeCondition').removeClass('disabled');
            }else{
                $('#removeCondition').addClass('disabled');
            }
        });
    }

    $('#cupons_list').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      });

});