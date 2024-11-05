<?php

session_start();
include "../../app/config.php";

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
  <?php include "../../app/MarcasController.php" ?>
  <?php include "../../app/ProductsController.php" ?>
  <?php
  $marcasController = new Marca();
  $listaMarcas = $marcasController->getAllBrands();
  $productsController = new ProductsController();
  $slug = $_GET["slug"];
  $detallesProducto = $productsController->obtenerProductoPorSlug($slug);
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
                <li class="breadcrumb-item" aria-current="page">Editar producto</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Editar producto</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <form action="/Plantilla/app/ProductsController.php" method="post">
        <input type="hidden" value=<?php echo $detallesProducto->id; ?>
        name="id">
          <div class="col-xl-6 mx-auto">
            <div class="card">
              <div class="card-header">
                <h5>Información del producto</h5>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label">Nombre del producto</label>
                  <input type="text" class="form-control" placeholder="Escribe el nombre del producto" name="nombre" value="<?php echo $detallesProducto->name; ?>"/>
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug del producto</label>
                  <input type="text" class="form-control" placeholder="Escribe el slug del producto" name="slug" value="<?php echo $detallesProducto->slug; ?>"/>
                </div>
                <div class="mb-3">
                  <label class="form-label">Features del producto</label>
                  <input type="text" class="form-control" placeholder="Escribe los features del producto"
                    name="features" value="<?php echo $detallesProducto->features; ?>"/>
                </div>
                <div class="mb-0">
                  <label class="form-label">Descripción del producto</label>
                  <textarea class="form-control" placeholder="Escribe la descripción del producto"
                    name="descripcion"> <?php echo $detallesProducto->description; ?> </textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Marca</label>
                  <select class="form-select" name="marca">
                  <option selected><?php echo $detallesProducto->brand->name; ?></option>
                    <?php foreach ($listaMarcas as $marca): ?>
                      <option value=<?php echo $marca->id; ?>><?php echo $marca->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body text-end btn-page">
                <button class="btn btn-primary mb-0" type="submit" name="editar">Editar producto</button>
              </div>
            </div>
          </div>
        </form>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>