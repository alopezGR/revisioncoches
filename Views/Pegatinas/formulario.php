<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz', 14 => 'TMURCIA', 5 => 'Unauto', 22 => 'Mallorca');
?>
<div class="d-flex justify-content-center mb-4">
    <h3>ESTADO PEGATINAS</h3>
</div>
<form method="post" action="index.php?controller=pegatinas&action=procesarFormulario">
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

    <div class="row align-items-center mt-5 bordes" id="estado_pegatinas_exterior">
        <div class="col-12">
            <h5>ESTADO PEGATINAS EXTERIORES</h5>
        </div>
        <div class="col-11 offset-1 mb-3 mt-3">
            <div class="row">
                <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_exterior')">OK</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_exterior')">NO</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_exterior')">Limpiar</a></div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-2" id="estado_pegatinas_ef">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>EXTERIOR FRONTAL</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_ef')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_ef')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_ef')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">LOGO CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CRTM_LOGO_EF" id="CRTM_LOGO_EF" value="1">
                            <label class="form-check-label" for="CRTM_LOGO_EF">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CRTM_LOGO_EF" id="CRTM_LOGO_EF_No" value="0">
                            <label class="form-check-label" for="CRTM_LOGO_EF_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CRTM_LOGO_EF_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CRTM_LOGO_EF_OBS" rows="2" name="CRTM_LOGO_EF_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">LOGO EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_EF" id="LOGO_EMPRESA_EF" value="1">
                            <label class="form-check-label" for="LOGO_EMPRESA_EF">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_EF" id="LOGO_EMPRESA_EF_No" value="0">
                            <label class="form-check-label" for="LOGO_EMPRESA_EF_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LOGO_EMPRESA_EF_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LOGO_EMPRESA_EF_OBS" rows="2" name="LOGO_EMPRESA_EF_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">MINÚSVALIDO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MINUSVALIDO_EF" id="MINUSVALIDO_EF" value="1">
                            <label class="form-check-label" for="MINUSVALIDO_EF">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MINUSVALIDO_EF" id="MINUSVALIDO_EF_No" value="0">
                            <label class="form-check-label" for="MINUSVALIDO_EF_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MINUSVALIDO_EF_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MINUSVALIDO_EF_OBS" rows="2" name="MINUSVALIDO_EF_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">NUMERO DE VEHÍCULO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_EF" id="NUMERO_VEHICULO_EF" value="1">
                            <label class="form-check-label" for="NUMERO_VEHICULO_EF">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_EF" id="NUMERO_VEHICULO_EF_No" value="0">
                            <label class="form-check-label" for="NUMERO_VEHICULO_EF_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="NUMERO_VEHICULO_EF_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="NUMERO_VEHICULO_EF_OBS" rows="2" name="NUMERO_VEHICULO_EF_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_EF" id="OTROS_EF" value="1">
                            <label class="form-check-label" for="OTROS_EF">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_EF" id="OTROS_EF_No" value="0">
                            <label class="form-check-label" for="OTROS_EF_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_EF_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_EF_OBS" rows="2" name="OTROS_EF_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_et">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>EXTERIOR TRASERA</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_et')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_et')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_et')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">LOGO CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CRTM_LOGO_ET" id="CRTM_LOGO_ET" value="1">
                            <label class="form-check-label" for="CRTM_LOGO_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CRTM_LOGO_ET" id="CRTM_LOGO_ET_No" value="0">
                            <label class="form-check-label" for="CRTM_LOGO_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CRTM_LOGO_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CRTM_LOGO_ET_OBS" rows="2" name="CRTM_LOGO_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">LOGO EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_ET" id="LOGO_EMPRESA_ET" value="1">
                            <label class="form-check-label" for="LOGO_EMPRESA_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_ET" id="LOGO_EMPRESA_ET_No" value="0">
                            <label class="form-check-label" for="LOGO_EMPRESA_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LOGO_EMPRESA_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LOGO_EMPRESA_ET_OBS" rows="2" name="LOGO_EMPRESA_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ET" id="WEB_CRTM_ET" value="1">
                            <label class="form-check-label" for="WEB_CRTM_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ET" id="WEB_CRTM_ET_No" value="0">
                            <label class="form-check-label" for="WEB_CRTM_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_CRTM_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_CRTM_ET_OBS" rows="2" name="WEB_CRTM_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_EMPRESA_ET" id="WEB_EMPRESA_ET" value="1">
                            <label class="form-check-label" for="WEB_EMPRESA_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_EMPRESA_ET" id="WEB_EMPRESA_ET_No" value="0">
                            <label class="form-check-label" for="WEB_EMPRESA_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_EMPRESA_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_EMPRESA_ET_OBS" rows="2" name="WEB_EMPRESA_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">NUMERO DE VEHÍCULO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_ET" id="NUMERO_VEHICULO_ET" value="1">
                            <label class="form-check-label" for="NUMERO_VEHICULO_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_ET" id="NUMERO_VEHICULO_ET_No" value="0">
                            <label class="form-check-label" for="NUMERO_VEHICULO_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="NUMERO_VEHICULO_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="NUMERO_VEHICULO_ET_OBS" rows="2" name="NUMERO_VEHICULO_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDA DE EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ET" id="SALIDA_EMERGENCIA_ET" value="1">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ET" id="SALIDA_EMERGENCIA_ET_No" value="0">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_EMERGENCIA_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_EMERGENCIA_ET_OBS" rows="2" name="SALIDA_EMERGENCIA_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PUBLICIDAD</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUBLICIDAD_ET" id="PUBLICIDAD_ET" value="1">
                            <label class="form-check-label" for="PUBLICIDAD_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUBLICIDAD_ET" id="PUBLICIDAD_ET_No" value="0">
                            <label class="form-check-label" for="PUBLICIDAD_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PUBLICIDAD_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUBLICIDAD_ET_OBS" rows="2" name="PUBLICIDAD_ET_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ET" id="OTROS_ET" value="1">
                            <label class="form-check-label" for="OTROS_ET">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ET" id="OTROS_ET_No" value="0">
                            <label class="form-check-label" for="OTROS_ET_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_ET_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_ET_OBS" rows="2" name="OTROS_ET_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_eld">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>EXTERIOR LATERAL DERECHO</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_eld')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_eld')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_eld')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">LOGO EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_ELD" id="LOGO_EMPRESA_ELD" value="1">
                            <label class="form-check-label" for="LOGO_EMPRESA_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_ELD" id="LOGO_EMPRESA_ELD_No" value="0">
                            <label class="form-check-label" for="LOGO_EMPRESA_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LOGO_EMPRESA_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LOGO_EMPRESA_ELD_OBS" rows="2" name="LOGO_EMPRESA_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ELD" id="WEB_CRTM_ELD" value="1">
                            <label class="form-check-label" for="WEB_CRTM_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ELD" id="WEB_CRTM_ELD_No" value="0">
                            <label class="form-check-label" for="WEB_CRTM_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_CRTM_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_CRTM_ELD_OBS" rows="2" name="WEB_CRTM_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PMR_ELD" id="PMR_ELD" value="1">
                            <label class="form-check-label" for="PMR_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PMR_ELD" id="PMR_ELD_No" value="0">
                            <label class="form-check-label" for="PMR_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PMR_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PMR_ELD_OBS" rows="2" name="PMR_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">STOP COVID</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="STOP_COVID_ELD" id="STOP_COVID_ELD" value="1">
                            <label class="form-check-label" for="STOP_COVID_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="STOP_COVID_ELD" id="STOP_COVID_ELD_No" value="0">
                            <label class="form-check-label" for="STOP_COVID_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="STOP_COVID_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="STOP_COVID_ELD_OBS" rows="2" name="STOP_COVID_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_ELD" id="SALIDA_ELD" value="1">
                            <label class="form-check-label" for="SALIDA_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_ELD" id="SALIDA_ELD_No" value="0">
                            <label class="form-check-label" for="SALIDA_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_ELD_OBS" rows="2" name="SALIDA_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">ENTRADA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ENTRADA_ELD" id="ENTRADA_ELD" value="1">
                            <label class="form-check-label" for="ENTRADA_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ENTRADA_ELD" id="ENTRADA_ELD_No" value="0">
                            <label class="form-check-label" for="ENTRADA_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ENTRADA_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ENTRADA_ELD_OBS" rows="2" name="ENTRADA_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">MINUSVÁLIDO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MINUSVALIDO_ELD" id="MINUSVALIDO_ELD" value="1">
                            <label class="form-check-label" for="MINUSVALIDO_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MINUSVALIDO_ELD" id="MINUSVALIDO_ELD_No" value="0">
                            <label class="form-check-label" for="MINUSVALIDO_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MINUSVALIDO_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MINUSVALIDO_ELD_OBS" rows="2" name="MINUSVALIDO_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">CAMARA COMERCIO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CAMARA_COMERCIO_ELD" id="CAMARA_COMERCIO_ELD" value="1">
                            <label class="form-check-label" for="CAMARA_COMERCIO_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CAMARA_COMERCIO_ELD" id="CAMARA_COMERCIO_ELD_No" value="0">
                            <label class="form-check-label" for="CAMARA_COMERCIO_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CAMARA_COMERCIO_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CAMARA_COMERCIO_ELD_OBS" rows="2" name="CAMARA_COMERCIO_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDA EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ELD" id="SALIDA_EMERGENCIA_ELD" value="1">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ELD" id="SALIDA_EMERGENCIA_ELD_No" value="0">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_EMERGENCIA_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_EMERGENCIA_ELD_OBS" rows="2" name="SALIDA_EMERGENCIA_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">GRUPO RUIZ</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GRUPO_RUIZ_ELD" id="GRUPO_RUIZ_ELD" value="1">
                            <label class="form-check-label" for="GRUPO_RUIZ_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GRUPO_RUIZ_ELD" id="GRUPO_RUIZ_ELD_No" value="0">
                            <label class="form-check-label" for="GRUPO_RUIZ_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="GRUPO_RUIZ_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="GRUPO_RUIZ_ELD_OBS" rows="2" name="GRUPO_RUIZ_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">NÚMERO VEHÍCULO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_ELD" id="NUMERO_VEHICULO_ELD" value="1">
                            <label class="form-check-label" for="NUMERO_VEHICULO_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_ELD" id="NUMERO_VEHICULO_ELD_No" value="0">
                            <label class="form-check-label" for="NUMERO_VEHICULO_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="NUMERO_VEHICULO_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="NUMERO_VEHICULO_ELD_OBS" rows="2" name="NUMERO_VEHICULO_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">APERTURA DE EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="APERTURA_EMERGENCIA_ELD" id="APERTURA_EMERGENCIA_ELD" value="1">
                            <label class="form-check-label" for="APERTURA_EMERGENCIA_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="APERTURA_EMERGENCIA_ELD" id="APERTURA_EMERGENCIA_ELD_No" value="0">
                            <label class="form-check-label" for="APERTURA_EMERGENCIA_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="APERTURA_EMERGENCIA_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="APERTURA_EMERGENCIA_ELD_OBS" rows="2" name="APERTURA_EMERGENCIA_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SOLICITUD DE RAMPA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SOLICITUD_RAMPA_ELD" id="SOLICITUD_RAMPA_ELD" value="1">
                            <label class="form-check-label" for="SOLICITUD_RAMPA_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SOLICITUD_RAMPA_ELD" id="SOLICITUD_RAMPA_ELD_No" value="0">
                            <label class="form-check-label" for="SOLICITUD_RAMPA_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SOLICITUD_RAMPA_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SOLICITUD_RAMPA_ELD_OBS" rows="2" name="SOLICITUD_RAMPA_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">ACCESO PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ACCESO_PMR_ELD" id="ACCESO_PMR_ELD" value="1">
                            <label class="form-check-label" for="ACCESO_PMR_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ACCESO_PMR_ELD" id="ACCESO_PMR_ELD_No" value="0">
                            <label class="form-check-label" for="ACCESO_PMR_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ACCESO_PMR_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ACCESO_PMR_ELD_OBS" rows="2" name="ACCESO_PMR_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">LOGO CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_CRTM_ELD" id="LOGO_CRTM_ELD" value="1">
                            <label class="form-check-label" for="LOGO_CRTM_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_CRTM_ELD" id="LOGO_CRTM_ELD_No" value="0">
                            <label class="form-check-label" for="LOGO_CRTM_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LOGO_CRTM_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LOGO_CRTM_ELD_OBS" rows="2" name="LOGO_CRTM_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDA PUERTAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_PUERTAS_ELD" id="SALIDA_PUERTAS_ELD" value="1">
                            <label class="form-check-label" for="SALIDA_PUERTAS_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_PUERTAS_ELD" id="SALIDA_PUERTAS_ELD_No" value="0">
                            <label class="form-check-label" for="SALIDA_PUERTAS_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_PUERTAS_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_PUERTAS_ELD_OBS" rows="2" name="SALIDA_PUERTAS_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SILLA DE RUEDAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SILLA_RUEDAS_ELD" id="SILLA_RUEDAS_ELD" value="1">
                            <label class="form-check-label" for="SILLA_RUEDAS_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SILLA_RUEDAS_ELD" id="SILLA_RUEDAS_ELD_No" value="0">
                            <label class="form-check-label" for="SILLA_RUEDAS_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SILLA_RUEDAS_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SILLA_RUEDAS_ELD_OBS" rows="2" name="SILLA_RUEDAS_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">CARRITO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CARRITO_ELD" id="CARRITO_ELD" value="1">
                            <label class="form-check-label" for="CARRITO_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CARRITO_ELD" id="CARRITO_ELD_No" value="0">
                            <label class="form-check-label" for="CARRITO_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CARRITO_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CARRITO_ELD_OBS" rows="2" name="CARRITO_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PUBLICIDAD</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUBLICIDAD_ELD" id="PUBLICIDAD_ELD" value="1">
                            <label class="form-check-label" for="PUBLICIDAD_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUBLICIDAD_ELD" id="PUBLICIDAD_ELD_No" value="0">
                            <label class="form-check-label" for="PUBLICIDAD_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PUBLICIDAD_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUBLICIDAD_ELD_OBS" rows="2" name="PUBLICIDAD_ELD_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ELD" id="OTROS_ELD" value="1">
                            <label class="form-check-label" for="OTROS_ELD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ELD" id="OTROS_ELD_No" value="0">
                            <label class="form-check-label" for="OTROS_ELD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_ELD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_ELD_OBS" rows="2" name="OTROS_ELD_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_eli">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>EXTERIOR LATERAL IZQUIERDO</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_eli')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_eli')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_eli')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">LOGO CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CRTM_LOGO_ELI" id="CRTM_LOGO_ELI" value="1">
                            <label class="form-check-label" for="CRTM_LOGO_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CRTM_LOGO_ELI" id="CRTM_LOGO_ELI_No" value="0">
                            <label class="form-check-label" for="CRTM_LOGO_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CRTM_LOGO_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CRTM_LOGO_ELI_OBS" rows="2" name="CRTM_LOGO_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">LOGO EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_ELI" id="LOGO_EMPRESA_ELI" value="1">
                            <label class="form-check-label" for="LOGO_EMPRESA_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="LOGO_EMPRESA_ELI" id="LOGO_EMPRESA_ELI_No" value="0">
                            <label class="form-check-label" for="LOGO_EMPRESA_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="LOGO_EMPRESA_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="LOGO_EMPRESA_ELI_OBS" rows="2" name="LOGO_EMPRESA_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ELI" id="WEB_CRTM_ELI" value="1">
                            <label class="form-check-label" for="WEB_CRTM_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ELI" id="WEB_CRTM_ELI_No" value="0">
                            <label class="form-check-label" for="WEB_CRTM_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_CRTM_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_CRTM_ELI_OBS" rows="2" name="WEB_CRTM_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">CAMARA COMERCIO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CAMARA_COMERCIO_ELI" id="CAMARA_COMERCIO_ELI" value="1">
                            <label class="form-check-label" for="CAMARA_COMERCIO_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CAMARA_COMERCIO_ELI" id="CAMARA_COMERCIO_ELI_No" value="0">
                            <label class="form-check-label" for="CAMARA_COMERCIO_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CAMARA_COMERCIO_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CAMARA_COMERCIO_ELI_OBS" rows="2" name="CAMARA_COMERCIO_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDA EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ELI" id="SALIDA_EMERGENCIA_ELI" value="1">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ELI" id="SALIDA_EMERGENCIA_ELI_No" value="0">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_EMERGENCIA_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_EMERGENCIA_ELI_OBS" rows="2" name="SALIDA_EMERGENCIA_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">GRUPO RUIZ</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GRUPO_RUIZ_ELI" id="GRUPO_RUIZ_ELI" value="1">
                            <label class="form-check-label" for="GRUPO_RUIZ_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GRUPO_RUIZ_ELI" id="GRUPO_RUIZ_ELI_No" value="0">
                            <label class="form-check-label" for="GRUPO_RUIZ_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="GRUPO_RUIZ_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="GRUPO_RUIZ_ELI_OBS" rows="2" name="GRUPO_RUIZ_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">NÚMERO VEHÍCULO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_ELI" id="NUMERO_VEHICULO_ELI" value="1">
                            <label class="form-check-label" for="NUMERO_VEHICULO_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="NUMERO_VEHICULO_ELI" id="NUMERO_VEHICULO_ELI_No" value="0">
                            <label class="form-check-label" for="NUMERO_VEHICULO_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="NUMERO_VEHICULO_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="NUMERO_VEHICULO_ELI_OBS" rows="2" name="NUMERO_VEHICULO_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PUBLICIDAD</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUBLICIDAD_ELI" id="PUBLICIDAD_ELI" value="1">
                            <label class="form-check-label" for="PUBLICIDAD_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PUBLICIDAD_ELI" id="PUBLICIDAD_ELI_No" value="0">
                            <label class="form-check-label" for="PUBLICIDAD_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PUBLICIDAD_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PUBLICIDAD_ELI_OBS" rows="2" name="PUBLICIDAD_ELI_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ELI" id="OTROS_ELI" value="1">
                            <label class="form-check-label" for="OTROS_ELI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ELI" id="OTROS_ELI_No" value="0">
                            <label class="form-check-label" for="OTROS_ELI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_ELI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_ELI_OBS" rows="2" name="OTROS_ELI_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_eluna">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>EXTERIOR LUNA</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_eluna')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_eluna')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_eluna')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">SALIDA EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_EL" id="SALIDA_EMERGENCIA_EL" value="1">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_EL">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_EL" id="SALIDA_EMERGENCIA_EL_No" value="0">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_EL_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_EMERGENCIA_EL_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_EMERGENCIA_EL_OBS" rows="2" name="SALIDA_EMERGENCIA_EL_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">GRUPO RUIZ</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GRUPO_RUIZ_EL" id="GRUPO_RUIZ_EL" value="1">
                            <label class="form-check-label" for="GRUPO_RUIZ_EL">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="GRUPO_RUIZ_EL" id="GRUPO_RUIZ_EL_No" value="0">
                            <label class="form-check-label" for="GRUPO_RUIZ_EL_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="GRUPO_RUIZ_EL_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="GRUPO_RUIZ_EL_OBS" rows="2" name="GRUPO_RUIZ_EL_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row align-items-center mt-5 bordes" id="estado_pegatinas_interior">
        <div class="col-12">
            <h5>ESTADO PEGATINAS INTERIORES</h5>
        </div>
        <div class="col-11 offset-1 mb-3 mt-3">
            <div class="row">
                <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_interior')">OK</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_interior')">NO</a></div>
                <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_interior')">Limpiar</a></div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-2" id="estado_pegatinas_ic">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>INTERIOR CENTRAL</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_ic')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_ic')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_ic')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">TARIFAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_IC" id="TARIFAS_IC" value="1">
                            <label class="form-check-label" for="TARIFAS_IC">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_IC" id="TARIFAS_IC_No" value="0">
                            <label class="form-check-label" for="TARIFAS_IC_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TARIFAS_IC_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TARIFAS_IC_OBS" rows="2" name="TARIFAS_IC_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PLAN DE EVACUACION</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PLAN_EVACUACION_IC" id="PLAN_EVACUACION_IC" value="1">
                            <label class="form-check-label" for="PLAN_EVACUACION_IC">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PLAN_EVACUACION_IC" id="PLAN_EVACUACION_IC_No" value="0">
                            <label class="form-check-label" for="PLAN_EVACUACION_IC_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PLAN_EVACUACION_IC_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PLAN_EVACUACION_IC_OBS" rows="2" name="PLAN_EVACUACION_IC_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">COVID</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="COVID_IC" id="COVID_IC" value="1">
                            <label class="form-check-label" for="COVID_IC">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="COVID_IC" id="COVID_IC_No" value="0">
                            <label class="form-check-label" for="COVID_IC_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="COVID_IC_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="COVID_IC_OBS" rows="2" name="COVID_IC_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">CODIGO QR ENCUESTA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="QR_ENCUESTA_IC" id="QR_ENCUESTA_IC" value="1">
                            <label class="form-check-label" for="QR_ENCUESTA_IC">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="QR_ENCUESTA_IC" id="QR_ENCUESTA_IC_No" value="0">
                            <label class="form-check-label" for="QR_ENCUESTA_IC_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="QR_ENCUESTA_IC_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="QR_ENCUESTA_IC_OBS" rows="2" name="QR_ENCUESTA_IC_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_id">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>INTERIOR DELANTERA</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_id')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_id')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_id')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">VÍDEOVIGILANCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VIDEOVIGILANCIA_ID" id="VIDEOVIGILANCIA_ID" value="1">
                            <label class="form-check-label" for="VIDEOVIGILANCIA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VIDEOVIGILANCIA_ID" id="VIDEOVIGILANCIA_ID_No" value="0">
                            <label class="form-check-label" for="VIDEOVIGILANCIA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="VIDEOVIGILANCIA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VIDEOVIGILANCIA_ID_OBS" rows="2" name="VIDEOVIGILANCIA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PROHÍBIDO FUMAR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PROHIBIDO_FUMAR_ID" id="PROHIBIDO_FUMAR_ID" value="1">
                            <label class="form-check-label" for="PROHIBIDO_FUMAR_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PROHIBIDO_FUMAR_ID" id="PROHIBIDO_FUMAR_ID_No" value="0">
                            <label class="form-check-label" for="PROHIBIDO_FUMAR_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PROHIBIDO_FUMAR_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PROHIBIDO_FUMAR_ID_OBS" rows="2" name="PROHIBIDO_FUMAR_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PTM_ID" id="PTM_ID" value="1">
                            <label class="form-check-label" for="PTM_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PTM_ID" id="PTM_ID_No" value="0">
                            <label class="form-check-label" for="PTM_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PTM_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PTM_ID_OBS" rows="2" name="PTM_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">CAMBIO MÁXIMO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CAMBIO_MAXIMO_ID" id="CAMBIO_MAXIMO_ID" value="1">
                            <label class="form-check-label" for="CAMBIO_MAXIMO_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CAMBIO_MAXIMO_ID" id="CAMBIO_MAXIMO_ID_No" value="0">
                            <label class="form-check-label" for="CAMBIO_MAXIMO_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CAMBIO_MAXIMO_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CAMBIO_MAXIMO_ID_OBS" rows="2" name="CAMBIO_MAXIMO_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">TARIFAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_ID" id="TARIFAS_ID" value="1">
                            <label class="form-check-label" for="TARIFAS_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_ID" id="TARIFAS_ID_No" value="0">
                            <label class="form-check-label" for="TARIFAS_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TARIFAS_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TARIFAS_ID_OBS" rows="2" name="TARIFAS_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OCPUACIÓN MÁXIMA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OCUPACION_MAXIMA_ID" id="OCUPACION_MAXIMA_ID" value="1">
                            <label class="form-check-label" for="OCUPACION_MAXIMA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OCUPACION_MAXIMA_ID" id="OCUPACION_MAXIMA_ID_No" value="0">
                            <label class="form-check-label" for="OCUPACION_MAXIMA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OCUPACION_MAXIMA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OCUPACION_MAXIMA_ID_OBS" rows="2" name="OCUPACION_MAXIMA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">BOTIQUÍN</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="BOTIQUIN_ID" id="BOTIQUIN_ID" value="1">
                            <label class="form-check-label" for="BOTIQUIN_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="BOTIQUIN_ID" id="BOTIQUIN_ID_No" value="0">
                            <label class="form-check-label" for="BOTIQUIN_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="BOTIQUIN_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="BOTIQUIN_ID_OBS" rows="2" name="BOTIQUIN_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDA EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ID" id="SALIDA_EMERGENCIA_ID" value="1">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_ID" id="SALIDA_EMERGENCIA_ID_No" value="0">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_EMERGENCIA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_EMERGENCIA_ID_OBS" rows="2" name="SALIDA_EMERGENCIA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">EXTINTOR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EXTINTOR_ID" id="EXTINTOR_ID" value="1">
                            <label class="form-check-label" for="EXTINTOR_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EXTINTOR_ID" id="EXTINTOR_ID_No" value="0">
                            <label class="form-check-label" for="EXTINTOR_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="EXTINTOR_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="EXTINTOR_ID_OBS" rows="2" name="EXTINTOR_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">MARTILLOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS_ID" id="MARTILLOS_ID" value="1">
                            <label class="form-check-label" for="MARTILLOS_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS_ID" id="MARTILLOS_ID_No" value="0">
                            <label class="form-check-label" for="MARTILLOS_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MARTILLOS_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MARTILLOS_ID_OBS" rows="2" name="MARTILLOS_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">DESINSECTACION</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="DESINSECTACION_ID" id="DESINSECTACION_ID" value="1">
                            <label class="form-check-label" for="DESINSECTACION_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="DESINSECTACION_ID" id="DESINSECTACION_ID_No" value="0">
                            <label class="form-check-label" for="DESINSECTACION_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="DESINSECTACION_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="DESINSECTACION_ID_OBS" rows="2" name="DESINSECTACION_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">VALIDAR TARJETAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VALIDAR_TARJETA_ID" id="VALIDAR_TARJETA_ID" value="1">
                            <label class="form-check-label" for="VALIDAR_TARJETA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VALIDAR_TARJETA_ID" id="VALIDAR_TARJETA_ID_No" value="0">
                            <label class="form-check-label" for="VALIDAR_TARJETA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="VALIDAR_TARJETA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VALIDAR_TARJETA_ID_OBS" rows="2" name="VALIDAR_TARJETA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">ASIENTOS RESERVADOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_RESERVADOS_ID" id="ASIENTOS_RESERVADOS_ID" value="1">
                            <label class="form-check-label" for="ASIENTOS_RESERVADOS_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_RESERVADOS_ID" id="ASIENTOS_RESERVADOS_ID_No" value="0">
                            <label class="form-check-label" for="ASIENTOS_RESERVADOS_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIENTOS_RESERVADOS_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIENTOS_RESERVADOS_ID_OBS" rows="2" name="ASIENTOS_RESERVADOS_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PMR_ID" id="PMR_ID" value="1">
                            <label class="form-check-label" for="PMR_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PMR_ID" id="PMR_ID_No" value="0">
                            <label class="form-check-label" for="PMR_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PMR_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PMR_ID_OBS" rows="2" name="PMR_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PERRO GUÍA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PERRO_GUIA_ID" id="PERRO_GUIA_ID" value="1">
                            <label class="form-check-label" for="PERRO_GUIA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PERRO_GUIA_ID" id="PERRO_GUIA_ID_No" value="0">
                            <label class="form-check-label" for="PERRO_GUIA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PERRO_GUIA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PERRO_GUIA_ID_OBS" rows="2" name="PERRO_GUIA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_EMPRESA_ID" id="WEB_EMPRESA_ID" value="1">
                            <label class="form-check-label" for="WEB_EMPRESA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_EMPRESA_ID" id="WEB_EMPRESA_ID_No" value="0">
                            <label class="form-check-label" for="WEB_EMPRESA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_EMPRESA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_EMPRESA_ID_OBS" rows="2" name="WEB_EMPRESA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ID" id="WEB_CRTM_ID" value="1">
                            <label class="form-check-label" for="WEB_CRTM_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_ID" id="WEB_CRTM_ID_No" value="0">
                            <label class="form-check-label" for="WEB_CRTM_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_CRTM_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_CRTM_ID_OBS" rows="2" name="WEB_CRTM_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">APERTURA DE EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="APERTURA_EMERGENCIA_ID" id="APERTURA_EMERGENCIA_ID" value="1">
                            <label class="form-check-label" for="APERTURA_EMERGENCIA_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="APERTURA_EMERGENCIA_ID" id="APERTURA_EMERGENCIA_ID_No" value="0">
                            <label class="form-check-label" for="APERTURA_EMERGENCIA_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="APERTURA_EMERGENCIA_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="APERTURA_EMERGENCIA_ID_OBS" rows="2" name="APERTURA_EMERGENCIA_ID_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ID" id="OTROS_ID" value="1">
                            <label class="form-check-label" for="OTROS_ID">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ID" id="OTROS_ID_No" value="0">
                            <label class="form-check-label" for="OTROS_ID_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_ID_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_ID_OBS" rows="2" name="OTROS_ID_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_ili">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>INTERIOR LATERAL IZQUIERDO</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_ili')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_ili')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_ili')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">CIVISMO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CIVISMO_ILI" id="CIVISMO_ILI" value="1">
                            <label class="form-check-label" for="CIVISMO_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CIVISMO_ILI" id="CIVISMO_ILI_No" value="0">
                            <label class="form-check-label" for="CIVISMO_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CIVISMO_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CIVISMO_ILI_OBS" rows="2" name="CIVISMO_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">SALIDAS EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDAS_EMERGENCIA_ILI" id="SALIDAS_EMERGENCIA_ILI" value="1">
                            <label class="form-check-label" for="SALIDAS_EMERGENCIA_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDAS_EMERGENCIA_ILI" id="SALIDAS_EMERGENCIA_ILI_No" value="0">
                            <label class="form-check-label" for="SALIDAS_EMERGENCIA_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDAS_EMERGENCIA_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDAS_EMERGENCIA_ILI_OBS" rows="2" name="SALIDAS_EMERGENCIA_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">ASIENTOS RESERVADOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_RESERVADOS_ILI" id="ASIENTOS_RESERVADOS_ILI" value="1">
                            <label class="form-check-label" for="ASIENTOS_RESERVADOS_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_RESERVADOS_ILI" id="ASIENTOS_RESERVADOS_ILI_No" value="0">
                            <label class="form-check-label" for="ASIENTOS_RESERVADOS_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIENTOS_RESERVADOS_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIENTOS_RESERVADOS_ILI_OBS" rows="2" name="ASIENTOS_RESERVADOS_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">PERRO GUÍA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PERRO_GUIA_ILI" id="PERRO_GUIA_ILI" value="1">
                            <label class="form-check-label" for="PERRO_GUIA_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PERRO_GUIA_ILI" id="PERRO_GUIA_ILI_No" value="0">
                            <label class="form-check-label" for="PERRO_GUIA_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PERRO_GUIA_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PERRO_GUIA_ILI_OBS" rows="2" name="PERRO_GUIA_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">PLAN EVACUACIÓN</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PLAN_EVACUACION_ILI" id="PLAN_EVACUACION_ILI" value="1">
                            <label class="form-check-label" for="PLAN_EVACUACION_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PLAN_EVACUACION_ILI" id="PLAN_EVACUACION_ILI_No" value="0">
                            <label class="form-check-label" for="PLAN_EVACUACION_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PLAN_EVACUACION_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PLAN_EVACUACION_ILI_OBS" rows="2" name="PLAN_EVACUACION_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">ASIDEROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIDEROS_ILI" id="ASIDEROS_ILI" value="1">
                            <label class="form-check-label" for="ASIDEROS_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIDEROS_ILI" id="ASIDEROS_ILI_No" value="0">
                            <label class="form-check-label" for="ASIDEROS_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIDEROS_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIDEROS_ILI_OBS" rows="2" name="ASIDEROS_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">VIDEOVIGILANCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VIDEOVIGILANCIA_ILI" id="VIDEOVIGILANCIA_ILI" value="1">
                            <label class="form-check-label" for="VIDEOVIGILANCIA_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VIDEOVIGILANCIA_ILI" id="VIDEOVIGILANCIA_ILI_No" value="0">
                            <label class="form-check-label" for="VIDEOVIGILANCIA_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="VIDEOVIGILANCIA_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VIDEOVIGILANCIA_ILI_OBS" rows="2" name="VIDEOVIGILANCIA_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">PROHIBIDO FUMAR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PROHIBIDO_FUMAR_ILI" id="PROHIBIDO_FUMAR_ILI" value="1">
                            <label class="form-check-label" for="PROHIBIDO_FUMAR_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PROHIBIDO_FUMAR_ILI" id="PROHIBIDO_FUMAR_ILI_No" value="0">
                            <label class="form-check-label" for="PROHIBIDO_FUMAR_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PROHIBIDO_FUMAR_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PROHIBIDO_FUMAR_ILI_OBS" rows="2" name="PROHIBIDO_FUMAR_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">CINTURON</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURON_ILI" id="CINTURON_ILI" value="1">
                            <label class="form-check-label" for="CINTURON_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURON_ILI" id="CINTURON_ILI_No" value="0">
                            <label class="form-check-label" for="CINTURON_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CINTURON_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CINTURON_ILI_OBS" rows="2" name="CINTURON_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">TARIFAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_ILI" id="TARIFAS_ILI" value="1">
                            <label class="form-check-label" for="TARIFAS_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_ILI" id="TARIFAS_ILI_No" value="0">
                            <label class="form-check-label" for="TARIFAS_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TARIFAS_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TARIFAS_ILI_OBS" rows="2" name="TARIFAS_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">QR EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="QR_EMPRESA_ILI" id="QR_EMPRESA_ILI" value="1">
                            <label class="form-check-label" for="QR_EMPRESA_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="QR_EMPRESA_ILI" id="QR_EMPRESA_ILI_No" value="0">
                            <label class="form-check-label" for="QR_EMPRESA_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="QR_EMPRESA_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="QR_EMPRESA_ILI_OBS" rows="2" name="QR_EMPRESA_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">SILLA DE RUEDAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SILLA_RUEDAS_ILI" id="SILLA_RUEDAS_ILI" value="1">
                            <label class="form-check-label" for="SILLA_RUEDAS_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SILLA_RUEDAS_ILI" id="SILLA_RUEDAS_ILI_No" value="0">
                            <label class="form-check-label" for="SILLA_RUEDAS_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SILLA_RUEDAS_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SILLA_RUEDAS_ILI_OBS" rows="2" name="SILLA_RUEDAS_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">COLOCACIÓN</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="COLOCACION_ILI" id="COLOCACION_ILI" value="1">
                            <label class="form-check-label" for="COLOCACION_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="COLOCACION_ILI" id="COLOCACION_ILI_No" value="0">
                            <label class="form-check-label" for="COLOCACION_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="COLOCACION_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="COLOCACION_ILI_OBS" rows="2" name="COLOCACION_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">RESERVADO SILLA/CARRO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RESERVADO_ILI" id="RESERVADO_ILI" value="1">
                            <label class="form-check-label" for="RESERVADO_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RESERVADO_ILI" id="RESERVADO_ILI_No" value="0">
                            <label class="form-check-label" for="RESERVADO_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="RESERVADO_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="RESERVADO_ILI_OBS" rows="2" name="RESERVADO_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">MARTILLOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS_ILI" id="MARTILLOS_ILI" value="1">
                            <label class="form-check-label" for="MARTILLOS_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS_ILI" id="MARTILLOS_ILI_No" value="0">
                            <label class="form-check-label" for="MARTILLOS_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MARTILLOS_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MARTILLOS_ILI_OBS" rows="2" name="MARTILLOS_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ILI" id="OTROS_ILI" value="1">
                            <label class="form-check-label" for="OTROS_ILI">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ILI" id="OTROS_ILI_No" value="0">
                            <label class="form-check-label" for="OTROS_ILI_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_ILI_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_ILI_OBS" rows="2" name="OTROS_ILI_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pegatinas interior lateral derecho -->

        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_ild">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>INTERIOR LATERAL DERECHO</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_ild')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_ild')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_ild')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">CIVISMO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CIVISMO_ILD" id="CIVISMO_ILD" value="1">
                            <label class="form-check-label" for="CIVISMO_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CIVISMO_ILD" id="CIVISMO_ILD_No" value="0">
                            <label class="form-check-label" for="CIVISMO_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CIVISMO_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CIVISMO_ILD_OBS" rows="2" name="CIVISMO_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">SALIDAS EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDAS_EMERGENCIA_ILD" id="SALIDAS_EMERGENCIA_ILD" value="1">
                            <label class="form-check-label" for="SALIDAS_EMERGENCIA_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDAS_EMERGENCIA_ILD" id="SALIDAS_EMERGENCIA_ILD_No" value="0">
                            <label class="form-check-label" for="SALIDAS_EMERGENCIA_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDAS_EMERGENCIA_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDAS_EMERGENCIA_ILD_OBS" rows="2" name="SALIDAS_EMERGENCIA_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">ASIENTOS RESERVADOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_RESERVADOS_ILD" id="ASIENTOS_RESERVADOS_ILD" value="1">
                            <label class="form-check-label" for="ASIENTOS_RESERVADOS_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIENTOS_RESERVADOS_ILD" id="ASIENTOS_RESERVADOS_ILD_No" value="0">
                            <label class="form-check-label" for="ASIENTOS_RESERVADOS_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIENTOS_RESERVADOS_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIENTOS_RESERVADOS_ILD_OBS" rows="2" name="ASIENTOS_RESERVADOS_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">SILLA DE RUEDAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SILLA_RUEDAS_ILD" id="SILLA_RUEDAS_ILD" value="1">
                            <label class="form-check-label" for="SILLA_RUEDAS_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SILLA_RUEDAS_ILD" id="SILLA_RUEDAS_ILD_No" value="0">
                            <label class="form-check-label" for="SILLA_RUEDAS_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SILLA_RUEDAS_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SILLA_RUEDAS_ILD_OBS" rows="2" name="SILLA_RUEDAS_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">CARRITO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CARRITO_ILD" id="CARRITO_ILD" value="1">
                            <label class="form-check-label" for="CARRITO_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CARRITO_ILD" id="CARRITO_ILD_No" value="0">
                            <label class="form-check-label" for="CARRITO_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CARRITO_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CARRITO_ILD_OBS" rows="2" name="CARRITO_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">APERTURA DE EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="APERTURA_EMERGENCIA_ILD" id="APERTURA_EMERGENCIA_ILD" value="1">
                            <label class="form-check-label" for="APERTURA_EMERGENCIA_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="APERTURA_EMERGENCIA_ILD" id="APERTURA_EMERGENCIA_ILD_No" value="0">
                            <label class="form-check-label" for="APERTURA_EMERGENCIA_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="APERTURA_EMERGENCIA_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="APERTURA_EMERGENCIA_ILD_OBS" rows="2" name="APERTURA_EMERGENCIA_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ILD" id="OTROS_ILD" value="1">
                            <label class="form-check-label" for="OTROS_ILD">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_ILD" id="OTROS_ILD_No" value="0">
                            <label class="form-check-label" for="OTROS_ILD_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_ILD_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_ILD_OBS" rows="2" name="OTROS_ILD_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- INTERIOR TRASERA -->

 
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_it">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>INTERIOR TRASERA</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_it')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_it')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_it')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">MARTILLO</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLO_IT" id="MARTILLO_IT" value="1">
                            <label class="form-check-label" for="MARTILLO_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLO_IT" id="MARTILLO_IT_No" value="0">
                            <label class="form-check-label" for="MARTILLO_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MARTILLO_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MARTILLO_IT_OBS" rows="2" name="MARTILLO_IT_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PROHIBIDO FUMAR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PROHIBIDO_FUMAR_IT" id="PROHIBIDO_FUMAR_IT" value="1">
                            <label class="form-check-label" for="PROHIBIDO_FUMAR_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PROHIBIDO_FUMAR_IT" id="PROHIBIDO_FUMAR_IT_No" value="0">
                            <label class="form-check-label" for="PROHIBIDO_FUMAR_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PROHIBIDO_FUMAR_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PROHIBIDO_FUMAR_IT_OBS" rows="2" name="PROHIBIDO_FUMAR_IT_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PMR_IT" id="PMR_IT" value="1">
                            <label class="form-check-label" for="PMR_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PMR_IT" id="PMR_IT_No" value="0">
                            <label class="form-check-label" for="PMR_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PMR_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PMR_IT_OBS" rows="2" name="PMR_IT_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">VIDEOVIGILANCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VIDEOVIGILANCIA_IT" id="VIDEOVIGILANCIA_IT" value="1">
                            <label class="form-check-label" for="VIDEOVIGILANCIA_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VIDEOVIGILANCIA_IT" id="VIDEOVIGILANCIA_IT_No" value="0">
                            <label class="form-check-label" for="VIDEOVIGILANCIA_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="VIDEOVIGILANCIA_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="VIDEOVIGILANCIA_IT_OBS" rows="2" name="VIDEOVIGILANCIA_IT_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">ASIDEROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIDEROS_IT" id="ASIDEROS_IT" value="1">
                            <label class="form-check-label" for="ASIDEROS_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ASIDEROS_IT" id="ASIDEROS_IT_No" value="0">
                            <label class="form-check-label" for="ASIDEROS_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ASIDEROS_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ASIDEROS_IT_OBS" rows="2" name="ASIDEROS_IT_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">SALIDAS EMERGENCIA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_IT" id="SALIDA_EMERGENCIA_IT" value="1">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SALIDA_EMERGENCIA_IT" id="SALIDA_EMERGENCIA_IT_No" value="0">
                            <label class="form-check-label" for="SALIDA_EMERGENCIA_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="SALIDA_EMERGENCIA_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="SALIDA_EMERGENCIA_IT_OBS" rows="2" name="SALIDA_EMERGENCIA_IT_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">OTROS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_IT" id="OTROS_IT" value="1">
                            <label class="form-check-label" for="OTROS_IT">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OTROS_IT" id="OTROS_IT_No" value="0">
                            <label class="form-check-label" for="OTROS_IT_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="OTROS_IT_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="OTROS_IT_OBS" rows="2" name="OTROS_IT_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_mi">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>MAMPARA INTERIOR</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_mi')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_mi')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_mi')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">TARIFAS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_IM" id="TARIFAS_IM" value="1">
                            <label class="form-check-label" for="TARIFAS_IM">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TARIFAS_IM" id="TARIFAS_IM_No" value="0">
                            <label class="form-check-label" for="TARIFAS_IM_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TARIFAS_IM_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TARIFAS_IM_OBS" rows="2" name="TARIFAS_IM_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">PERRO GUÍA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PERRO_GUIA_IM" id="PERRO_GUIA_IM" value="1">
                            <label class="form-check-label" for="PERRO_GUIA_IM">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PERRO_GUIA_IM" id="PERRO_GUIA_IM_No" value="0">
                            <label class="form-check-label" for="PERRO_GUIA_IM_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="PERRO_GUIA_IM_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="PERRO_GUIA_IM_OBS" rows="2" name="PERRO_GUIA_IM_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">ZONA RESERVADA PMR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ZONA_RESERVADA_PMR_IM" id="ZONA_RESERVADA_PMR_IM" value="1">
                            <label class="form-check-label" for="ZONA_RESERVADA_PMR_IM">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ZONA_RESERVADA_PMR_IM" id="ZONA_RESERVADA_PMR_IM_No" value="0">
                            <label class="form-check-label" for="ZONA_RESERVADA_PMR_IM_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="ZONA_RESERVADA_PMR_IM_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="ZONA_RESERVADA_PMR_IM_OBS" rows="2" name="ZONA_RESERVADA_PMR_IM_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">TELÉFONO OPERADOR</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TELEFONO_OPERADOR_IM" id="TELEFONO_OPERADOR_IM" value="1">
                            <label class="form-check-label" for="TELEFONO_OPERADOR_IM">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TELEFONO_OPERADOR_IM" id="TELEFONO_OPERADOR_IM_No" value="0">
                            <label class="form-check-label" for="TELEFONO_OPERADOR_IM_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="TELEFONO_OPERADOR_IM_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="TELEFONO_OPERADOR_IM_OBS" rows="2" name="TELEFONO_OPERADOR_IM_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB CRTM</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_IM" id="WEB_CRTM_IM" value="1">
                            <label class="form-check-label" for="WEB_CRTM_IM">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_CRTM_IM" id="WEB_CRTM_IM_No" value="0">
                            <label class="form-check-label" for="WEB_CRTM_IM_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_CRTM_IM_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_CRTM_IM_OBS" rows="2" name="WEB_CRTM_IM_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">WEB EMPRESA</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_EMPRESA_IM" id="WEB_EMPRESA_IM" value="1">
                            <label class="form-check-label" for="WEB_EMPRESA_IM">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="WEB_EMPRESA_IM" id="WEB_EMPRESA_IM_No" value="0">
                            <label class="form-check-label" for="WEB_EMPRESA_IM_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="WEB_EMPRESA_IM_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="WEB_EMPRESA_IM_OBS" rows="2" name="WEB_EMPRESA_IM_OBS"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 offset-1 mt-5" id="estado_pegatinas_iluna">
            <div class="row bordes">
                <div class="col-12 mb-2">
                    <h6>INTERIOR LUNA</h6>
                </div>
                <div class="col-12 mb-3 mt-3">
                    <div class="row">
                        <div class="col"><a href="javascript:void(0)" class="btn btn-success" onclick="marcarTodoOk('estado_pegatinas_iluna')">OK</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-danger" onclick="marcarTodoNoOk('estado_pegatinas_iluna')">NO</a></div>
                        <div class="col"><a href="javascript:void(0)" class="btn btn-warning" onclick="desmarcarTodo('estado_pegatinas_iluna')">Limpiar</a></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-2">
                        <span class="mr-2">CINTURÓN SEGURIDAD</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURON_SEGURIDAD_IL" id="CINTURON_SEGURIDAD_IL" value="1">
                            <label class="form-check-label" for="CINTURON_SEGURIDAD_IL">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="CINTURON_SEGURIDAD_IL" id="CINTURON_SEGURIDAD_IL_No" value="0">
                            <label class="form-check-label" for="CINTURON_SEGURIDAD_IL_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="CINTURON_SEGURIDAD_IL_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="CINTURON_SEGURIDAD_IL_OBS" rows="2" name="CINTURON_SEGURIDAD_IL_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">MARTILLOS</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS_IL" id="MARTILLOS_IL" value="1">
                            <label class="form-check-label" for="MARTILLOS_IL">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="MARTILLOS_IL" id="MARTILLOS_IL_No" value="0">
                            <label class="form-check-label" for="MARTILLOS_IL_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="MARTILLOS_IL_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="MARTILLOS_IL_OBS" rows="2" name="MARTILLOS_IL_OBS"></textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="mr-2">EXTINTORES</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EXTINTORES_IL" id="EXTINTORES_IL" value="1">
                            <label class="form-check-label" for="EXTINTORES_IL">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EXTINTORES_IL" id="EXTINTORES_IL_No" value="0">
                            <label class="form-check-label" for="EXTINTORES_IL_No">No ok</label>
                        </div>
                        <div class="form-group">
                            <label for="EXTINTORES_IL_OBS">OBSERVACIONES</label>
                            <textarea class="form-control" id="EXTINTORES_IL_OBS" rows="2" name="EXTINTORES_IL_OBS"></textarea>
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
<!-- <script src="js/observaciones_obligatorias.js"></script> -->
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