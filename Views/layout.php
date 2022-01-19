<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="robots" content="noindex,nofollow">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Grupo Ruiz</title>
</head>

<body>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
        <div class="container">
            <div class="d-flex justify-content-end mb-1">
                <?php
                    if(isset($_SESSION['logged'])){
                        echo "<a class='btn btn-danger' href='index.php?controller=usuario&action=salir'>Salir</a>";
                    }
                ?>
                
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img src="images/Logo-GR.png" width="40%" />
                </div>
            </div>
            <?php require_once('routes.php'); ?>
        </div>
        <footer class="text-muted text-center text-small" style="background-color: #001A5A; position:fixed; bottom:0px; width: 100%">
            <span style="color: white; margin-left:auto; margin-right: auto;" class="mb-1">Todos los derechos reservados © Grupo Ruiz 2020.</span>

        </footer>

    </body>

</html>