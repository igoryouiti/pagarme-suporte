<?php

    class Split{
        
        private $idRecebedor1;
        private $idRecebedor2;
        private $api_key;

        public function __construct($idRecebedor1, $idRecebedor2, Pagarme $api_key){
            $this->idRecebedor1 = $idRecebedor1;
            $this->idRecebedor2 = $idRecebedor2;
            //$this->api_key = $api_key;

        }

        public function setSplitRules(){

            require '../vendor/autoload.php';

            $pagarMe = new \PagarMe\Sdk\PagarMe($this->api_key);
  
            $recipient = $pagarMe->recipient()->get($this->idRecebedor1);

            $splitRule = $pagarMe->splitRule()->percentageRule(
                15,
                $recipient,
                true,
                true
            );
        
            $recipient2 = $pagarMe->recipient()->get($this->idRecebedor2);
        
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

    $split = new Split('re_cjjynvfvr00jcvw6ezmpcjsk1', 're_cjjynuzf400javw6e70te2d77', 'ak_test_9SVspN8kVDUItZUFo91wzxSbuQxHPf');
    
    $aua = $split->setSplitRules();

    var_dump($aua);    

?>