<?php

// nao utilizado, nao consegui usar

    class Split{
        
        private $idRecebedor1;
        private $idRecebedor2;
        private $api_key;

        public function __construct($idRecebedor1, $idRecebedor2, $api_key){
            $this->idRecebedor1 = $idRecebedor1;
            $this->idRecebedor2 = $idRecebedor2;
            $this->api_key = $api_key;

        }

        public function setSplitRules(){

        //    require '../vendor/autoload.php';

            $pagarMe = new \PagarMe\Sdk\PagarMe($api_key);

            var_dump($pagarMe);
  
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
        
            $splitRules = new PagarMe\Sdk\SplitRule\SplitRuleCollection();
            $splitRules[0] = $splitRule;
            $splitRules[1] = $splitRule2;

            return 'aua';
        }

        
    }



?>