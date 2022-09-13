<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Document</title>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gimnasio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo constant('URLBASE')?>index/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo constant('URLBASE')?>ArticuloController/buscarArticulos">Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo constant('URLBASE')?>ClienteController/buscarClientes">Cliente</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo constant('URLBASE')?>NosotrosController/buscarNosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo constant('URLBASE')?>ProductoController/buscarProductos">Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo constant('URLBASE')?>SuscripcionController/buscarSuscripcion">Suscripcion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo constant('URLBASE')?>LoginController/login">Iniciar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>