<?php
    require 'includes/app.php';
    //incluir use

    use App\Pago;

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {    
        //incluir objetos
        $pago = new Pago($_POST);
        
        $pago->guardar();
        
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
        <?php include 'includes/templates/formulario.php'; ?>
        <input type="submit" value="Crear Pago" class="">
    </form>

</main>


<?php 

incluirTemplate('footer');

?>