<?php

    require_once 'vendor/autoload.php';
    require 'config.php';
    require 'app/comprador.php';


    $api_key = (API_KEY);
    $idRecebedor1 = (RECEBEDOR_01);
    $idRecebedor2 = (RECEBEDOR_02);

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

    $customer = new Comprador();

    $card = $pagarMe->card()->create(
        $cardNumber,
        $cardHolderName,
        $cardExpirationDate,
        $cardCvv
    );

    $recipient = $pagarMe->recipient()->get($idRecebedor1);

    $splitRule = $pagarMe->splitRule()->percentageRule(
        15,
        $recipient,
        true,
        true
    );

    $recipient2 = $pagarMe->recipient()->get($idRecebedor2);

    $splitRule2 = $pagarMe->splitRule()->percentageRule(
        85,
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

    $saldo = $balance->getAvailable()->amount;
    $aReceber = $balance->getWaitingFunds()->amount;

    header("Location: saldo.php?saldo=$saldo&areceber=$aReceber");
?>