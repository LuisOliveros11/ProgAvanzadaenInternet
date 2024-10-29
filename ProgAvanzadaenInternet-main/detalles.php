<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Productos</title>
</head>

<body>
    <?php include "App/AuthController.php"?>
    <?php 
            $authController = new AuthController();  
            $slug = $_GET["slug"];
            $detallesProducto = $authController->obtenerProductoPorSlug($slug);
    ?>
    <div class="row g-0">
        <div class="col-2">
            <div class="sidebar d-none d-md-block bg-dark text-white text-center fs-3 vh-100">
                <div class="titulo">
                    Menu
                </div>
                <hr>
                <div class="opciones mt-3 fs-5">
                    <ul class="list-unstyled">
                        <li class="mb-4">
                            <button type="button" class="btn btn-light w-50">
                                Home
                            </button>
                        </li>
                        <li class="mb-4">
                            <button type="button" class="btn btn-light w-50">
                                Dashboard
                            </button>
                        </li>
                        <li class="mb-4">
                            <button type="button" class="btn btn-light w-50">
                                Pedidos
                            </button>
                        </li>
                        <li class="mb-4">
                            <button type="button" class="btn btn-light w-50">
                                Productos
                            </button>
                        </li>
                        <li class="mb-4">
                            <button type="button" class="btn btn-light w-50">
                                Clientes
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col navbar-full">
            <div class="barra">
                <nav class="navbar navbar-expand-lg bg-body-tertiary d-md-vw-100" data-bs-theme="dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Inicio</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Tienda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Ofertas</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Productos
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Camisa</a></li>
                                        <li><a class="dropdown-item" href="#">Pantalones</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Ayuda</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </nav>
                <div class="cartas">
                    <div class="card w-75 mb-3 ms-5 mt-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div id="carouselExample" class="carousel slide">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="<?php echo $detallesProducto->cover; ?>"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="<?php echo $detallesProducto->cover; ?>"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="<?php echo $detallesProducto->cover; ?>"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title"><?php echo $detallesProducto->name; ?></h5>
                                    <p class="card-text"><?php echo $detallesProducto->description; ?></p>
                                    <p class="card-text"><?php echo $detallesProducto->features; ?></p>
                                    <button type="button" class="btn btn-success rounded-pill" disabled><?php echo $detallesProducto->brand->name; ?></button>
                                    <?php foreach ($detallesProducto->categories as $categoria): ?>
                                        <button type="button" class="btn btn-primary rounded-pill" disabled><?php echo $categoria->name; ?></button>
                                    <?php endforeach; ?>
                                    <?php foreach ($detallesProducto->tags as $etiqueta): ?>
                                        <button type="button" class="btn btn-warning rounded-pill" disabled><?php echo $etiqueta->name; ?></button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>