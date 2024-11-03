<?php
    session_start();

    if (isset($_POST["eliminar"])) {
            $id = $_POST["id"];
    
            $eliminarProductController = new eliminarProductoController();
            $eliminarProductController->eliminar($id);
    }

    class eliminarProductoController{

        public function eliminar($id){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'DELETE',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                "Authorization: Bearer ".$_SESSION['data']->token
              ),
            ));

            $response = curl_exec($curl);
            $response = json_decode($response);

            curl_close($curl);

            if ($response -> message === "Registro Eliminado correctamente") {
                header("Location: ../home");
            } else {
                echo "Error. No se pudo eliminar";
            }
        }
    }
?>