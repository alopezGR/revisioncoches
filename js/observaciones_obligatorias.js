let radiobuttons = document.querySelectorAll('input[type=radio]');

radiobuttons.forEach(function(element) {
    element.addEventListener('change', function() {
        if (element.checked) {
            if (element.value == 0) {
                let idObservacionesElemento = element.getAttribute('name') + "_OBS";
                let observacionesElemento = document.getElementById(idObservacionesElemento);
                observacionesElemento.setAttribute("required", "true");
            } else {
                let idObservacionesElemento = element.getAttribute('name') + "_OBS";
                let observacionesElemento = document.getElementById(idObservacionesElemento);
                observacionesElemento.removeAttribute("required");
            }
        }
    })
});