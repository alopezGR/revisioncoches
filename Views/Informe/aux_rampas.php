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