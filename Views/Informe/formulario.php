<?php
    $empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz');
?>

<form method="post" action="index.php?controller=informe&action=procesarFormulario">
    <input type="hidden" value="<?php echo $resultado['id']?>" name="idvehiculo">
    <div class="row align-items-center bordes">
        <div class="col-12">                
            <h5>VEHÍCULO</h5>
        </div>
        <div class="col-4" style=" height: 200px">
            <div class="form-group">
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" id="numero" name="numero" readonly value="<?php echo $vehiculo; ?>">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa" readonly value="<?php echo $empresas[$resultado['IDEMPRESA']]?>">
                <input type="hidden" class="form-control" id="empresa" name="empresa" readonly value="<?php echo $resultado['IDEMPRESA']?>">
            </div>
        </div>
        <div class="col-4" style=" height: 200px">
            <div class="form-group">
                <label for="kilometrosant">KLM ANT.</label>
                <input type="text" class="form-control" id="kilometrosant" name="kilometrosant" placeholder="" readonly value="<?php echo $resultado['klm'] ?>">
            </div>
            <div class="form-group">
                <label for="litros">LITROS</label>
                <input type="text" class="form-control" id="litros" name="litros" placeholder="" >
            </div>
        </div>
        <div class="col-4" style=" height: 200px">
            <div class="form-group">
                <label for="matricula">MATRÍCULA</label>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" readonly value="<?php echo $resultado['matricula'] ?>">
            </div>
            <div class="form-group">
                <label for="kilometros">KILÓMETROS</label>
                <input type="text" class="form-control" id="kilometros" name="kilometros" placeholder="" >
            </div>
        </div>
    </div>

    <div class="row align-items-center mt-5 bordes">
        <div class="col-12">                
            <h5>RAMPAS</h5>
        </div>

        <?php
        $numRampas = count($rampas);
        if ($numRampas > 0) {
            $tamColumnas = (12 / $numRampas);

            for ($i = 0; $i < $numRampas; $i++) {
                ?>
        <input type="hidden" name="tipo-<?php echo $rampas[$i]['id']?>" value="<?php echo $rampas[$i]['codigo']?>">
                <div class="col-6 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#r-<?php echo $rampas[$i]['id'] ?>">
                        Rampa <?php echo $i + 1; ?>
                    </button>                        
                </div>
        
                <div class="modal fade" id="r-<?php echo $rampas[$i]['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="r-<?php echo $rampas[$i]['id'] ?>Label" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="margin-top: 250px">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="r-<?php echo $rampas[$i]['id'] ?>Label">Rampa <?php echo $i + 1; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center" >

                                        <label class="boton boton-exito" id="ok<?php echo $rampas[$i]['id'] ?>">
                                            <input onclick="hideCamposExtras(<?php echo $rampas[$i]['id'] ?>, this)" class="radioRampa" type="radio" name="r-<?php echo $rampas[$i]['id'] ?>" value="1" autocomplete="off">  Ok
                                        </label>   

                                    </div>
                                    <div class="col-6 d-flex justify-content-center">

                                        <label class="boton boton-danger " id="nook<?php echo $rampas[$i]['id'] ?>" >
                                            <input onclick="mostrarCamposExtra(<?php echo $rampas[$i]['id'] ?>, this);" class="radioRampa" id="radioRampa<?php echo $rampas[$i]['id'] ?>"  type="radio" 
                                                   autocomplete="off" > No ok
                                        </label>   

                                    </div>
                                </div>
                                <div>
                                    <div class="card card-body display-none" id="card-<?php echo $rampas[$i]['id'] ?>">
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center" >

                                                <label class="boton boton-exito" id="revision<?php echo $rampas[$i]['id'] ?>">
                                                    <input onclick="revision(<?php echo $rampas[$i]['id'] ?>, this)" class="radioRampa" type="radio" name="r-<?php echo $rampas[$i]['id'] ?>" value="2" autocomplete="off">  Revision
                                                </label>   

                                            </div>
                                            <div class="col-6 d-flex justify-content-center">

                                                <label class="boton boton-danger " id="averia<?php echo $rampas[$i]['id'] ?>" >
                                                    <input onclick="averia(<?php echo $rampas[$i]['id'] ?>, this);" class="radioRampa" id="radioRampa<?php echo $rampas[$i]['id'] ?>"  type="radio" 
                                                           autocomplete="off" name="r-<?php echo $rampas[$i]['id'] ?>" value="3"> Gestionar Avería

                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>

    </div>
    <div class="row align-items-center mt-5 bordes">
        <div class="col-12">                
            <h5>ESTADO FLOTA</h5>
        </div>
        <div class="col-4">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="okflota" name="okflota" class="custom-control-input" value="1" required="true" onclick="okEstadoFlota();">
                <label class="custom-control-label" for="okflota">OK</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="revisionflota" name="okflota" class="custom-control-input" value="0" required="true" onclick="revisionEstadoFlota();">
                <label class="custom-control-label" for="revisionflota">REVISIÓN</label>
            </div>
        </div>
        <div class="col-8">
            <div class="row bordes">
                <div class="col-12">
                    <h6>REVISIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12 col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="asientos" name="asientos">
                        <label class="custom-control-label" for="asientos">ASIENTOS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="lunas" name="lunas">
                        <label class="custom-control-label" for="lunas">LUNAS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="barras" name="barras">
                        <label class="custom-control-label" for="barras">BARRAS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="puesto" name="puesto">
                        <label class="custom-control-label" for="puesto">PUESTO CONDUCTOR</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="limpiezaext" name="limpiezaext">
                        <label class="custom-control-label" for="limpiezaext">LIMPIEZA EXTERIOR</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="carroceria" name="carroceria">
                        <label class="custom-control-label" for="carroceria">CARROCERIA</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="lucesint" name="lucesint">
                        <label class="custom-control-label" for="lucesint">LUCES INTERIOR</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="lucesext" name="lucesext">
                        <label class="custom-control-label" for="lucesext">LUCES EXTERIOR</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="grafitis" name="grafitis">
                        <label class="custom-control-label" for="grafitis">GRAFITIS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input revision-vehiculo" id="limpiezaint" name="limpiezaint">
                        <label class="custom-control-label" for="limpiezaint">LIMPIEZA INTERIOR</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row align-items-center mt-5 bordes">
        <div class="col-12 mb-2">                
            <h5>INFORMACIÓN AL USUARIO EN EL VEHÍCULO</h5>
        </div>
        <div class="col-4">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="okinfo" class="custom-control-input" value="1" required="true" onclick="okEstadoInfo();">
                <label class="custom-control-label" for="customRadioInline1">OK</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="okinfo" class="custom-control-input" value="0" required="true" onclick="revisionEstadoInfo();">
                <label class="custom-control-label" for="customRadioInline2">REVISIÓN</label>
            </div>
        </div>
        <div class="col-8">
            <div class="row bordes">
                <div class="col-12">
                    <h6>REVISIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12 col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="cartel" name="cartel">
                        <label class="custom-control-label" for="cartel">CARTEL IDENT. LÍNEA DESTINO</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="medios" name="medios">
                        <label class="custom-control-label" for="medios">MEDIOS CONTACTO CONSORCIO</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="senial" name="senial">
                        <label class="custom-control-label" for="senial">SEÑAL EMBARAZADA / ANCIANO</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="tarifas" name="tarifas">
                        <label class="custom-control-label" for="tarifas">TARIFAS VIGENTES</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="video" name="video">
                        <label class="custom-control-label" for="video">AVISO VIDEOVIGILANCIA</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="fumar" name="fumar">
                        <label class="custom-control-label" for="fumar">PROHIBIDO FUMAR</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="emergencia" name="emergencia">
                        <label class="custom-control-label" for="emergencia">ESPECIF. CASO EMERGENCIA</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="libro" name="libro">
                        <label class="custom-control-label" for="libro">LIBRO DE RECLAMACIONES</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="reglamento" name="reglamento">
                        <label class="custom-control-label" for="reglamento">REGLAMENTO VIAJEROS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="cambio" name="cambio">
                        <label class="custom-control-label" for="cambio">CAMBIOS MAX. PERMITIDO</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input info-vehiculo" id="ddd" name="ddd">
                        <label class="custom-control-label" for="ddd">CARTEL D.D.D.</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row align-items-center mt-5 bordes">
        <div class="col-12 mb-2">                
            <h5>CONTROL DE LIMPIEZA DE VEHICULOS</h5>
        </div>
        <div class="col-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="limpiezaprof" name="limpiezaprof">
                <label class="custom-control-label" for="limpiezaprof">LIMPIEZA PROFUNDA</label>
            </div>
        </div>
        <div class="col-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="limpiezasuelos" name="limpiezasuelos">
                <label class="custom-control-label" for="limpiezasuelos">LIMPIEZA SUELOS</label>
            </div>
        </div>

    </div>
    <div class="row align-items-center mt-5">
        <div class="col-12 d-flex justify-content-center">
            <div class="custom-control custom-checkbox">
                <button type="submit" class="btn btn-success">GRABAR</button>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</form>