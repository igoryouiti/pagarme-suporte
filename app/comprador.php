<?php


    class Comprador extends PagarMe\Sdk\Customer\Customer{

        public function __construct(){
            parent :: __construct([
                'name' => 'Desafio Igor',
                'email' => 'igor@pagar.me',
                'document_number' => '09130141095',
                'address' => [
                    'street'        => 'rua teste',
                    'street_number' => 42,
                    'neighborhood'  => 'centro',
                    'zipcode'       => '01227200',
                    'complementary' => 'Apto 42',
                    'city'          => 'São Paulo',
                    'state'         => 'SP',
                    'country'       => 'Brasil'
                ],
                'phone' => [
                    'ddd'    => "15",
                    'number' =>"987523421"
                ],
                'born_at' => '04091991',
                'sex' => 'M'
            ]);
        }

    }


?>