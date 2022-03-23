let radiobuttons = document.querySelectorAll('input[type=radio]');

radiobuttons.forEach(function(element) {
    element.addEventListener('change', function() {

        let nombre = element.getAttribute('name').substring(4);
        let limpieza = document.getElementById("LIM_" + nombre + "No");
        let conservacion = document.getElementById("CON_" + nombre + "No");
        if (limpieza.checked || conservacion.checked) {
            console.log('Miau');
            let idObservacionesElemento = nombre + "_OBS";
            let observacionesElemento = document.getElementById(idObservacionesElemento);
            console.log(observacionesElemento);
            observacionesElemento.setAttribute("required", "true");
        } else {
            let idObservacionesElemento = nombre + "_OBS";
            let observacionesElemento = document.getElementById(idObservacionesElemento);
            console.log(observacionesElemento);
            observacionesElemento.removeAttribute("required");
        }

    })
});