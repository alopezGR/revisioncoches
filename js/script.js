function mostrarCamposExtra(idRampa, e) {
    card = document.getElementById(`card-${idRampa}`);
    card.classList.remove('display-none');

    e.parentElement.classList.add('activo');
    document.getElementById(`ok${idRampa}`).classList.remove('activo');

}

function hideCamposExtras(idRampa, e) {
    card = document.getElementById(`card-${idRampa}`);
    card.classList.add('display-none');

    e.parentElement.classList.add('activo');
    document.getElementById(`nook${idRampa}`).classList.remove('activo');
}

function revision(idRampa, e) {
    e.parentElement.classList.add('activo');
    document.getElementById(`averia${idRampa}`).classList.remove('activo');
}

function averia(idRampa, e) {
    e.parentElement.classList.add('activo');
    document.getElementById(`revision${idRampa}`).classList.remove('activo');
}

function okEstadoFlota(){
    let checkboxes = document.getElementsByClassName('revision-vehiculo');
    
    for(i = 0; i< checkboxes.length; i++){
        checkboxes[i].checked = true;
    }
}

function revisionEstadoFlota(){
    let checkboxes = document.getElementsByClassName('revision-vehiculo');
    
    for(i = 0; i< checkboxes.length; i++){
        checkboxes[i].checked = false;
    }
}

function okEstadoInfo(){
    let checkboxes = document.getElementsByClassName('info-vehiculo');
    
    for(i = 0; i< checkboxes.length; i++){
        checkboxes[i].checked = true;
    }
}

function revisionEstadoInfo(){
    let checkboxes = document.getElementsByClassName('info-vehiculo');
    
    for(i = 0; i< checkboxes.length; i++){
        checkboxes[i].checked = false;
    }
}
