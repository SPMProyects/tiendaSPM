$(function () {
   
    showModalInterval('#modal1', 'popupState1', 5000);
    showModalInterval('#modal2', 'popupState2', 10000);
    showModalInterval('#modal3', 'popupState3', 15000);
    
});

function showModalInterval(modalName, sessionName, modalTime){
    if($(modalName).length > 0){
        //Condicional indicando que si se detecta una session storage en cada popup mayor a 2 no vuelva a mostrar el popup
        if(sessionStorage.getItem(sessionName) == undefined ){
            //Luego de 5 segundos mostrar el Pop1, de 10 el poup 2 y de 15 el popup 3
            setTimeout(() => {
                $(modalName).modal('show')
            }, modalTime);
            sessionStorage.setItem(sessionName, 1);
        }else if(sessionStorage.getItem(sessionName) < 2){
            //Crear session storage luego de mostrar en cada popup y si existe en su value aumentar en 1.
            var value = parseInt(sessionStorage.getItem(sessionName)) + 1;
            setTimeout(() => {
                $(modalName).modal('show')
            }, modalTime);
            sessionStorage.setItem(sessionName, value);
        }
    }
}