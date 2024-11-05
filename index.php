<?php

include "app/config.php";
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "views/layouts/head.php" ?>
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

  <div class="auth-main v2">
    <div class="bg-overlay bg-dark"></div>
    <div class="auth-wrapper">
      <div class="auth-sidecontent">
        <div class="auth-sidefooter">
          <img src="assets/images/logo-dark.svg" class="img-brand img-fluid" alt="images" />
          <hr class="mb-3 mt-4" />
          <div class="row">
            <div class="col my-1">
              <p class="m-0">Made with ♥ by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank">
                  Phoenixcoded</a></p>
            </div>
            <div class="col-auto my-1">
              <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="../index.html">Home</a></li>
                <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/"
                    target="_blank">Documentation</a></li>
                <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="auth-form">
        <div class="card my-5 mx-3">
          <div class="card-body">
            <h4 class="f-w-500 mb-1">Inicia sesión con tu correo</h4>
            <form action="app/AuthController.php" method="post">
              <div class="mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Correo electrónico" name="email" />
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" id="floatingInput1" placeholder="Contraseña" name="password" />
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary" name="login">Iniciar sesión</button>
              </div>
            </form>
            <div class="saprator my-3">
              <span>O continua con</span>
            </div>
            <div class="text-center">
              <ul class="list-inline mx-auto mt-3 mb-0">
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/" class="avtar avtar-s rounded-circle bg-facebook" target="_blank">
                    <i class="fab fa-facebook-f text-white"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://twitter.com/" class="avtar avtar-s rounded-circle bg-twitter" target="_blank">
                    <i class="fab fa-twitter text-white"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://myaccount.google.com/" class="avtar avtar-s rounded-circle bg-googleplus"
                    target="_blank">
                    <i class="fab fa-google text-white"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "views/layouts/scripts.php" ?>


</body>
<!-- [Body] end -->

</html>