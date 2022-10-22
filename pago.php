<?php
    require 'includes/app.php';
    //incluir use

    use App\Pago;
    use App\Customer;
    use App\Curl;


    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {    
        //incluir objetos
        $pago = new Pago($_POST);
        $customer = new Customer($_POST);
        $curlData = new Curl;
        
        $pago->guardar();
        $customer->guardar();
        
        //debuguear($pago);

        $curl = curl_init(); // inicio sesion de curl

        curl_setopt_array($curl, [ //setear parameteros
            CURLOPT_URL            => 'https://api.mobbex.com/p/checkout', 
            CURLOPT_HTTPHEADER     => ['x-api-key' => 'zJ8LFTBX6Ba8D611e9io13fDZAwj0QmKO1Hn1yIj', 'x-access-token' => 'd31f0721-2f85-44e7-bcc6-15e19d1a53cc', 'Content-Type' => 'application/jso'] ,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => '$_POST',
            CURLOPT_POSTFIELDS     => ['total' => 100.10], ['description' => 'prueba'], ['currency' => 'ARS'], ['reference' => '767527217974'],
            ['email' => 'email@email.com'], ['name' => 'cliente'], ['identification' => '98654321'], // Encodeado en json  Pasar datos del pago
        ]);
        
        //debuguear($resultado);
    
        $response = curl_exec($curl); //lo que devuelve mobbex (url, idckout, ...)
        $error    = curl_error($curl);
    
        curl_close($curl);
    
        // Throw curl errors
        if ($error)
            throw new \Mobbex\Exception('Curl error in Mobbex request #:' . $error, curl_errno($curl), $data);
    
        $result = json_decode($response, true);

    }
    



    $db = conectarDB();

    incluirTemplate('header');

?>

<main class="">
    <h1>Realizar Pago</h1>

    <a href="/index.php" class="">Volver</a>

    <!-- errores -->

    <form class="formulario" method="POST" action="pago.php" enctype="multipart/form-data">
        <?php 
        incluirTemplate('formularioCustomer');
        incluirTemplate('formularioPago');
        ?>
        <input type="submit" value="Crear Pago" class="">
    </form>

</main>


<?php 

incluirTemplate('footer');

?>