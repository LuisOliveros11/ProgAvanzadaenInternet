<?php
session_start();

if (isset($_POST["eliminar"])) {
	$id = $_POST["id"];

	$eliminarProductController = new ProductsController();
	$eliminarProductController->eliminar($id);
}
if (isset($_POST["add"])) {
	if (
		strlen($_POST["nombre"]) > 0 &&
		strlen($_POST["slug"]) > 0 &&
		strlen($_POST["descripcion"]) > 0 &&
		strlen($_POST["features"]) > 0 &&
		$_POST["marca"] != "Selecciona una marca" &&
		isset($_FILES["imagen"])
	) {
		$nombre = $_POST["nombre"];
		$slug = $_POST["slug"];
		$descripcion = $_POST["descripcion"];
		$features = $_POST["features"];
		$marca = $_POST["marca"];

		$imagenNombreTemp = $_FILES["imagen"]["tmp_name"];
		$imagenNombre = $_FILES["imagen"]["name"];
		$imagenRutaLocal = "C:/xampp/htdocs/Plantilla/assets/images/$imagenNombre";


		if (move_uploaded_file($imagenNombreTemp, $imagenRutaLocal)) {
			$addProductController = new ProductsController();
			$addProductController->addProduct($nombre, $slug, $descripcion, $features, $marca, $imagenRutaLocal);
		} else {
			echo "Error. Ingresa una imagen valida";
		}
	} else {
		echo "No se permiten campos vacios.";
	}
}
if (isset($_POST["editar"])) {
	if (
		strlen($_POST["nombre"]) > 0 &&
		strlen($_POST["slug"]) > 0 &&
		strlen($_POST["descripcion"]) > 0 &&
		strlen($_POST["features"]) > 0 &&
		$_POST["marca"] != "Selecciona una marca"
	) {
		$nombre = $_POST["nombre"];
		$slug = $_POST["slug"];
		$descripcion = $_POST["descripcion"];
		$features = $_POST["features"];
		$marca = $_POST["marca"];
		$id = $_POST["id"];
		$editProductController = new ProductsController();
		$editProductController->editProduct($nombre, $slug, $descripcion, $features, $id, $marca);
	} else {
		echo "No se permiten campos vacios.";
	}
}

class ProductsController
{
	public function obtenerProductos()
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
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $_SESSION['data']->token
			),
		));

		$response = curl_exec($curl);
		$response = json_decode($response);

		curl_close($curl);

		if (isset($response->code) && $response->code > 0) {
			return $response->data;
		} else {
			return [];
		}
	}

	public function obtenerProductoPorSlug($slug)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://crud.jonathansoto.mx/api/products/slug/$slug",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer " . $_SESSION['data']->token
			),
		));

		$response = curl_exec($curl);
		$response = json_decode($response);

		curl_close($curl);

		return $response->data;

	}

	public function addProduct($nombre, $slug, $descripcion, $features, $marca, $imagenRutaLocal)
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
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $nombre, 'slug' => $slug, 'description' => $descripcion, 'features' => $features, 'brand_id' => $marca, 'cover' => new CURLFILE($imagenRutaLocal)),
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer " . $_SESSION['data']->token
			),
		));

		$response = curl_exec($curl);
		$response = json_decode($response);

		curl_close($curl);

		if ($response->message === "Registro creado correctamente") {
			header("Location: ../products/");
		} else {
			echo "Error. Ingresa un valor correcto";
		}
	}

	public function editProduct($nombre, $slug, $descripcion, $features, $id, $marca)
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
			CURLOPT_POSTFIELDS => "name=$nombre&slug=$slug&description=$descripcion&features=$features&id=$id&brand_id=$marca",
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded',
				"Authorization: Bearer " . $_SESSION['data']->token
			),
		));

		$response = curl_exec($curl);
		$response = json_decode($response);

		curl_close($curl);

		if ($response->message === "Registro actualizado correctamente") {
			header("Location: ../products/");
		} else {
			echo "Error. Ingresa un valor correcto";
		}
	}

	public function eliminar($id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded',
				"Authorization: Bearer " . $_SESSION['data']->token
			),
		));

		$response = curl_exec($curl);
		$response = json_decode($response);

		curl_close($curl);

		if ($response->message === "Registro Eliminado correctamente") {
			header("Location: ../products/");
		} else {
			echo "Error. No se pudo eliminar";
		}
	}
}

?>