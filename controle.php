<?php

    require_once 'vendor/autoload.php';
    require 'config.php';
    require 'app/comprador.php';
    require 'app/regra-split.php';
    require 'app/dados-transacao.php';


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

    $dadosTransacao = new DadosTransacao();

    $customer = new Comprador();

    $card = $pagarMe->card()->create(
        $cardNumber,
        $cardHolderName,
        $cardExpirationDate,
        $cardCvv
    );

    $regraSplit = new RegraSplit($idRecebedor1, $idRecebedor2, $pagarMe);
    $splitRules = $regraSplit->setSplitRules();

    $transaction = $pagarMe->transaction()->creditCardTransaction(
        $dadosTransacao->getAmount(),
        $card,
        $customer,
        $dadosTransacao->getInstallments(),
        $dadosTransacao->getCapture(),
        $dadosTransacao->getPostbackUrl(),
        $dadosTransacao->getMetadata(),
        ["split_rules" => $splitRules],
        [ 'async' => $dadosTransacao->getAsync()]
    );

    session_start();

    date_default_timezone_set('America/Sao_Paulo');

    $balance = $pagarMe->balance()->get();
    $saldo = $balance->getAvailable()->amount;
    $aReceber = $balance->getWaitingFunds()->amount;

    $recipient1 = $pagarMe->recipient()->get($idRecebedor1);
    $balance1 = $pagarMe->recipient()->balance($recipient1);

    $recipient2 = $pagarMe->recipient()->get($idRecebedor2);
    $balance2 = $pagarMe->recipient()->balance($recipient2);

    $_SESSION['saldo'] = $saldo; 
    $_SESSION['aReceber'] = $aReceber;

    $_SESSION['saldoReceberdor1'] = $balance1->getAvailable()->amount; 
    $_SESSION['aReceberRecebedor1'] = $balance1->getWaitingFunds()->amount; 

    $_SESSION['saldoRecebedor2'] = $balance2->getAvailable()->amount; 
    $_SESSION['aReceberRecebedor2'] = $balance2->getWaitingFunds()->amount; 

    header("Location: saldo.php?");
?>
