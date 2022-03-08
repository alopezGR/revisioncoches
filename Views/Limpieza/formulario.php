<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz');
?>

<form method="post" action="index.php?controller=accesibilidad&action=procesarFormulario">
<input type="hidden" value="<?php echo $resultado['id'] ?>" name="IDVEHICULO">
    <div class="row align-items-center bordes">
        <div class="col-12">
            <h5>VEHÍCULO</h5>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="NUMERO">NÚMERO</label>
                <input type="text" class="form-control" id="NUMERO" name="NUMERO" readonly value="<?php echo $vehiculo; ?>">
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
        <div class="col-11 offset-1 mt-2">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>REVISIÓN DOCUMENTACIÓN VEHÍCULO</h6>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <span class="mr-2">EXTINTORES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EXTINTORES" id="EXTINTORES" value="1" required>
                            <label class="form-check-label" for="EXTINTORES">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EXTINTORES" id="EXTINTORESNo" value="0" required>
                            <label class="form-check-label" for="EXTINTORESNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="EXTINTORES_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="EXTINTORES_OBS" rows="2" name="EXTINTORES_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">TRIÁNGULOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TRIANGULOS" id="TRIANGULOS" value="1" required>
                            <label class="form-check-label" for="TRIANGULOS">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TRIANGULOS" id="TRIANGULOSNo" value="0" required>
                            <label class="form-check-label" for="TRIANGULOSNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TRIANGULOS_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TRIANGULOS_OBS" rows="2" name="TRIANGULOS_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">CALZO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CALZO" id="CALZO" value="1" required>
                            <label class="form-check-label" for="CALZO">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CALZO" id="CALZONo" value="0" required>
                            <label class="form-check-label" for="CALZONo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CALZO_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CALZO_OBS" rows="2" name="CALZO_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">CHALECO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CHALECO" id="CHALECO" value="1" required>
                            <label class="form-check-label" for="CHALECO">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CHALECO" id="CHALECONo" value="0" required>
                            <label class="form-check-label" for="CHALECONo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CHALECO_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CHALECO_OBS" rows="2" name="CHALECO_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">GUANTES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GUANTES" id="GUANTES" value="1" required>
                            <label class="form-check-label" for="GUANTES">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GUANTES" id="GUANTESNo" value="0" required>
                            <label class="form-check-label" for="GUANTESNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="GUANTES_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="GUANTES_OBS" rows="2" name="GUANTES_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">BOTIQUÍN</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="BOTIQUIN" id="BOTIQUIN" value="1" required>
                            <label class="form-check-label" for="BOTIQUIN">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="BOTIQUIN" id="BOTIQUINNo" value="0" required>
                            <label class="form-check-label" for="BOTIQUINNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="BOTIQUIN_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="BOTIQUIN_OBS" rows="2" name="BOTIQUIN_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">MARTILLOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS" id="MARTILLOS" value="1" required>
                            <label class="form-check-label" for="MARTILLOS">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS" id="MARTILLOSNo" value="0" required>
                            <label class="form-check-label" for="MARTILLOSNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MARTILLOS_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MARTILLOS_OBS" rows="2" name="MARTILLOS_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">CINTURONES ASIENTOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURONES_ASIENTOS" id="CINTURONES_ASIENTOS" value="1" required>
                            <label class="form-check-label" for="CINTURONES_ASIENTOS">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURONES_ASIENTOS" id="CINTURONES_ASIENTOSNo" value="0" required>
                            <label class="form-check-label" for="CINTURONES_ASIENTOSNo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CINTURONES_ASIENTOS_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CINTURONES_ASIENTOS_OBS" rows="2" name="CINTURONES_ASIENTOS_OBS"></textarea>
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
<script src="js/observaciones_obligatorias.js"></script>