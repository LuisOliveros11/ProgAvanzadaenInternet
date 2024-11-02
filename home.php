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
    <?php include "App/AuthController.php" ?>
    <?php include "App/MarcasController.php" ?>
    <?php
    $authController = new AuthController();
    $listaProductos = $authController->obtenerProductos();

    $marcasController = new Marca();
    $listaMarcas = $marcasController->getAllBrands();
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
                        <a class="navbar-brand" href="#">
                            Inicio</a>
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
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Añadir producto
                    </button>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="App/AñadirProductoController.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleNombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="exampleNombre" aria-describedby=""
                                            name="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleSlug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="exampleSlug" name="slug">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleDescripcion" class="form-label">Descripcion</label>
                                        <input type="text" class="form-control" id="exampleDescripcion"
                                            aria-describedby="" name="descripcion">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFeatures" class="form-label">Features</label>
                                        <input type="text" class="form-control" id="exampleFeatures" name="features">
                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="marca">
                                        <option selected>Selecciona una marca</option>
                                            <?php foreach ($listaMarcas as $marca): ?>
                                                <option value=<?php echo $marca->id; ?>><?php echo $marca->name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                    <br>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="imagen">
                                        <label class="input-group-text" for="inputGroupFile02">Subir</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="add">Añadir</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cartas">
                    <div class="row ms-5">
                        <?php foreach ($listaProductos as $producto): ?>
                            <div class="col-3">
                                <div class="card mt-5" style="width: 22rem;">
                                    <img src="<?php echo $producto->cover; ?>" class="card-img-top h-50" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto->name; ?></h5>
                                        <p class="card-text"><?php echo $producto->description; ?></p>
                                        <a href="detalles.php?slug=<?php echo $producto->slug; ?>"
                                            class="btn btn-primary w-50">Detalles</a>

                                        <div class="">
                                            <button type="button" class="btn btn-warning mt-3 w-50" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $producto->slug; ?>">
                                                Editar
                                            </button>
                                        </div>
                                        <div class="modal fade" id="<?php echo $producto->slug; ?>"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar
                                                            producto</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="App/EditarProductoController.php" method="post">
                                                            <div class="mb-3">
                                                                <label for="exampleNombre" class="form-label">Nombre</label>
                                                                <input type="text" class="form-control" id="exampleNombre"
                                                                    aria-describedby="" name="nombre"
                                                                    value="<?php echo $producto->name; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleSlug" class="form-label">Slug</label>
                                                                <input type="text" class="form-control" id="exampleSlug"
                                                                    name="slug" value="<?php echo $producto->slug; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleDescripcion"
                                                                    class="form-label">Descripcion</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleDescripcion" aria-describedby=""
                                                                    name="descripcion"
                                                                    value="<?php echo $producto->description; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFeatures"
                                                                    class="form-label">Features</label>
                                                                <input type="text" class="form-control" id="exampleFeatures"
                                                                    name="features"
                                                                    value="<?php echo $producto->features; ?>">
                                                            </div>

                                                            <input type="hidden" value=<?php echo $producto->id; ?>
                                                                name="id">

                                                            <button type="submit" class="btn btn-primary"
                                                                name="editar">Editar</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger mt-3 w-50" data-bs-toggle="modal"
                                            data-bs-target="#eliminar<?php echo $producto->slug; ?>">
                                            Eliminar
                                        </button>
                                        <div class="modal fade" id="eliminar<?php echo $producto->slug; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="App/EliminarProductoController.php" method="post">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar
                                                                Producto</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            ¿Está seguro de que desea eliminar el producto?
                                                            <input type="hidden" value=<?php echo $producto->id; ?>
                                                                name="id">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger"
                                                                name="eliminar">Eliminar
                                                                Producto</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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