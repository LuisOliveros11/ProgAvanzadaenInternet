<?php
session_start();

    if(isset($_POST['login']) && $_POST['login'] === "login"){
        switch ($_POST['login']) {
            case 'login':
                $email = $_POST['email'];
                $password = $_POST['password'];

                $authController = new AuthController();
                $authController->login($email, $password);       
        }
    }; 

    class AuthController{
        public function login($email, $password) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
            ));
            
            $response = curl_exec($curl);
            $response = json_decode($response);
            
            curl_close($curl);

            if (isset($response->data) && is_object($response->data)) {
                $_SESSION['data'] = $response->data;
                header("Location: ../home");
            } else {
                echo "Error. Credenciales Incorrectas";
            }
        }

        public function obtenerProductos(){
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
                "Authorization: Bearer ".$_SESSION['data']->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6IkcrSHRvWG9OREpENjk3aTJZdVNmZEE9PSIsInZhbHVlIjoiRWNrR0ZNbXlwcUwvTm5ScnNhMHNlb3FQdjNGa1BycjdqSTg2eVhTRURPZzhmM1FrOHlTbktYK3k5NlBEb1hPYWw0RDlxMHlQZW1KOVlzTlBrcms4R3RQRDlDenhCSGxJbVIxM0dIUnd0NW0rM21zaTArcVhXMG9oY0F0Um1EVWwiLCJtYWMiOiI1MmI5MDM3ZDhiYzE4MTYwOTdmZWFlMWFmYTc0ZDQxNjhhYWQ5MGU5OTBiN2UyYmY4ZWJlNzc5Nzc1MjE1ZmZlIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlE1R1NtQkJ0WkE0N2Uwd0dEVkpMNHc9PSIsInZhbHVlIjoiK3ZFa294ak83NHBjc1JkTGxydndSUHFlS3dpeFM0ZkV0K2VUTGovTDhIdnFiRHMvbGpRakF6a1JIYUhET29vbmtWbStNazN2NU1PNjdSV3pVZ00zZFl1U3NoV2I0MXh3TzJWQ2Y3cFhqTEV3TEZXZG9NTk5OeWo0cGczK3FXTU8iLCJtYWMiOiI5YTI2YTMwMGY1M2FmMTM5NTY1ZTY0NjY1ZWM2MTRjM2ZkODBhOWJjNjc4ZDBlZTMyNzk1ZmM3YTZhYzE4Y2Q3IiwidGFnIjoiIn0%3D'
            ),
            ));
            
            $response = curl_exec($curl);
            $response = json_decode($response);

            curl_close($curl);
            return $response->data;
        }

        public function obtenerProductoPorSlug($slug){
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
                "Authorization: Bearer ".$_SESSION['data']->token
            ),
            ));

            $response = curl_exec($curl);
            $response = json_decode($response);

            curl_close($curl);

            return $response->data;

        }
    }
?>