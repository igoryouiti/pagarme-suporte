<?php 

    class ContaRecebedor{

        private $transferInterval = "monthly";
        private $transferDay = 13;
        private $transferEnabled = true;
        private $automaticAnticipationEnabled = true;
        private $anticipatableVolumePercentage = 42;
        private $bankAccount;
   /*     
        $bankAccount = new \PagarMe\Sdk\BankAccount\BankAccount([
            "id" => 17490076
        ]);
*/
        function criarRecipient(){
            $recipient = $pagarMe->recipient()->create(
                $bankAccount,
                $transferInterval,
                $transferDay,
                $transferEnabled,
                $automaticAnticipationEnabled,
                $anticipatableVolumePercentage
            );
            return $recipient;
        }
    }
?>
