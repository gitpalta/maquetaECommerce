<?php
    require 'includes/app.php';

    use App\Pago;
    use App\Customer;
    use App\Curl;


    if($_SERVER['REQUEST_METHOD'] === 'POST') {   

        $pago = new Pago($_POST);
        $customer = new Customer($_POST);
        $curlData = new Curl;

        
        $pago->guardar();

        $customer->guardar();

        $dataCustomer = $customer->addData('customer');

        $dataPago = $pago->addData('pago');

        $curlData->body = $curlData->bodyArray($dataCustomer, $dataPago);
        
        $resultado = $curlData->curlMakeRequest();
        
        $url = $resultado["data"]["url"];
;
        redirect($url);

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