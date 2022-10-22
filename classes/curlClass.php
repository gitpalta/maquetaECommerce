<?php

namespace App;

class Curl {

    public $apiUrl = 'https://api.mobbex.com/p/checkout';
    public $header = ['x-api-key' => 'zJ8LFTBX6Ba8D611e9io13fDZAwj0QmKO1Hn1yIj', 'x-access-token' => 'd31f0721-2f85-44e7-bcc6-15e19d1a53cc', 'Content-Type' => 'application/jso'];  
    public $method = '$_POST';
    public $body = [['total' => 100.10], ['description' => 'prueba'], ['currency' => 'ARS'], ['reference' => '767527217974'],
    ['email' => 'email@email.com'], ['name' => 'cliente'], ['identification' => '98654321']];

}

