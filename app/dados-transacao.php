<?php

    class DadosTransacao{

        private $amount;
        private $installments;
        private $capture;
        private $postbackUrl;
        private $metadata;
        private $async;

        public function __construct(){
            $this->amount = 12000;
            $this->installments = 1;
            $this->capture = true;
            $this->postbackUrl = 'http://requestb.in/pkt7pgpk';
            $this->metadata = ['nomeProduto' => 'PikachuPool'];
            $this->async = false;
        }

        public function getAmount(){
            return $this->amount;
        }
        public function getInstallments(){
            return $this->installments;
        }
        public function getCapture(){
            return $this->capture;
        }
        public function getPostbackUrl(){
            return $this->postbackUrl;
        }
        public function getMetadata(){
            return $this->metadata;
        }
        public function getAsync(){
            return $this->async;
        }
    }