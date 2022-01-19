
<div class="row justify-content-center">
    <?php
    if (isset($_GET['error']) && $_GET['error'])
        echo " <div class='col-12 alert alert-danger' role='alert'>
                    El ususario o la contraseña son incorrectos.
                 </div>";
    ?>
    <div class="col-5 formulario">
        <form action='index.php?controller=usuario&action=checkLogin' method='post'>
            <legend>
                <h2>Login</h2>
            </legend>
            <div class="form-group">
                <label for="emailLogin">Usuario</label>
                <input type="text" class="form-control" name ="email" id="emailLogin">
            </div>
            <div class="form-group">
                <label for="passwordLogin">Contraseña</label>
                <input type="password" class="form-control" name="password" id="passwordLogin">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

</div>

