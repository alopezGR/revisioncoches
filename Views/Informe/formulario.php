<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz');
?>

<form method="post" action="index.php?controller=informe&action=procesarFormulario">
    <input type="hidden" value="<?php echo $resultado['id'] ?>" name="idvehiculo">
    <div class="row align-items-center bordes">
        <div class="col-12">
            <h5>VEHÍCULO</h5>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" id="numero" name="numero" readonly value="<?php echo $vehiculo; ?>">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa" readonly value="<?php echo $empresas[$resultado['IDEMPRESA']] ?>">
                <input type="hidden" class="form-control" id="empresa" name="empresa" readonly value="<?php echo $resultado['IDEMPRESA'] ?>">
            </div>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="kilometrosant">KLM ANT.</label>
                <input type="text" class="form-control" id="kilometrosant" name="kilometrosant" placeholder="" readonly value="<?php echo $resultado['klm'] ?>">
            </div>
            <div class="form-group">
                <label for="matricula">MATRÍCULA</label>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" readonly value="<?php echo $resultado['matricula'] ?>">
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
                <input type="hidden" name="tipo-<?php echo $rampas[$i]['id'] ?>" value="<?php echo $rampas[$i]['codigo'] ?>">
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
                                    <div class="col-6 d-flex justify-content-center">

                                        <label class="boton boton-exito" id="ok<?php echo $rampas[$i]['id'] ?>">
                                            <input onclick="hideCamposExtras(<?php echo $rampas[$i]['id'] ?>, this)" class="radioRampa" type="radio" name="r-<?php echo $rampas[$i]['id'] ?>" value="1" autocomplete="off"> Ok
                                        </label>

                                    </div>
                                    <div class="col-6 d-flex justify-content-center">

                                        <label class="boton boton-danger " id="nook<?php echo $rampas[$i]['id'] ?>">
                                            <input onclick="mostrarCamposExtra(<?php echo $rampas[$i]['id'] ?>, this);" class="radioRampa" id="radioRampa<?php echo $rampas[$i]['id'] ?>" type="radio" autocomplete="off"> No ok
                                        </label>

                                    </div>
                                </div>
                                <div>
                                    <div class="card card-body display-none" id="card-<?php echo $rampas[$i]['id'] ?>">
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center">

                                                <label class="boton boton-exito" id="revision<?php echo $rampas[$i]['id'] ?>">
                                                    <input onclick="revision(<?php echo $rampas[$i]['id'] ?>, this)" class="radioRampa" type="radio" name="r-<?php echo $rampas[$i]['id'] ?>" value="2" autocomplete="off"> Revision
                                                </label>

                                            </div>
                                            <div class="col-6 d-flex justify-content-center">

                                                <label class="boton boton-danger " id="averia<?php echo $rampas[$i]['id'] ?>">
                                                    <input onclick="averia(<?php echo $rampas[$i]['id'] ?>, this);" class="radioRampa" id="radioRampa<?php echo $rampas[$i]['id'] ?>" type="radio" autocomplete="off" name="r-<?php echo $rampas[$i]['id'] ?>" value="3"> Gestionar Avería

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
        <div class="col-8 offset-2">
            <div class="row bordes">
                <div class="col-12">
                    <h6>REVISIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-2">
                        <span class="mr-2">ASIDEROS/BARRAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="barras" id="barras" value="1" required>
                            <label class="form-check-label" for="barras">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="barras" id="barrasNo" value="0" required>
                            <label class="form-check-label" for="barrasNo">No ok</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PULSADORES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pulsadores" id="pulsadores" value="1" required>
                            <label class="form-check-label" for="pulsadores">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pulsadores" id="pulsadoresNo" value="0" required>
                            <label class="form-check-label" for="pulsadoresNo">No ok</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">SUSPENSIÓN</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="suspension" id="suspension" value="1" required>
                            <label class="form-check-label" for="suspension">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="suspension" id="suspensionNo" value="0" required>
                            <label class="form-check-label" for="suspensionNo">No ok</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-2">
                        <span class="mr-2">ESPACIOS RESERVADOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espacio" id="espacio" value="1" required>
                            <label class="form-check-label" for="espacio">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="espacio" id="espacioNo" value="0" required>
                            <label class="form-check-label" for="espacioNo">No ok</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">CINTURONES PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cinturones" id="cinturones" value="1" required>
                            <label class="form-check-label" for="cinturones">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cinturones" id="cinturonesNo" value="0" required>
                            <label class="form-check-label" for="cinturonesNo">No ok</label>
                        </div>
                    </div>
                </div>
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