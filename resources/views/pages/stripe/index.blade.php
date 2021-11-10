<html>

<head>
    <script type="text/javascript"
        src="https://lab.cardnet.com.do/servicios/tokens/v1/Scripts/PWCheckout.js?key=mfH9CqiAFjFQh_gQR_1TQG_I56ONV7HQ">
    </script>
</head>

<body>
    <form id="shoppingcart_form">
        <p><button id="btnCheckout">ABRIR IFRAME DE CAPTURA</button></p>
        <p><span class="itemName">OTT TOKEN: <input type="text" id="PWTokenAux" name="PWTokenAux" /></span></p>
    </form>
    <script>
        function OnTokenReceived(token) {
            alert(token.TokenId);
            document.getElementById("PWTokenAux").value = token.TokenId;
        }

        function myCheckoutFunction(event) {
            event.preventDefault();
            /*
             * Debe tener en cuenta que las siguientes variables
             * pueden cambiar de acuerdo al ambiente
             */

            /* PublicAccountKey del comercio */
            var myPublicKey = "mfH9CqiAFjFQh_gQR_1TQG_I56ONV7HQ";

            /* Este dato se obtiene haciendo un get del Customer */
            var customerUniqueId = "XXXXXXXXXXXXXXXXXXXX";

            /* Este ejemplo utiliza la URL para capturas en ambiente de pruebas */
            var captureUrl = "https://lab.cardnet.com.do/servicios/tokens/v1/Capture/";

            PWCheckout.OpenIframeCustom(
                captureUrl + "?key=" + myPublicKey + "&session_id=" + customerUniqueId,
                customerUniqueId
            );
        }

        PWCheckout.Bind("tokenCreated", "OnTokenReceived");
        PWCheckout.SetProperties({
            "name": "Demo Test.",
            "email": "gpigni@pagosweb.com.uy",
            //"image": "http://mywebsitedomain.com/images/logocheckout.png",
            "button-label": "Pagar #monto#",
            "description": "Checkout Creditel Test.",
            "currency": "$",
            "amount": "100",
            "lang": "ESP",
            "form_id": "shoppingcart_form",
            "checkout_card": 1,
            "autoSubmit": "false",
            "empty": "true"
        });

        var btnCheckout = document.getElementById("btnCheckout");
        btnCheckout.addEventListener("click", "myCheckoutFunction");
    </script>
</body>

</html>
