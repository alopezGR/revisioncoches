<?php
$empresas = array(8 => "Empresa Martín", 21 => "Autoperiferia", 10 => 'Empresa Ruiz', 14 => 'TMURCIA', 5 => 'Unauto', 22 => 'Mallorca');
?>

<form method="post" action="index.php?controller=repostaje&action=procesarFormulario">
    <input type="hidden" value="<?php echo $resultado['id'] ?>" name="IDVEHICULO">
    <input type="hidden" value="<?php echo $revision['id'] ?>" name="IDREVISION">
    <div class="row align-items-center bordes">
        <div class="col-12">
            <h5>VEHÍCULO</h5>
        </div>
        <div class="col-6" style=" height: 200px">
            <div class="form-group">
                <label for="NUMERO">NÚMERO</label>
                <input type="text" class="form-control revision-correcta" id="NUMERO" name="CODIGO_VEHICULO" readonly value="<?php echo $vehiculo; ?>">
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
            <h5>REPOSTAJE (Revisado)</h5>
        </div>
        <div class="col-11 offset-1 mt-2">
            <div class="row bordes">
                <div class="col-12 mb-3">
                    <h6>DATOS REPOSTAJE</h6>
                </div>
                <div class="col-12">
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="GASOLEO">GASÓLEO (Litros)</label>
                            <input type="number" class="form-control" id="GASOLEO" name="GASOLEO" placeholder="" value="<?php echo $revision['gasoleo'] ?>">
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="">SURTIDOR GASÓLEO</label>
                            <select name="SURTIDORGASOLEO" class="custom-select mb-3">
                                <option value="1" <?php if($revision['surtidorgasoleo'] == '1') echo 'selected'?>>Surtidor 1</option>
                                <option value="2" <?php if($revision['surtidorgasoleo'] == '2') echo 'selected'?>>Surtidor 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="UREA">UREA (Litros)</label>
                            <input type="number" class="form-control" id="UREA" name="UREA" placeholder="" value="<?php echo $revision['urea'] ?>">
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="">SURTIDOR URÉA</label>
                            <select name="SURTIDORUREA" class="custom-select mb-3">
                                <option value="1" <?php if($revision['surtidorurea'] == '1') echo 'selected'?>>Surtidor 1</option>
                                <option value="2" <?php if($revision['surtidorurea'] == '2') echo 'selected'?>>Surtidor 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="NIVELACEITE">NIVEL ACEITE</label>
                            <input type="text" class="form-control" id="NIVELACEITE" name="NIVELACEITE" placeholder="" value="<?php echo $revision['nivelaceite'] ?>">
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="NIVELREFRIGERANTE">NIVEL REFRIGERANTE</label>
                            <input type="text" class="form-control" id="NIVELREFRIGERANTE" name="NIVELREFRIGERANTE" placeholder="" value="<?php echo $revision['nivelrefrigerante'] ?>">
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-group">
                            <label for="KM">KILÓMETROS</label>
                            <input type="text" class="form-control" id="KM" name="KM" placeholder="" value="<?php echo $revision['km'] ?>">
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