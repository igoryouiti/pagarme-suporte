<?php
    $bankCode = '341';
    $agenciaNumber = '0932';
    $accountNumber = '58054';
    $accountDigit = '5';
    $documentNumber = '26268738888';
    $legalName = 'Conta Teste 2';
    $agenciaDigit = '1';
    $bankAccount = $pagarMe->bankAccount()->create(
      $bankCode,
      $agenciaNumber,
      $accountNumber,
      $accountDigit,
      $documentNumber,
      $legalName,
      $agenciaDigit
    );
?>