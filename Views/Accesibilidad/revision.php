<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz', 14 => 'TMURCIA', 5 => 'Unauto', 22 => 'Mallorca');
?>

<form method="post" action="index.php?controller=accesibilidad&action=actualizarFormulario">
    <input type="hidden" value="<?php echo $resultado['id'] ?>" name="IDVEHICULO">
    <input type="hidden" value="<?php echo $revision['id'] ?>" name="IDREVISION">
    <div class="row align-items-center bordes">
        <div class="col-12">
            <h5>VEHÍCULO</h5>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="NUMERO">NÚMERO</label>
                <input type="text" class="form-control <?php echo $revisionCorrecta ? 'revision-correcta' : 'revision-incorrecta' ?>" id="NUMERO" name="CODIGO_VEHICULO" readonly value="<?php echo $vehiculo; ?>">
            </div>
            <div class="form-group">
                <label for="EMPRESA">Empresa</label>
                <input type="text" class="form-control" id="EMPRESA" readonly value="<?php echo $empresas[$resultado['IDEMPRESA']] ?>">
                <input type="hidden" class="form-control" id="EMPRESA" name="EMPRESA" readonly value="<?php echo $resultado['IDEMPRESA'] ?>">
            </div>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="KILOMETROSANT">KLM ANT.</label>
                <input type="text" class="form-control" id="KILOMETROSANT" name="KILOMETROSANT" placeholder="" readonly value="<?php echo $resultado['klm'] ?>">
            </div>
            <div class="form-group">
                <label for="MATRICULA">MATRÍCULA</label>
                <input type="text" class="form-control" id="MATRICULA" name="MATRICULA" placeholder="" readonly value="<?php echo $resultado['matricula'] ?>">
            </div>
        </div>
    </div>

    <div class="row align-items-center mt-5 bordes">
        <div class="col-12">
            <h5>ESTADO ACCESIBILIDAD (Revisado)</h5>
        </div>
        <div class="col-11 offset-1 mb-3 mt-3">
            <div class="row">
                <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk()">OK</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk()">NO</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo()">Limpiar</a></div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-2" id="estado_accesibilidad">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>REVISIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <span class="mr-2">RAMPA MANUAL</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RAMPA" id="RAMPA" value="1" required <?php if ($revision['rampa'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="RAMPA">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RAMPA" id="RAMPANo" value="0" required <?php if ($revision['rampa'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="RAMPANo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="RAMPA_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="RAMPA_OBS" rows="2" name="RAMPA_OBS"> <?php echo $revision['rampa_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">RAMPA AUTOMÁTICA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RAMPAAUTO" id="rampauato" value="1" required <?php if ($revision['rampaauto'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="RAMPAAUTO">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RAMPAAUTO" id="RAMPAAUTONo" value="0" required <?php if ($revision['rampaauto'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="RAMPAAUTONo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="RAMPAAUTO_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="RAMPAAUTO_OBS" rows="2" name="RAMPAAUTO_OBS"><?php echo $revision['rampaauto_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ELEVADOR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ELEVADOR" id="ELEVADOR" value="1" required <?php if ($revision['elevador'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="ELEVADOR">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ELEVADOR" id="ELEVADORNo" value="0" required <?php if ($revision['elevador'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="ELEVADORNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ELEVADOR_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ELEVADOR_OBS" rows="2" name="ELEVADOR_OBS"><?php echo $revision['elevador_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">SEÑALIZACIÓN ACÚSTICA RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ACUSTICARAMPA" id="ACUSTICARAMPA" value="1" required <?php if ($revision['acusticarampa'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="ACUSTICARAMPA">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ACUSTICARAMPA" id="ACUSTICARAMPANo" value="0" required <?php if ($revision['acusticarampa'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="ACUSTICARAMPANo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ACUSTICARAMPA_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ACUSTICARAMPA_OBS" rows="2" name="ACUSTICARAMPA_OBS"><?php echo $revision['acusticarampa_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">SEÑALIZACIÓN LUMINOSA RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SENLUMRAMPA" id="SENLUMRAMPA" value="1" required <?php if ($revision['senlumrampa'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="SENLUMRAMPA">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SENLUMRAMPA" id="SENLUMRAMPANo" value="0" required <?php if ($revision['senlumrampa'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="SENLUMRAMPANo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SENLUMRAMPA_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SENLUMRAMPA_OBS" rows="2" name="SENLUMRAMPA_OBS"><?php echo $revision['senlumrampa_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PULSADORES RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PULSADORESRAMPA" id="pulsadores" value="1" required <?php if ($revision['pulsadoresrampa'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="pulsadores">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PULSADORESRAMPA" id="pulsadoresNo" value="0" required <?php if ($revision['pulsadoresrampa'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="pulsadoresNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PULSADORESRAMPA_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PULSADORESRAMPA_OBS" rows="2" name="PULSADORESRAMPA_OBS"><?php echo $revision['pulsadoresrampa_obs'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="mb-2">
                        <span class="mr-2">CINTURONES PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURONESPMR" id="CINTURONESPMR" value="1" required <?php if ($revision['cinturonespmr'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="CINTURONESPMR">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURONESPMR" id="CINTURONESPMRNo" value="0" required <?php if ($revision['cinturonespmr'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="CINTURONESPMRNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CINTURONESPMR_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CINTURONESPMR_OBS" rows="2" name="CINTURONESPMR_OBS"><?php echo $revision['cinturonespmr_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ASIDEROS/BARRAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="BARRAS" id="BARRAS" value="1" required <?php if ($revision['barras'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="BARRAS">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="BARRAS" id="BARRASNo" value="0" required <?php if ($revision['barras'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="BARRASNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="BARRAS_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="BARRAS_OBS" rows="2" name="BARRAS_OBS"><?php echo $revision['barras_obs'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">KNEELING</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="KNEELING" id="KNEELING" value="1" required <?php if ($revision['kneeling'] == '1') echo 'checked' ?>>
                            <label class="form-check-label" for="KNEELING">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="KNEELING" id="KNEELINGNo" value="0" required <?php if ($revision['kneeling'] == '0') echo 'checked' ?>>
                            <label class="form-check-label" for="KNEELINGNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="KNEELING_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="KNEELING_OBS" rows="2" name="KNEELING_OBS"><?php echo $revision['kneeling_obs'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row align-items-center mt-5">
        <div class="col-12 d-flex justify-content-center">
            <div class="custom-control custom-checkbox">
                <button type="submit" class="btn btn-success">ACTUALIZAR</button>
            </div>
        </div>
    </div>

</form>
<script src="js/script.js"></script>
<!-- <script src="js/observaciones_obligatorias.js"></script> -->
<script>
    let inputsOk = document.querySelectorAll('#estado_accesibilidad input[value="1"]');
    let inputsNoOk = document.querySelectorAll('#estado_accesibilidad input[value="0"]');

    function marcarTodoOk() {
        inputsOk.forEach(function(inputOk) {
            inputOk.checked = true;
        })
    }

    function marcarTodoNoOk() {
        inputsNoOk.forEach(function(inputOk) {
            inputOk.checked = true;
        })
    }

    function desmarcarTodo() {
        inputsOk.forEach(function(inputOk) {
            inputOk.checked = false;
        })
        inputsNoOk.forEach(function(inputOk) {
            inputOk.checked = false;
        })
    }
</script>