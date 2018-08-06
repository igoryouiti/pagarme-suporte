<?php 
    $bankAccount = new \PagarMe\Sdk\BankAccount\BankAccount([
        "id" => 17490076
    ]);
    $transferInterval = "monthly";
    $transferDay = 13;
    $transferEnabled = true;
    $automaticAnticipationEnabled = true;
    $anticipatableVolumePercentage = 42;
    $recipient = $pagarMe->recipient()->create(
        $bankAccount,
        $transferInterval,
        $transferDay,
        $transferEnabled,
        $automaticAnticipationEnabled,
        $anticipatableVolumePercentage
    );
?>
