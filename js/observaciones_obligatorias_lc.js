let radiobuttons = document.querySelectorAll('input[type=radio]');
let empresa = document.getElementById('EMPRESA_ID').value;

if (empresa == 10) {
    radiobuttons.forEach(function(elem) {
        elem.removeAttribute('required');
    })
}

radiobuttons.forEach(function(element) {
    element.addEventListener('change', function() {

        let nombre = element.getAttribute('name').substring(4);
        let limpieza = document.getElementById("LIM_" + nombre + "No");
        let conservacion = document.getElementById("CON_" + nombre + "No");

        if (limpieza.checked || conservacion.checked) {
            let idObservacionesElemento = nombre + "_OBS";
            let observacionesElemento = document.getElementById(idObservacionesElemento);
            observacionesElemento.setAttribute("required", "true");
        } else {
            let idObservacionesElemento = nombre + "_OBS";
            let observacionesElemento = document.getElementById(idObservacionesElemento);
            observacionesElemento.removeAttribute("required");
        }

    })
});