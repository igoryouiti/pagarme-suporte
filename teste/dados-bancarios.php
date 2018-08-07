<?php

  class ContaBanco
  {
    private $bankCode = '341';
    private $agenciaNumber = '0932';
    private $accountNumber = '58054';
    private $accountDigit = '5';
    private $documentNumber = '26268738888';
    private $legalName = 'Conta Teste 2';
    private $agenciaDigit = '1';

    public function criarContaBanco(){
      $bankAccount = $pagarMe->bankAccount()->create(
        $bankCode,
        $agenciaNumber,
        $accountNumber,
        $accountDigit,
        $documentNumber,
        $legalName,
        $agenciaDigit
      );
      return $bankAccount;
    }

  }
?>