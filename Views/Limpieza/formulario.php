<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz');
?>

<form method="post" action="index.php?controller=limpieza&action=procesarFormulario">
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
            <h5>ESTADO LIMPIEZA</h5>
        </div>
        <div class="col-11 offset-1 mt-2">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>ESTADO LIMPIEZA EXTERIOR</h6>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <span class="mr-2">CARROCERÍA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CARROCERIA_LE" id="CARROCERIA_LE" value="1" required>
                            <label class="form-check-label" for="CARROCERIA_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CARROCERIA_LE" id="CARROCERIA_LENo" value="0" required>
                            <label class="form-check-label" for="CARROCERIA_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CARROCERIA_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CARROCERIA_LE_OBS" rows="2" name="CARROCERIA_LE_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">VENTANAS LATERALES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VENTANAS_LATERALES_LE" id="VENTANAS_LATERALES_LE" value="1" required>
                            <label class="form-check-label" for="VENTANAS_LATERALES_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VENTANAS_LATERALES_LE" id="VENTANAS_LATERALES_LENo" value="0" required>
                            <label class="form-check-label" for="VENTANAS_LATERALES_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="VENTANAS_LATERALES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VENTANAS_LATERALES_LE_OBS" rows="2" name="VENTANAS_LATERALES_LE_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PUERTAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUERTAS_LE" id="PUERTAS_LE" value="1" required>
                            <label class="form-check-label" for="PUERTAS_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUERTAS_LE" id="PUERTAS_LENo" value="0" required>
                            <label class="form-check-label" for="PUERTAS_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PUERTAS_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUERTAS_LE_OBS" rows="2" name="PUERTAS_LE_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">LUNAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LUNAS_LE" id="LUNAS_LE" value="1" required>
                            <label class="form-check-label" for="LUNAS_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LUNAS_LE" id="LUNAS_LENo" value="0" required>
                            <label class="form-check-label" for="LUNAS_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LUNAS_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LUNAS_LE_OBS" rows="2" name="LUNAS_LE_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ESPEJOS RETROVISORES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ESPEJOS_RETROVISORES_LE" id="ESPEJOS_RETROVISORES_LE" value="1" required>
                            <label class="form-check-label" for="ESPEJOS_RETROVISORES_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ESPEJOS_RETROVISORES_LE" id="ESPEJOS_RETROVISORES_LENo" value="0" required>
                            <label class="form-check-label" for="ESPEJOS_RETROVISORES_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ESPEJOS_RETROVISORES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ESPEJOS_RETROVISORES_LE_OBS" rows="2" name="ESPEJOS_RETROVISORES_LE_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">LUCES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LUCES_LE" id="LUCES_LE" value="1" required>
                            <label class="form-check-label" for="LUCES_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LUCES_LE" id="LUCES_LENo" value="0" required>
                            <label class="form-check-label" for="LUCES_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LUCES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LUCES_LE_OBS" rows="2" name="LUCES_LE_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">INDICADORES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="INDICADORES_LE" id="INDICADORES_LE" value="1" required>
                            <label class="form-check-label" for="INDICADORES_LE">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="INDICADORES_LE" id="INDICADORES_LENo" value="0" required>
                            <label class="form-check-label" for="INDICADORES_LENo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="INDICADORES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="INDICADORES_LE_OBS" rows="2" name="INDICADORES_LE_OBS"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>REVISIÓN LIMPIEZA INTERIOR</h6>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <span class="mr-2">SUELO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SUELO_LI" id="SUELO_LI" value="1" required>
                            <label class="form-check-label" for="SUELO_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SUELO_LI" id="SUELO_LINo" value="0" required>
                            <label class="form-check-label" for="SUELO_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SUELO_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SUELO_LI_OBS" rows="2" name="SUELO_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ROTULOS LUMINOSOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ROTULOS_LUMINOSOS_LI" id="ROTULOS_LUMINOSOS_LI" value="1" required>
                            <label class="form-check-label" for="ROTULOS_LUMINOSOS_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ROTULOS_LUMINOSOS_LI" id="ROTULOS_LUMINOSOS_LINo" value="0" required>
                            <label class="form-check-label" for="ROTULOS_LUMINOSOS_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ROTULOS_LUMINOSOS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ROTULOS_LUMINOSOS_LI_OBS" rows="2" name="ROTULOS_LUMINOSOS_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PAREDES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PAREDES_LI" id="PAREDES_LI" value="1" required>
                            <label class="form-check-label" for="PAREDES_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PAREDES_LI" id="PAREDES_LINo" value="0" required>
                            <label class="form-check-label" for="PAREDES_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PAREDES_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PAREDES_LI_OBS" rows="2" name="PAREDES_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PUERTAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUERTAS_LI" id="PUERTAS_LI" value="1" required>
                            <label class="form-check-label" for="PUERTAS_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUERTAS_LI" id="PUERTAS_LINo" value="0" required>
                            <label class="form-check-label" for="PUERTAS_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PUERTAS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUERTAS_LI_OBS" rows="2" name="PUERTAS_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">VENTANAS LATERALES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VENTANAS_LATERALES_LI" id="VENTANAS_LATERALES_LI" value="1" required>
                            <label class="form-check-label" for="VENTANAS_LATERALES_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VENTANAS_LATERALES_LI" id="VENTANAS_LATERALES_LINo" value="0" required>
                            <label class="form-check-label" for="VENTANAS_LATERALES_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="VENTANAS_LATERALES_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VENTANAS_LATERALES_LI_OBS" rows="2" name="VENTANAS_LATERALES_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ASIENTOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_LI" id="ASIENTOS_LI" value="1" required>
                            <label class="form-check-label" for="ASIENTOS_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_LI" id="ASIENTOS_LINo" value="0" required>
                            <label class="form-check-label" for="ASIENTOS_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIENTOS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIENTOS_LI_OBS" rows="2" name="ASIENTOS_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">LUMINARIAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LUMINARIAS_LI" id="LUMINARIAS_LI" value="1" required>
                            <label class="form-check-label" for="LUMINARIAS_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LUMINARIAS_LI" id="LUMINARIAS_LINo" value="0" required>
                            <label class="form-check-label" for="LUMINARIAS_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LUMINARIAS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LUMINARIAS_LI_OBS" rows="2" name="LUMINARIAS_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">ASIDEROS Y BARRAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIDEROS_BARRAS_LI" id="ASIDEROS_BARRAS_LI" value="1" required>
                            <label class="form-check-label" for="ASIDEROS_BARRAS_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIDEROS_BARRAS_LI" id="ASIDEROS_BARRAS_LINo" value="0" required>
                            <label class="form-check-label" for="ASIDEROS_BARRAS_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIDEROS_BARRAS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIDEROS_BARRAS_LI_OBS" rows="2" name="ASIDEROS_BARRAS_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">CABINA DEL CONDUCTOR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CABINA_CONDUCTOR_LI" id="CABINA_CONDUCTOR_LI" value="1" required>
                            <label class="form-check-label" for="CABINA_CONDUCTOR_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CABINA_CONDUCTOR_LI" id="CABINA_CONDUCTOR_LINo" value="0" required>
                            <label class="form-check-label" for="CABINA_CONDUCTOR_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CABINA_CONDUCTOR_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CABINA_CONDUCTOR_LI_OBS" rows="2" name="CABINA_CONDUCTOR_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">PULSADORES RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PULSADORES_RAMPA_LI" id="PULSADORES_RAMPA_LI" value="1" required>
                            <label class="form-check-label" for="PULSADORES_RAMPA_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PULSADORES_RAMPA_LI" id="PULSADORES_RAMPA_LINo" value="0" required>
                            <label class="form-check-label" for="PULSADORES_RAMPA_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PULSADORES_RAMPA_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PULSADORES_RAMPA_LI_OBS" rows="2" name="PULSADORES_RAMPA_LI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="mr-2">SALPICADERO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALPICADERO_LI" id="SALPICADERO_LI" value="1" required>
                            <label class="form-check-label" for="SALPICADERO_LI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALPICADERO_LI" id="SALPICADERO_LINo" value="0" required>
                            <label class="form-check-label" for="SALPICADERO_LINo">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALPICADERO_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALPICADERO_LI_OBS" rows="2" name="SALPICADERO_LI_OBS"></textarea>
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