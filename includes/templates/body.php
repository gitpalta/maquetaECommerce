<body>
    <script type="text/javascript">
                var script = document.createElement("script");
                script.src = `https://res.mobbex.com/js/embed/mobbex.embed@1.0.20.js?t=${Date.now()}`;
                script.async = true;
                script.integrity = "sha384-+z4PxjuNgUagtAivCcYlOzd8V52Xghj80LF5iyG2CbfGe+9m6Fsj95RG7vKiavgV";
                script.crossOrigin = "anonymous";
                script.addEventListener("load", () => {
                    // Realizá la acción que sea necesaria aca :)
                    //renderMobbexButton(); // Muestra el botón dentro del body 
                    initMobbexPayment(options); // Abre inmediatamente el modal de pago
                });
                document.body.appendChild(script);
    </script>