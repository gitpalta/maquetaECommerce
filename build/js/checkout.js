var options = {
    id: "{ID Checkout}",
    type: "checkout",
    onResult: (data) => {
        // OnResult es llamado cuando se toca el Botón Cerrar
        window.MobbexEmbed.close();
    },
    onPayment: (data) => {
        console.info("Payment: ", data);
    },
    onOpen: () => {
        console.info("Pago iniciado.");
    },
    onClose: (cancelled) => {
        console.info(`${cancelled ? "Cancelado" : "Cerrado"}`);
    },
    onError: (error) => {
        console.error("ERROR: ", error);
    },
};