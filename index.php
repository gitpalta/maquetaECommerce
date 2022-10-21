<?php 

require 'includes/app.php';
incluirTemplate('header', $inicio = true);

?>

<body>
    <h1>Index</h1>
    <a href="/pago.php" class="boton boton-verde">Pagar</a>
</body>

<?php 

incluirTemplate('footer');

?>