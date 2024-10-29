<?php

if(isset($_POST["add"])){
    if(strlen($_POST["nombre"])> 0 &&
        strlen($_POST["slug"])> 0 &&
        strlen($_POST["descripcion"])> 0 &&
        strlen($_POST["features"])> 0){
            $nombre = $_POST["nombre"];
            $slug = $_POST["slug"];
            $descripcion = $_POST["descripcion"];
            $features = $_POST["features"];
        
            $addProductController = new addProductController();
            $addProductController -> addProduct($nombre,$slug,$descripcion,$features);
    }else{
        echo "No se permiten campos vacios.";
    }
}
    session_start();

    class addProductController{
        public function addProduct($nombre, $slug, $descripcion, $features){
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
              CURLOPT_POSTFIELDS => array('name' => $nombre,'slug' => $slug,'description' => $descripcion,'features' => $features),
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 37|dVviKmAN380iyZutNmIiJkyQwYxQBA886w78keRT'
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