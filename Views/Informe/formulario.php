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
            <h5>ESTADO FLOTA</h5>
        </div>
        <div class="col-11 offset-1 mt-2">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>REVISIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="mb-2">
                        <span class="mr-2">RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rampa" id="rampa" value="1" required>
                            <label class="form-check-label" for="rampa">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rampa" id="rampaNo" value="0" required>
                            <label class="form-check-label" for="rampaNo">No ok</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ACÚSTICA RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="acusticarampa" id="acusticarampa" value="1" required>
                            <label class="form-check-label" for="acusticarampa">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="acusticarampa" id="acusticarampaNo" value="0" required>
                            <label class="form-check-label" for="acusticarampaNo">No ok</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">SEÑALIZACIÓN LUMINOSA RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="senlumrampa" id="senlumrampa" value="1" required>
                            <label class="form-check-label" for="senlumrampa">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="senlumrampa" id="senlumrampaNo" value="0" required>
                            <label class="form-check-label" for="senlumrampaNo">No ok</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PULSADORES RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pulsadores" id="pulsadores" value="1" required>
                            <label class="form-check-label" for="pulsadores">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pulsadores" id="pulsadoresNo" value="0" required>
                            <label class="form-check-label" for="pulsadoresNo">No ok</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">

                    <div class="mb-2">
                        <span class="mr-2">CINTURONES PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cinturonespmr" id="cinturonespmr" value="1" required>
                            <label class="form-check-label" for="cinturonespmr">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cinturonespmr" id="cinturonespmrNo" value="0" required>
                            <label class="form-check-label" for="cinturonespmrNo">No ok</label>
                        </div>
                    </div>
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
                        <span class="mr-2">KNEELING</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kneeling" id="kneeling" value="1" required>
                            <label class="form-check-label" for="kneeling">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kneeling" id="kneelingNo" value="0" required>
                            <label class="form-check-label" for="kneelingNo">No ok</label>
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