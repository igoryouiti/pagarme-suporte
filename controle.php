<?php
    require_once 'vendor/autoload.php';
    require 'config.php';

    $api_key = (API_KEY);

    $cardNumber = $_POST['cardnumber'];
    $cardHolderName = $_POST['cardname'];
    $cardCvv = $_POST['cvv'];
    $cardExpMonth = $_POST['expmonth'];
    $cardExpYear = $_POST['expyear'];

    $cardExpirationDate = $cardExpMonth . $cardExpYear;

    $pagarMe = new \PagarMe\Sdk\PagarMe($api_key);

    $amount = 12000;
    $installments = 1;
    $capture = true;
    $postbackUrl = 'http://requestb.in/pkt7pgpk';
    $metadata = ['nomeProduto' => 'PikachuPool'];

    $customer = new \PagarMe\Sdk\Customer\Customer([
        'name' => 'Teste Igor',
        'email' => 'igor@pagar.me',
        'document_number' => '09130141095',
        'address' => [
            'street'        => 'rua teste',
            'street_number' => 42,
            'neighborhood'  => 'centro',
            'zipcode'       => '01227200',
            'complementary' => 'Apto 42',
            'city'          => 'São Paulo',
            'state'         => 'SP',
            'country'       => 'Brasil'
        ],
        'phone' => [
            'ddd'    => "15",
            'number' =>"987523421"
        ],
        'born_at' => '04091991',
        'sex' => 'M'
    ]);

    $card = $pagarMe->card()->create(
        $cardHolderNumber,
        $cardName,
        $cardExpirationDate,
        $cardCvv
    );

    $recipient = $pagarMe->recipient()->get('re_cjjynvfvr00jcvw6ezmpcjsk1');

    $splitRule = $pagarMe->splitRule()->percentageRule(
        15,
        $recipient,
        true,
        true
    );

    $recipient2 = $pagarMe->recipient()->get('re_cjjynuzf400javw6e70te2d77');

    $splitRule2 = $pagarMe->splitRule()->percentageRule(
        70,
        $recipient2,
        false,
        false
    );    

    $splitRules = new PagarMe\Sdk\SplitRule\SplitRuleCollection($split);
    $splitRules[0] = $splitRule;
    $splitRules[1] = $splitRule2;
    
    $transaction = $pagarMe->transaction()->creditCardTransaction(
        $amount,
        $card,
        $customer,
        $installments,
        $capture,
        $postbackUrl,
        $metadata,
        ["split_rules" => $splitRules],
        [ 'async' => false ]
    );

    date_default_timezone_set('America/Sao_Paulo');

    $balance = $pagarMe->balance()->get();

    
?>