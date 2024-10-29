<?php
session_start();

if (isset($_POST["editar"])) {
    if (
        strlen($_POST["nombre"]) > 0 &&
        strlen($_POST["slug"]) > 0 &&
        strlen($_POST["descripcion"]) > 0 &&
        strlen($_POST["features"]) > 0
    ) {
        $nombre = $_POST["nombre"];
        $slug = $_POST["slug"];
        $descripcion = $_POST["descripcion"];
        $features = $_POST["features"];
        $id = $_POST["id"];

        $editProductController = new editProductController();
        $editProductController->editProduct($nombre, $slug, $descripcion, $features, $id);
    } else {
        echo "No se permiten campos vacios.";
    }
}

class editProductController
{
    public function editProduct($nombre, $slug, $descripcion, $features, $id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => "name=$nombre&slug=$slug&description=$descripcion&features=$features&id=$id",
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer 37|dVviKmAN380iyZutNmIiJkyQwYxQBA886w78keRT'
        ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);

        curl_close($curl);

        if ($response -> message === "Registro actualizado correctamente") {
            header("Location: ../home.php");
        } else {
            echo "Error. Ingresa un valor correcto";
        }
    }
}
?>