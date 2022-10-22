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
        $resultado = $curlData->curlMakeRequest();
        
        //debuguear($pago);  
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