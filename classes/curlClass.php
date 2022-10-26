<?php

namespace App;

class Curl
{
    protected $apiUrl = 'https://api.mobbex.com/p/checkout';
    protected $method = '$_POST';
    public $body = [''];

    public function bodyArray($array1, $array2) 
    { 
        $bodyArray = array
        (
        'total' => $array2[1],
        'description' => $array2[2],
        'currency' => 'ARS',
        'test' => true,
        'reference' => '767527217974',
        'customer' => array(
            'email' => $array1[0],
            'name' => $array1[1],
            'identification' => $array1[2]
            )
        );
        return $bodyArray;
    ;}

    public function curlMakeRequest()
    {
        $curl = curl_init(); // inicio sesion de curl
        $body = $this->body;

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
            CURLOPT_POSTFIELDS     => json_encode($body), // Encodeado en json  Pasar datos del pago
        ));

        //debuguearjson($this->body);        

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

    public function createCheckout(){
        {
            $curl = curl_init(); // inicio sesion de curl
            $body = $this->body;
    
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
                CURLOPT_POSTFIELDS     => '{"result":true,"data":{"id":"4U20U1471TUCFDZE7D","url":"https:\/\/mobbex.com\/p\/checkout\/v2\/4U20U1471TUCFDZE7D","description":"prueba","currency":"ARS","total":23132,"created":1666793058443,"intent":{"token":"c7b9405c-9c03-40ac-b93f-c05f779d6cab"},"paymentMethods":[{"group":"card","subgroup":"card_input","subgroup_title":"Tarjeta de Cr\u00e9dito\/D\u00e9bito","subgroup_logo":"https:\/\/res.mobbex.com\/images\/icons\/card.png","type":"card"},{"group":"cash","subgroup":"cash_pagofacil","subgroup_title":"Pagofacil","subgroup_logo":"https:\/\/res.mobbex.com\/images\/sources\/jpg\/pagofacil.jpg","type":"selector"},{"group":"bnpl","subgroup":"gocuotas","subgroup_title":"GoCuotas - Cuotas con tarjeta de D\u00e9bito","subgroup_logo":"https:\/\/res.mobbex.com\/images\/sources\/png\/gocuotas.png","type":"bnpl"}]}}' // Encodeado en json  Pasar datos del pago
            ));
    
            //debuguearjson($this->body);        
    
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

//     public function createCheckout(){
//         curl --request POST \
//   --url https://api.mobbex.com/p/checkout \
//   --header 'content-type: application/json' \
//   --header 'x-access-token: d31f0721-2f85-44e7-bcc6-15e19d1a53cc' \
//   --header 'x-api-key : zJ8LFTBX6Ba8D611e9io13fDZAwj0QmKO1Hn1yIj' \
//   --data '{"result":true,"data":{"id":"4U20U1471TUCFDZE7D","url":"https:\/\/mobbex.com\/p\/checkout\/v2\/4U20U1471TUCFDZE7D","description":"prueba","currency":"ARS","total":23132,"created":1666793058443,"intent":{"token":"c7b9405c-9c03-40ac-b93f-c05f779d6cab"},"paymentMethods":[{"group":"card","subgroup":"card_input","subgroup_title":"Tarjeta de Cr\u00e9dito\/D\u00e9bito","subgroup_logo":"https:\/\/res.mobbex.com\/images\/icons\/card.png","type":"card"},{"group":"cash","subgroup":"cash_pagofacil","subgroup_title":"Pagofacil","subgroup_logo":"https:\/\/res.mobbex.com\/images\/sources\/jpg\/pagofacil.jpg","type":"selector"},{"group":"bnpl","subgroup":"gocuotas","subgroup_title":"GoCuotas - Cuotas con tarjeta de D\u00e9bito","subgroup_logo":"https:\/\/res.mobbex.com\/images\/sources\/png\/gocuotas.png","type":"bnpl"}]}}
// '
//     }
}
