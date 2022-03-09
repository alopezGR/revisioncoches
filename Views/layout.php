<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/lightpick.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/estilos.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Grupo Ruiz</title>


    <style>
        body {
            padding-bottom: 50px;
        }

        .bordes {
            border-bottom: solid 1px #999;
            border-left: solid 1px #999;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

    <body>
        <div class="d-flex">

        </div>
        <div class="container">
            <div class="row mt-1">
                <div class="col-12 d-flex justify-content-center">
                    <img src="images/Logo-GR.png" width="20%" />
                </div>
            </div>
            <div class="row"></div>
            <div class="d-flex <?php echo (($controller == 'menu' && $action == 'index')) ? "justify-content-end" : "justify-content-between"; ?> mt-2 mb-5">
                <?php
                if (!($controller == 'menu' && $action == 'index') && isset($_SESSION['logged'])) {
                    echo "<a class='btn btn-outline-primary' href='javascript:window.history.back()'>Volver</a>";
                }
                ?>
                <?php
                if (isset($_SESSION['logged'])) {
                    echo "<a class='btn btn-danger' href='index.php?controller=usuario&action=salir'>Salir</a>";
                }
                ?>

            </div>
            <?php require_once('routes.php'); ?>
        </div>
        <footer class="text-muted text-center text-small" style="background-color: #001A5A; position:fixed; bottom:0px; width: 100%">
            <span style="color: white; margin-left:auto; margin-right: auto;" class="mb-1">Todos los derechos reservados © Grupo Ruiz <?php echo date('Y'); ?>.</span>
        </footer>

    </body>

</html>