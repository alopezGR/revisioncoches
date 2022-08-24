<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz');
?>

<form method="post" action="index.php?controller=documentacion&action=procesarFormulario">
    <input type="hidden" value="<?php echo $resultado['id'] ?>" name="IDVEHICULO">
    <div class="row align-items-center bordes">
        <div class="col-12">
            <h5>VEHÍCULO</h5>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="NUMERO">NÚMERO</label>
                <input type="text" class="form-control" id="NUMERO" name="CODIGO_VEHICULO" readonly value="<?php echo $vehiculo; ?>">
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
            <h5>ESTADO DOCUMENTACIÓN</h5>
        </div>
        <div class="col-11 offset-1 mb-3 mt-3">
            <div class="row">
                <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk()">OK</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk()">NO</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo()">Limpiar</a></div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-2" id="estado_documentacion">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>REVISIÓN DOCUMENTACIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <span class="mr-2">LIBRO RECLAMACIONES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LIBRO_RECLAMACIONES" id="LIBRO_RECLAMACIONES" value="1" required>
                            <label class="form-check-label" for="LIBRO_RECLAMACIONES">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LIBRO_RECLAMACIONES" id="LIBRO_RECLAMACIONESNo" value="0" required>
                            <label class="form-check-label" for="LIBRO_RECLAMACIONESNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LIBRO_RECLAMACIONES_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LIBRO_RECLAMACIONES_OBS" rows="2" name="LIBRO_RECLAMACIONES_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">SEGURO DEL VEHÍCULO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SEGURO_VEHICULO" id="SEGURO_VEHICULO" value="1" required>
                            <label class="form-check-label" for="SEGURO_VEHICULO">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SEGURO_VEHICULO" id="SEGURO_VEHICULONo" value="0" required>
                            <label class="form-check-label" for="SEGURO_VEHICULONo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SEGURO_VEHICULO_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SEGURO_VEHICULO_OBS" rows="2" name="SEGURO_VEHICULO_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ITV</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ITV" id="ITV" value="1" required>
                            <label class="form-check-label" for="ITV">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ITV" id="ITVNo" value="0" required>
                            <label class="form-check-label" for="ITVNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ITV_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ITV_OBS" rows="2" name="ITV_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">FICHA TÉCNICA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="FICHA_TECNICA" id="FICHA_TECNICA" value="1" required>
                            <label class="form-check-label" for="FICHA_TECNICA">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="FICHA_TECNICA" id="FICHA_TECNICANo" value="0" required>
                            <label class="form-check-label" for="FICHA_TECNICANo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="FICHA_TECNICA_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="FICHA_TECNICA_OBS" rows="2" name="FICHA_TECNICA_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">TACOGRAFO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TACOGRAFO" id="TACOGRAFO" value="1" required>
                            <label class="form-check-label" for="TACOGRAFO">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TACOGRAFO" id="TACOGRAFONo" value="0" required>
                            <label class="form-check-label" for="TACOGRAFONo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TACOGRAFO_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TACOGRAFO_OBS" rows="2" name="TACOGRAFO_OBS"></textarea>
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

</form>
<script src="js/script.js"></script>
<!-- <script src="js/observaciones_obligatorias.js"></script> -->
<script>
    let inputsOk = document.querySelectorAll('#estado_documentacion input[value="1"]');
    let inputsNoOk = document.querySelectorAll('#estado_documentacion input[value="0"]');

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