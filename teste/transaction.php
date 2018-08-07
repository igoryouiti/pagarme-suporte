<?php
    require_once '../vendor/autoload.php';
    require '../config.php';

   


    $api_key = (API_KEY);

    $idRecebedor1 = (RECEBEDOR_01);
    $idRecebedor2 = (RECEBEDOR_02);

    $pagarMe = new \PagarMe\Sdk\PagarMe($api_key);
    $amount = 1000;
    $installments = 1;
    $capture = true;
    $postbackUrl = 'http://requestb.in/pkt7pgpk';
    $metadata = ['idProduto' => 13933139];
    
    //CRIAÇÃO DO CUSTOMER
    $customer = new \PagarMe\Sdk\Customer\Customer([
        'name' => 'John Dove',
        'email' => 'john@site.com',
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
        'born_at' => '15021994',
        'sex' => 'M'
    ]);
    
    $card = $pagarMe->card()->create(
        '4242424242424242',
        'JOHN DOVE Split',
        '0722',
        '411'
    );
    /** @var $recipient \PagarMe\Sdk\Recipient\Recipient */
    $recipient = $pagarMe->recipient()->get('idRecebedor1');
    
    /** @var $splitRule PagarMe\Sdk\SplitRule\SplitRule */
    $splitRule = $pagarMe->splitRule()->percentageRule(
        30,
        $recipient,
        true,
        true
    );
    $recipient2 = $pagarMe->recipient()->get('idRecebedor2');

     /** @var $splitRule PagarMe\Sdk\SplitRule\SplitRule */
     $splitRule2 = $pagarMe->splitRule()->percentageRule(
        70,
        $recipient2,
        false,
        false
    );

    $splitRules = new PagarMe\Sdk\SplitRule\SplitRuleCollection($split);
    $splitRules[0] = $splitRule;
    $splitRules[1] = $splitRule2;

/*
    //TRANSAÇÃO DE CARTÃO DE CRÉDITO
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
*/
    date_default_timezone_set('America/Sao_Paulo');

    $balance = $pagarMe->balance()->get();


    $saldo = $balance->getAvailable()->amount;
    $aReceber = $balance->getWaitingFunds()->amount;

    header("Location: saldo-teste.php?saldo=$saldo&areceber=$aReceber");
?>