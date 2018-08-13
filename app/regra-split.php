<?php

    class RegraSplit{
        private $idRecebedor1;
        private $idRecebedor2;
        private $pagarMe;


        public function __construct($idRecebedor1, $idRecebedor2, \PagarMe\Sdk\PagarMe $pagarme){
            $this->idRecebedor1 = $idRecebedor1;
            $this->idRecebedor2 = $idRecebedor2;
            $this->pagarMe = $pagarme;

        }

        public function setSplitRules(){

            $recipient = $this->pagarMe->recipient()->get($this->idRecebedor1);

            $splitRule = $this->pagarMe->splitRule()->percentageRule(
                15,
                $recipient,
                true,
                true
            );
        
            $recipient2 = $this->pagarMe->recipient()->get($this->idRecebedor2);
        
            $splitRule2 = $this->pagarMe->splitRule()->percentageRule(
                85,
                $recipient2,
                false,
                false
            );    
        
            $splitRules = new PagarMe\Sdk\SplitRule\SplitRuleCollection();
            $splitRules[0] = $splitRule;
            $splitRules[1] = $splitRule2;

            return $splitRules;
        }

        
    }
    