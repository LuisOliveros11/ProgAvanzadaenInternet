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
  <?php
  $marcasController = new Marca();
  $listaMarcas = $marcasController->getAllBrands();
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
                <li class="breadcrumb-item" aria-current="page">Añadir nuevo producto</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Añadir nuevo producto</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <form action="/Plantilla/app/ProductsController.php" method="post" enctype="multipart/form-data">
          <div class="col-xl-6 mx-auto">
            <div class="card">
              <div class="card-header">
                <h5>Información del producto</h5>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label">Nombre del producto</label>
                  <input type="text" class="form-control" placeholder="Escribe el nombre del producto" name="nombre" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug del producto</label>
                  <input type="text" class="form-control" placeholder="Escribe el slug del producto" name="slug" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Features del producto</label>
                  <input type="text" class="form-control" placeholder="Escribe los features del producto"
                    name="features" />
                </div>
                <div class="mb-0">
                  <label class="form-label">Descripción del producto</label>
                  <textarea class="form-control" placeholder="Escribe la descripción del producto"
                    name="descripcion"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Marca</label>
                  <select class="form-select" name="marca">
                    <?php foreach ($listaMarcas as $marca): ?>
                      <option value=<?php echo $marca->id; ?>><?php echo $marca->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="inputGroupFile02" name="imagen">
                  <label class="input-group-text" for="inputGroupFile02">Subir</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body text-end btn-page">
                <button class="btn btn-primary mb-0" type="submit" name="add">Añadir producto</button>
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