Iugu.setAccountID("3F601E9E9C000B3323A90A5CE93646EE");
Iugu.setTestMode(true);
Iugu.setup();

jQuery(function($) {
    $('#payment-form').submit(function(evt) {
        var form = $(this);
        var tokenResponseHandler = function(data) {
            
            if (data.errors) {
                alert("Erro salvando cartão: " + JSON.stringify(data.errors));
            } else {
                $("#token").val( data.id );
                form.get(0).submit();
            }
            
            // Seu código para continuar a submissão
            // Ex: form.submit();
        }
        
        Iugu.createPaymentToken(this, tokenResponseHandler);
        return false;
    });
  });