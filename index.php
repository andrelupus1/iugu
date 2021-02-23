<?php
require_once("./iugu-php/lib/Iugu.php");

define("TOKEN_IUGU", "c405dfb77f8677bd54fa2adbacc809ec");
define("MARKETPLACE_ID", "3F601E9E9C000B3323A90A5CE93646EE");


//Customer
define("CLIENT_ID", "F098086D8F1F4A63A13D199A8BA94B6C");
define("CLIENT_TOKEN_CARD", "2a53a6a4-1823-4bb7-97d2-4bc0ded575df");
/*
* Account Class
*/
class Account
{
    public function __construct()
    {
        header("Content-type: application/json; charset: utf8");
        Iugu::setApiKey(TOKEN_IUGU);   // user token como parametro
    }
    
    public function create()
    {
        // Apenas Produção
        $mktplace = Iugu_Marketplace::create(array(
            "action"                    => "create_account", // criei esse atributo action pra ser enviado na api para determinar qual ação. Achei mais fácil do que criar novas funções
            "name"                      => 'João',
            "reply_to"                  => 'test_2021@email.com',
        ));
        print_r($mktplace);
    }
    public function verify()
    {
        // verificação de subconta
        $validate = Iugu_Account::create(array(
        "id"                        => CLIENT_ID,
        "action"                    => "request_verification",
        "automatic_validation"      => false,
        "files"                     => false,
        "data" => array(
            "price_range"           => "Mais que R$ 500,00",
            "physical_products"     => false,
            "business_type"         => "TIPO DO CLIENTE",
            "person_type"           => "Pessoa Física",
            "automatic_transfer"    => false,
            "cpf"                   => '999.999.999-99',
            "name"                  => "nome",
            "address"               => "endereço",
            "cep"                   => "cep",
            "city"                  => "cidade",
            "state"                 => "estado",
            "telephone"             => "27 33333333",
            "bank"                  => 'Banco do Brasil',       //'Banco do Brasil', 'Itaú', 'Bradesco', 'Caixa Econômica', 'Banco do Brasil', 'Santander'
            "bank_ag"               => '9999-9',
            "account_type"          => 'Corrente',       // Poupançaa, Corrente
            "bank_cc"               => '999999-9',
        )
    ));
    }
    public function update()
    {
        echo "Update da conta";
    }
    public function view()
    {
        $account = Iugu_Account::fetch(CLIENT_ID); // id da conta como parametro
    }
}

/*
 * Customer class
 */
class Customer
{
    public function __construct()
    {
        header("Content-type: application/json; charset: utf8");
        Iugu::setApiKey(TOKEN_IUGU);   // user token como parametro
    }

    public function index()
    {
        //Sem Acesso
    }

    //Customer Get *ok
    public function get($id = null)
    {
        // $id = "24531FAD9B144EEAAE524404D2504E76"; //Delete
        $customer = Iugu_Customer::fetch($id = CLIENT_ID);
        print_r($customer);
    }

    // Verifica se conta já foi registrada na IUGU,
    // evitando duplicidade.
    public function _verify()
    {
    }

    // Customer Create *OK
    public function create()
    {
        $customer = Iugu_Customer::create([
            "email"      => "suporte@artedesignpa.com.br",
            "name"       => "John Snow",
            "cpf_cnpj"   => "810.829.752-49",
            "cc_emails"  => "artedesignpa@gmail.com",
            "zip_code"   => "29190560",
            "number"     => "8",
            "street"     => "Rua dos Bobos",
            "city"       => "São Paulo",
            "state"      => "SP",
            "district"   => "Mooca",
            "complement" => "123C"
          ]);
      
        print_r($customer);
    }

    //Update one item
    public function update($id = null)
    {
    }

    //Delete one item
    public function delete()
    {
    }
}

/**
 * Token class
 */
class Token
{
    public function __construct()
    {
        // header("Content-type: application/json; charset: utf8");
        Iugu::setApiKey(TOKEN_IUGU);   // user token como parametro
    }
    public function index()
    {
        include("./view/index.php");
    }

    //Utilizado iugu.js para web app
    public function create()
    {
        header("Content-type: application/json; charset: utf8");
        $data  = [
            "verification_value"=>"123",
            "first_name"=>"ANDRÉ",
            "last_name"=>"MARTINS LOPES",
            "month"=>"01",
            "year"=>"2025",
            "number"=>"4111-1111-1111-1111"
        ];
        
        $token = Iugu_PaymentToken::create(array(
            "action"    => "payment_token", // criei esse atributo action pra ser enviado na api para determinar qual ação. Achei mais fácil do que criar novas funções
            "account_id" =>CLIENT_ID,
            "data"    => $data,
            "method" => "credit_card",
            "test" => true
        ));
        
        print_r($token);

        //output: id = 2a53a6a4-1823-4bb7-97d2-4bc0ded575df
    }
    public function update()
    {
    }
}


class Payment
{
    public function __construct()
    {
        // header("Content-type: application/json; charset: utf8");
        Iugu::setApiKey(TOKEN_IUGU);   // user token como parametro
    }
    
    // List all your items
    public function index($offset = 0)
    {
    }
    
    // Add a new item
    public function create()
    {
        $data = [
                "action" => "payment_methods",
                "customer_id" => CLIENT_ID,
                "token" => CLIENT_TOKEN_CARD,
                "set_as_default"=> "true"
            ];
        
        $payment = Iugu_PaymentMethod::create($data);
        print_r($payment);
    }
    
    //Update one item
    public function update($id = null)
    {
    }
    
    //Delete one item
    public function delete($id = null)
    {
    }
}
/* Account */
//$iugu = new Account;
//$iugu->create();

//Customer
// $iugu = new Customer;
// $iugu->create();
//$iugu->index();


//Token: somente para teste, tem que usar o iugu.js
$iugu = new Token;
$iugu->index();
//$iugu->create();


//Payment: somente para teste, tem que usar o iugu.js
// $iugu = new Payment;
// $iugu->create();
