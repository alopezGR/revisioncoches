<div class="row justify-content-center">
    <div class="col-5 formulario">
        <p>Debe introducir una nueva contraseña para comenzar a utilizar la aplicación</p>
        <form action='index.php?controller=usuario&action=cambiarPassword' method='post'>
            <input type="hidden" name="usuario" value="<?php echo $_SESSION['user'] ?>">
            <legend>
                <h2>Cambio de contraseña</h2>
            </legend>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" class="form-control" name ="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>