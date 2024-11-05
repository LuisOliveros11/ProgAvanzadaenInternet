<?php

include "../../app/config.php";
session_start();
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "../layouts/head.php" ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
  data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <!-- [ Pre-loader ] End -->
  <?php include "../layouts/sidebar.php" ?>
  <?php include "../layouts/navbar.php" ?>
  <?php include "../../app/ProductsController.php" ?>
  <?php
  $productsController = new ProductsController();
  $listaProductos = $productsController->obtenerProductos();
  ?>


  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Productos</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Productos</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="ecom-wrapper">
            <div class="ecom-content">
              <div class="d-grid gap-2 mx-auto mb-3">
                <a href="create/">
                  <button class="btn btn-primary" type="button">Añadir producto</button>
                </a>
              </div>
              <div class="row">
                <?php foreach ($listaProductos as $producto): ?>
                  <div class="col-sm-6 col-xl-4">
                    <div class="card product-card">
                      <div class="card-img-top">
                        <a href="details/<?php echo $producto->slug; ?>/">
                          <img src="<?php echo $producto->cover; ?>" alt="Imagen" class="img-prod img-fluid" />
                        </a>
                        <div class="card-body position-absolute end-0 top-0">
                          <div class="form-check prod-likes">
                            <input type="checkbox" class="form-check-input" />
                            <i data-feather="heart" class="prod-likes-icon"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <a href="details/<?php echo $producto->slug; ?>/">
                          <p class="prod-content mb-0 text-muted"><?php echo $producto->name; ?></p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                          <h5 class="card-title"><?php echo $producto->name; ?></h5>
                          <p class="card-text"><?php echo $producto->description; ?></p>
                          <div class="d-inline-flex align-items-center">
                            <i class="ph-duotone ph-star text-warning me-1"></i>
                            4.5 <small class="text-muted">/ 5</small>
                          </div>
                        </div>
                        <div class="col-6 mb-3">
                          <div class="d-grid">
                            <a href="update/<?php echo $producto->slug; ?>/">
                              <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                          </div>
                        </div>

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                          data-bs-target="#eliminar<?php echo $producto->slug; ?>">
                          Eliminar
                        </button>
                        <div class="modal fade" id="eliminar<?php echo $producto->slug; ?>" tabindex="-1"
                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="/Plantilla/app/ProductsController.php" method="post">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar
                                    Producto</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                  ¿Está seguro de que desea eliminar el producto?
                                  <input type="hidden" value=<?php echo $producto->id; ?> name="id">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                  <button type="submit" class="btn btn-danger" name="eliminar">Eliminar
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
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>