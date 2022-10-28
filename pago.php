<?php
    require 'includes/app.php';
    incluirTemplate('header');
    
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
        
        $urlId = $resultado["data"]["id"];
        //debuguear($urlId);
        //redirect($url);
        $jsonId = json_encode($urlId);
        ?>
            <div id="mbbx-container">
                <script type="text/javascript">
                    var options = {
                        id: "<?= $urlId ?>",
                        type: "checkout",
                        onResult: (data) => {
                            if (data.status.code == 200) {
                                window.MobbexEmbed.close();
                                window.location.href = "https://4b30-186-138-33-90.sa.ngrok.io/success.php";
                            } else {
                                window.MobbexEmbed.close();
                                window.location.href = "https://4b30-186-138-33-90.sa.ngrok.io/fail.php";
                            }
                        },
                        onPayment: (data) => {
                            console.info(options);
                            console.info("Payment: ", data);
                        },
                        onOpen: () => {
                            console.info(options);
                            console.info("Pago iniciado.");
                        },
                        onClose: (cancelled) => {
                            console.info(`${cancelled ? "Cancelado" : "Cerrado"}`);
                        },
                        onError: (error) => {
                            console.error("ERROR: ", error);
                        },
                    };
                </script>
            </div>
<?php
    }
    $db = conectarDB();
    
    incluirTemplate('body');
    
    ?>

    <main class="">
        <h1>Realizar Pago</h1>

        <a href="/index.php" class="">Volver</a>
        
        <form class="formulario" method="POST" action="https://4b30-186-138-33-90.sa.ngrok.io/pago.php" enctype="multipart/form-data" >
            <?php 
            incluirTemplate('formularioCustomer');
            incluirTemplate('formularioPago');
            ?>
            <input type="submit" value="Crear Pago" class="">
        </form>
    </main>
</body>


<?php 

incluirTemplate('footer');

?>