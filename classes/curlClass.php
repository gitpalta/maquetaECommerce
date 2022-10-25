<?php

namespace App;

class Curl
{
    protected $apiUrl = 'https://api.mobbex.com/p/checkout';
    protected $method = '$_POST';
    public $body = array(
        'total' => 100.10,
        'description' => 'prueba',
        'currency' => 'ARS',
        'test' => true,
        'reference' => '767527217974',
        'customer' => array(
            'email' => '{$customer->email}',
            'name' => 'cliente',
            'identification' => '98654321'
        )
    );

    public function curlMakeRequest()
    {
        $curl = curl_init(); // inicio sesion de curl

        curl_setopt_array($curl, array( //setear parameteros
            CURLOPT_URL            => $this->apiUrl,
            CURLOPT_HTTPHEADER     =>  array(
                'x-api-key: zJ8LFTBX6Ba8D611e9io13fDZAwj0QmKO1Hn1yIj',
                'x-access-token: d31f0721-2f85-44e7-bcc6-15e19d1a53cc',
                'Content-Type: application/json'
              ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($this->body), // Encodeado en json  Pasar datos del pago
        ));

        // debuguearjson($this->apiUrl);
        // debuguearjson($this->header);
        // debuguearjson($this->method);
        debuguearjson($this->body);
        

        $response = curl_exec($curl); //lo que devuelve mobbex (url, idckout, ...)
        $error    = curl_error($curl);

        curl_close($curl);

        //debuguear($error);

        //Throw curl errors
        if ($error) {
            //agregar redireccion
            return false;
        }
        //echo $response;
        return json_decode($response, true);
    }
}
