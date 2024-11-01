<?php
    session_start();

if(isset($_POST["add"])){
    if(strlen($_POST["nombre"])> 0 &&
        strlen($_POST["slug"])> 0 &&
        strlen($_POST["descripcion"])> 0 &&
        strlen($_POST["features"])> 0 &&
        isset($_FILES["imagen"])){
            $nombre = $_POST["nombre"];
            $slug = $_POST["slug"];
            $descripcion = $_POST["descripcion"];
            $features = $_POST["features"];

            $imagenNombreTemp = $_FILES["imagen"]["tmp_name"];
            $imagenNombre = $_FILES["imagen"]["name"];
            $imagenRutaLocal = "C:/xampp/htdocs/ProgAvanzadaenInternet-main/Imagenes/$imagenNombre";
            

            if(move_uploaded_file($imagenNombreTemp,$imagenRutaLocal)){
                $addProductController = new addProductController();
                $addProductController -> addProduct($nombre,$slug,$descripcion,$features, $imagenRutaLocal);
           }else{
                echo "Error. Ingresa una imagen valida";            
           }
    }else{
        echo "No se permiten campos vacios.";
    }
}

    class addProductController{
        public function addProduct($nombre, $slug, $descripcion, $features, $imagenRutaLocal){
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array('name' => $nombre,'slug' => $slug,'description' => $descripcion,'features' => $features,'cover'=> new CURLFILE($imagenRutaLocal)),
              CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$_SESSION['data']->token
              ),
            ));
            
            $response = curl_exec($curl);
            $response = json_decode($response);
            
            curl_close($curl);

            if ($response -> message === "Registro creado correctamente") {
                header("Location: ../home.php");
            } else {
                echo "Error. Ingresa un valor correcto";
            }
        }
    }
?>