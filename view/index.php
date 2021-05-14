<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Checkout</title>
</head>

<body>
  <h1>Checkout</h1>
  <form>
    <!--
Using Formatter.js - Iugu detecta e melhora o input de Cartão:
http://firstopinion.github.io/formatter.js/
-->
    <form id="payment-form" target="_blank" action="" method="POST">
      <div class="usable-creditcard-form">
        <div class="wrapper">
          <div class="input-group nmb_a">
            <div class="icon ccic-brand"></div>
            <input autocomplete="off" class="credit_card_number" data-iugu="number" placeholder="Número do Cartão"
              type="text" value="" />
          </div>
          <div class="input-group nmb_b">
            <div class="icon ccic-cvv"></div>
            <input autocomplete="off" class="credit_card_cvv" data-iugu="verification_value" placeholder="CVV"
              type="text" value="" />
          </div>
          <div class="input-group nmb_c">
            <div class="icon ccic-name"></div>
            <input class="credit_card_name" data-iugu="full_name" placeholder="Titular do Cartão" type="text"
              value="" />
          </div>
          <div class="input-group nmb_d">
            <div class="icon ccic-exp"></div>
            <input autocomplete="off" class="credit_card_expiration" data-iugu="expiration" placeholder="MM/AA"
              type="text" value="" />
          </div>
        </div>
        <div class="footer">
          <img
            src="https://s3-sa-east-1.amazonaws.com/storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/cc-icons.e8f4c6b4db3cc0869fa93ad535acbfe7.png"
            alt="Visa, Master, Diners. Amex" border="0" />
          <a class="iugu-btn" href="http://iugu.com" tabindex="-1"><img
              src="https://s3-sa-east-1.amazonaws.com/storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/payments-by-iugu.1df7caaf6958f1b5774579fa807b5e7f.png"
              alt="Pagamentos por Iugu" border="0" /></a>
        </div>
      </div>

      <div class="token-area">
        <label for="token">Token do Cartão de Crédito - Enviar para seu Servidor</label>
        <input type="text" name="token" id="token" value="" readonly="true" size="64" style="text-align:center" />
      </div>

      <div>
        <button type="submit">Salvar</button>
      </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/formatter.js/0.1.5/formatter.min.js">
    </script>
    <script type="text/javascript" src="https://js.iugu.com/v2"></script>
    <script type="text/javascript" src="../assets/js/form.js"> </script>
</body>
</html>