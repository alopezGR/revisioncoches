<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz', 14 => 'TMURCIA');
?>

<form method="post" action="index.php?controller=limpieza&action=actualizarFormulario">
    <input type="hidden" value="<?php echo $resultado['id'] ?>" name="IDVEHICULO">
    <input type="hidden" value="<?php echo $revisionLE['ID'] ?>" name="IDRLE">
    <input type="hidden" value="<?php echo $revisionLI['ID'] ?>" name="IDRLI">
    <input type="hidden" value="<?php echo $revisionCE['ID'] ?>" name="IDRCE">
    <input type="hidden" value="<?php echo $revisionCI['ID'] ?>" name="IDRCI">
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
                <input type="hidden" class="form-control" id="EMPRESA_ID" name="EMPRESA" readonly value="<?php echo $resultado['IDEMPRESA'] ?>">
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

    <div class="row align-items-center mt-5 bordes" id="estado_limpieza">
        <div class="col-12">
            <h5>ESTADO LIMPIEZA (Revisado)</h5>
        </div>
        <div class="col-11 offset-1 mb-3 mt-3">
            <div class="row">
                <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_limpieza')">OK</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_limpieza')">NO</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_limpieza')">Limpiar</a></div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-2" id="estado_limpieza_exterior">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>ESTADO LIMPIEZA EXTERIOR</h6>
                    <div id="REVISION_LIMPIEZA_EXTERIOR" class="custom-control custom-checkbox display-none" style="margin: 25px 0px 50px 0px;">
                        <input type="checkbox" class="custom-control-input" id="NO_LIMPIEZA_EXTERIOR">
                        <label class="custom-control-label" for="NO_LIMPIEZA_EXTERIOR">No realizar revisión</label>
                    </div>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_limpieza_exterior')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_limpieza_exterior')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_limpieza_exterior')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-2">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA CARROCERÍA</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_CARROCERIA_LE" id="LIM_CARROCERIA_LE" value="1" required <?php if ($revisionLE['CARROCERIA'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_CARROCERIA_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_CARROCERIA_LE" id="LIM_CARROCERIA_LENo" value="0" required <?php if ($revisionLE['CARROCERIA'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_CARROCERIA_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN CARROCERÍA</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_CARROCERIA_LE" id="CON_CARROCERIA_LE" value="1" required <?php if ($revisionCE['CARROCERIA'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_CARROCERIA_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_CARROCERIA_LE" id="CON_CARROCERIA_LENo" value="0" required <?php if ($revisionCE['CARROCERIA'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_CARROCERIA_LENo">No ok</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="CARROCERIA_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CARROCERIA_LE_OBS" rows="2" name="CARROCERIA_LE_OBS"><?php echo $revisionLE['CARROCERIA_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA VENTANAS LATERALES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_VENTANAS_LATERALES_LE" id="LIM_VENTANAS_LATERALES_LE" value="1" required <?php if ($revisionLE['VENTANAS_LATERALES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_VENTANAS_LATERALES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_VENTANAS_LATERALES_LE" id="LIM_VENTANAS_LATERALES_LENo" value="0" required <?php if ($revisionLE['VENTANAS_LATERALES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_VENTANAS_LATERALES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN VENTANAS LATERALES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_VENTANAS_LATERALES_LE" id="CON_VENTANAS_LATERALES_LE" value="1" required <?php if ($revisionCE['VENTANAS_LATERALES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_VENTANAS_LATERALES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_VENTANAS_LATERALES_LE" id="CON_VENTANAS_LATERALES_LENo" value="0" required <?php if ($revisionCE['VENTANAS_LATERALES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_VENTANAS_LATERALES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="VENTANAS_LATERALES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VENTANAS_LATERALES_LE_OBS" rows="2" name="VENTANAS_LATERALES_LE_OBS"><?php echo $revisionLE['VENTANAS_LATERALES_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA PUERTAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PUERTAS_LE" id="LIM_PUERTAS_LE" value="1" required <?php if ($revisionLE['PUERTAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PUERTAS_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PUERTAS_LE" id="LIM_PUERTAS_LENo" value="0" required <?php if ($revisionLE['PUERTAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PUERTAS_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN PUERTAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PUERTAS_LE" id="CON_PUERTAS_LE" value="1" required <?php if ($revisionCE['PUERTAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PUERTAS_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PUERTAS_LE" id="CON_PUERTAS_LENo" value="0" required <?php if ($revisionCE['PUERTAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PUERTAS_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="PUERTAS_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUERTAS_LE_OBS" rows="2" name="PUERTAS_LE_OBS"><?php echo $revisionLE['PUERTAS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA LUNAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_LUNAS_LE" id="LIM_LUNAS_LE" value="1" required <?php if ($revisionLE['LUNAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_LUNAS_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_LUNAS_LE" id="LIM_LUNAS_LENo" value="0" required <?php if ($revisionLE['LUNAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_LUNAS_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN LUNAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_LUNAS_LE" id="CON_LUNAS_LE" value="1" required <?php if ($revisionCE['LUNAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_LUNAS_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_LUNAS_LE" id="CON_LUNAS_LENo" value="0" required <?php if ($revisionCE['LUNAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_LUNAS_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="LUNAS_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LUNAS_LE_OBS" rows="2" name="LUNAS_LE_OBS"><?php echo $revisionLE['LUNAS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA ESPEJOS RETROVISORES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ESPEJOS_RETROVISORES_LE" id="LIM_ESPEJOS_RETROVISORES_LE" value="1" required <?php if ($revisionLE['ESPEJOS_RETROVISORES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ESPEJOS_RETROVISORES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ESPEJOS_RETROVISORES_LE" id="LIM_ESPEJOS_RETROVISORES_LENo" value="0" required <?php if ($revisionLE['ESPEJOS_RETROVISORES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ESPEJOS_RETROVISORES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN ESPEJOS RETROVISORES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ESPEJOS_RETROVISORES_LE" id="CON_ESPEJOS_RETROVISORES_LE" value="1" required <?php if ($revisionCE['ESPEJOS_RETROVISORES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ESPEJOS_RETROVISORES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ESPEJOS_RETROVISORES_LE" id="CON_ESPEJOS_RETROVISORES_LENo" value="0" required <?php if ($revisionCE['ESPEJOS_RETROVISORES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ESPEJOS_RETROVISORES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ESPEJOS_RETROVISORES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ESPEJOS_RETROVISORES_LE_OBS" rows="2" name="ESPEJOS_RETROVISORES_LE_OBS"><?php echo $revisionLE['ESPEJOS_RETROVISORES_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA LUCES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_LUCES_LE" id="LIM_LUCES_LE" value="1" required <?php if ($revisionLE['LUCES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_LUCES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_LUCES_LE" id="LIM_LUCES_LENo" value="0" required <?php if ($revisionLE['LUCES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_LUCES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN LUCES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_LUCES_LE" id="CON_LUCES_LE" value="1" required <?php if ($revisionCE['LUCES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_LUCES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_LUCES_LE" id="CON_LUCES_LENo" value="0" required <?php if ($revisionCE['LUCES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_LUCES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="LUCES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LUCES_LE_OBS" rows="2" name="LUCES_LE_OBS"><?php echo $revisionLE['LUCES_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA INDICADORES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_INDICADORES_LE" id="LIM_INDICADORES_LE" value="1" required <?php if ($revisionLE['INDICADORES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_INDICADORES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_INDICADORES_LE" id="LIM_INDICADORES_LENo" value="0" required <?php if ($revisionLE['INDICADORES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_INDICADORES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN INDICADORES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_INDICADORES_LE" id="CON_INDICADORES_LE" value="1" required <?php if ($revisionCE['INDICADORES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_INDICADORES_LE">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_INDICADORES_LE" id="CON_INDICADORES_LENo" value="0" required <?php if ($revisionCE['INDICADORES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_INDICADORES_LENo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="INDICADORES_LE_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="INDICADORES_LE_OBS" rows="2" name="INDICADORES_LE_OBS"><?php echo $revisionLE['INDICADORES_OBS'] ?></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_limpieza_interior">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>REVISIÓN LIMPIEZA INTERIOR</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_limpieza_interior')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_limpieza_interior')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_limpieza_interior')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA SUELO</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_SUELO_LI" id="LIM_SUELO_LI" value="1" required <?php if ($revisionLI['SUELO'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_SUELO_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_SUELO_LI" id="LIM_SUELO_LINo" value="0" required <?php if ($revisionLI['SUELO'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_SUELO_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN SUELO</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_SUELO_LI" id="CON_SUELO_LI" value="1" required <?php if ($revisionCI['SUELO'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_SUELO_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_SUELO_LI" id="CON_SUELO_LINo" value="0" required <?php if ($revisionCI['SUELO'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_SUELO_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SUELO_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SUELO_LI_OBS" rows="2" name="SUELO_LI_OBS"><?php echo $revisionCI['SUELO_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA ROTULOS LUMINOSOS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ROTULOS_LUMINOSOS_LI" id="LIM_ROTULOS_LUMINOSOS_LI" value="1" required <?php if ($revisionLI['ROTULOS_LUMINOSOS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ROTULOS_LUMINOSOS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ROTULOS_LUMINOSOS_LI" id="LIM_ROTULOS_LUMINOSOS_LINo" value="0" required <?php if ($revisionLI['ROTULOS_LUMINOSOS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ROTULOS_LUMINOSOS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN ROTULOS LUMINOSOS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ROTULOS_LUMINOSOS_LI" id="CON_ROTULOS_LUMINOSOS_LI" value="1" required <?php if ($revisionCI['ROTULOS_LUMINOSOS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ROTULOS_LUMINOSOS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ROTULOS_LUMINOSOS_LI" id="CON_ROTULOS_LUMINOSOS_LINo" value="0" required <?php if ($revisionCI['ROTULOS_LUMINOSOS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ROTULOS_LUMINOSOS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ROTULOS_LUMINOSOS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ROTULOS_LUMINOSOS_LI_OBS" rows="2" name="ROTULOS_LUMINOSOS_LI_OBS"><?php echo $revisionCI['ROTULOS_LUMINOSOS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA PAREDES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PAREDES_LI" id="LIM_PAREDES_LI" value="1" required <?php if ($revisionLI['PAREDES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PAREDES_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PAREDES_LI" id="LIM_PAREDES_LINo" value="0" required <?php if ($revisionLI['PAREDES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PAREDES_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN PAREDES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PAREDES_LI" id="CON_PAREDES_LI" value="1" required <?php if ($revisionCI['PAREDES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PAREDES_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PAREDES_LI" id="CON_PAREDES_LINo" value="0" required <?php if ($revisionCI['PAREDES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PAREDES_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="PAREDES_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PAREDES_LI_OBS" rows="2" name="PAREDES_LI_OBS"><?php echo $revisionCI['PAREDES_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA PUERTAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PUERTAS_LI" id="LIM_PUERTAS_LI" value="1" required <?php if ($revisionLI['PUERTAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PUERTAS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PUERTAS_LI" id="LIM_PUERTAS_LINo" value="0" required <?php if ($revisionLI['PUERTAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PUERTAS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN PUERTAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PUERTAS_LI" id="CON_PUERTAS_LI" value="1" required <?php if ($revisionCI['PUERTAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PUERTAS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PUERTAS_LI" id="CON_PUERTAS_LINo" value="0" required <?php if ($revisionCI['PUERTAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PUERTAS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="PUERTAS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUERTAS_LI_OBS" rows="2" name="PUERTAS_LI_OBS"><?php echo $revisionCI['PUERTAS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA VENTANAS LATERALES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_VENTANAS_LATERALES_LI" id="LIM_VENTANAS_LATERALES_LI" value="1" required <?php if ($revisionLI['VENTANAS_LATERALES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_VENTANAS_LATERALES_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_VENTANAS_LATERALES_LI" id="LIM_VENTANAS_LATERALES_LINo" value="0" required <?php if ($revisionLI['VENTANAS_LATERALES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_VENTANAS_LATERALES_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN VENTANAS LATERALES</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_VENTANAS_LATERALES_LI" id="CON_VENTANAS_LATERALES_LI" value="1" required <?php if ($revisionCI['VENTANAS_LATERALES'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_VENTANAS_LATERALES_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_VENTANAS_LATERALES_LI" id="CON_VENTANAS_LATERALES_LINo" value="0" required <?php if ($revisionCI['VENTANAS_LATERALES'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_VENTANAS_LATERALES_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="VENTANAS_LATERALES_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VENTANAS_LATERALES_LI_OBS" rows="2" name="VENTANAS_LATERALES_LI_OBS"><?php echo $revisionCI['VENTANAS_LATERALES_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA ASIENTOS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ASIENTOS_LI" id="LIM_ASIENTOS_LI" value="1" required <?php if ($revisionLI['ASIENTOS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ASIENTOS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ASIENTOS_LI" id="LIM_ASIENTOS_LINo" value="0" required <?php if ($revisionLI['ASIENTOS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ASIENTOS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN ASIENTOS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ASIENTOS_LI" id="CON_ASIENTOS_LI" value="1" required <?php if ($revisionCI['ASIENTOS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ASIENTOS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ASIENTOS_LI" id="CON_ASIENTOS_LINo" value="0" required <?php if ($revisionCI['ASIENTOS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ASIENTOS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ASIENTOS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIENTOS_LI_OBS" rows="2" name="ASIENTOS_LI_OBS"><?php echo $revisionCI['ASIENTOS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA LUMINARIAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_LUMINARIAS_LI" id="LIM_LUMINARIAS_LI" value="1" required <?php if ($revisionLI['LUMINARIAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_LUMINARIAS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_LUMINARIAS_LI" id="LIM_LUMINARIAS_LINo" value="0" required <?php if ($revisionLI['LUMINARIAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_LUMINARIAS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN LUMINARIAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_LUMINARIAS_LI" id="CON_LUMINARIAS_LI" value="1" required <?php if ($revisionCI['LUMINARIAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_LUMINARIAS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_LUMINARIAS_LI" id="CON_LUMINARIAS_LINo" value="0" required <?php if ($revisionCI['LUMINARIAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_LUMINARIAS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="LUMINARIAS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LUMINARIAS_LI_OBS" rows="2" name="LUMINARIAS_LI_OBS"><?php echo $revisionCI['LUMINARIAS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA ASIDEROS Y BARRAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ASIDEROS_BARRAS_LI" id="LIM_ASIDEROS_BARRAS_LI" value="1" required <?php if ($revisionLI['ASIDEROS_BARRAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ASIDEROS_BARRAS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_ASIDEROS_BARRAS_LI" id="LIM_ASIDEROS_BARRAS_LINo" value="0" required <?php if ($revisionLI['ASIDEROS_BARRAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_ASIDEROS_BARRAS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN ASIDEROS Y BARRAS</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ASIDEROS_BARRAS_LI" id="CON_ASIDEROS_BARRAS_LI" value="1" required <?php if ($revisionCI['ASIDEROS_BARRAS'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ASIDEROS_BARRAS_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_ASIDEROS_BARRAS_LI" id="CON_ASIDEROS_BARRAS_LINo" value="0" required <?php if ($revisionCI['ASIDEROS_BARRAS'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_ASIDEROS_BARRAS_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ASIDEROS_BARRAS_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIDEROS_BARRAS_LI_OBS" rows="2" name="ASIDEROS_BARRAS_LI_OBS"><?php echo $revisionCI['ASIDEROS_BARRAS_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA CABINA DEL CONDUCTOR</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_CABINA_CONDUCTOR_LI" id="LIM_CABINA_CONDUCTOR_LI" value="1" required <?php if ($revisionLI['CABINA_CONDUCTOR'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_CABINA_CONDUCTOR_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_CABINA_CONDUCTOR_LI" id="LIM_CABINA_CONDUCTOR_LINo" value="0" required <?php if ($revisionLI['CABINA_CONDUCTOR'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_CABINA_CONDUCTOR_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN CABINA DEL CONDUCTOR</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_CABINA_CONDUCTOR_LI" id="CON_CABINA_CONDUCTOR_LI" value="1" required <?php if ($revisionCI['CABINA_CONDUCTOR'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_CABINA_CONDUCTOR_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_CABINA_CONDUCTOR_LI" id="CON_CABINA_CONDUCTOR_LINo" value="0" required <?php if ($revisionCI['CABINA_CONDUCTOR'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_CABINA_CONDUCTOR_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="CABINA_CONDUCTOR_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CABINA_CONDUCTOR_LI_OBS" rows="2" name="CABINA_CONDUCTOR_LI_OBS"><?php echo $revisionCI['CABINA_CONDUCTOR_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA PULSADORES RAMPA</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PULSADORES_RAMPA_LI" id="LIM_PULSADORES_RAMPA_LI" value="1" required <?php if ($revisionLI['PULSADORES_PARADA'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PULSADORES_RAMPA_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_PULSADORES_RAMPA_LI" id="LIM_PULSADORES_RAMPA_LINo" value="0" required <?php if ($revisionLI['PULSADORES_PARADA'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_PULSADORES_RAMPA_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN PULSADORES RAMPA</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PULSADORES_RAMPA_LI" id="CON_PULSADORES_RAMPA_LI" value="1" required <?php if ($revisionCI['PULSADORES_PARADA'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PULSADORES_RAMPA_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_PULSADORES_RAMPA_LI" id="CON_PULSADORES_RAMPA_LINo" value="0" required <?php if ($revisionCI['PULSADORES_PARADA'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_PULSADORES_RAMPA_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="PULSADORES_RAMPA_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PULSADORES_RAMPA_LI_OBS" rows="2" name="PULSADORES_RAMPA_LI_OBS"><?php echo $revisionCI['PULSADORES_PARADA_OBS'] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="form-group">
                            <span class="mr-2">LIMPIEZA SALPICADERO</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_SALPICADERO_LI" id="LIM_SALPICADERO_LI" value="1" required <?php if ($revisionLI['SALPICADERO'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_SALPICADERO_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="LIM_SALPICADERO_LI" id="LIM_SALPICADERO_LINo" value="0" required <?php if ($revisionLI['SALPICADERO'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="LIM_SALPICADERO_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="mr-2">CONSERVACIÓN SALPICADERO</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_SALPICADERO_LI" id="CON_SALPICADERO_LI" value="1" required <?php if ($revisionCI['SALPICADERO'] == '1') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_SALPICADERO_LI">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="CON_SALPICADERO_LI" id="CON_SALPICADERO_LINo" value="0" required <?php if ($revisionCI['SALPICADERO'] == '0') echo 'checked' ?>>
                                <label class="form-check-label" for="CON_SALPICADERO_LINo">No ok</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SALPICADERO_LI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALPICADERO_LI_OBS" rows="2" name="SALPICADERO_LI_OBS"><?php echo $revisionCI['SALPICADERO_OBS'] ?></textarea>
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
<!-- <script src="js/observaciones_obligatorias_lc.js"></script> -->
<script>
    function marcarTodoOk(formulario) {
        let inputsOk = document.querySelectorAll(`#${formulario} input[value="1"]`);
        inputsOk.forEach(function(inputOk) {
            inputOk.checked = true;
        })
    }

    function marcarTodoNoOk(formulario) {
        let inputsNoOk = document.querySelectorAll(`#${formulario} input[value="0"]`);
        inputsNoOk.forEach(function(inputOk) {
            inputOk.checked = true;
        })
    }

    function desmarcarTodo(formulario) {
        let inputsOk = document.querySelectorAll(`#${formulario} input[value="1"]`);
        let inputsNoOk = document.querySelectorAll(`#${formulario} input[value="0"]`);
        inputsOk.forEach(function(inputOk) {
            inputOk.checked = false;
        })
        inputsNoOk.forEach(function(inputOk) {
            inputOk.checked = false;
        })
    }
</script>