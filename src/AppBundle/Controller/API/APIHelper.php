<?php

namespace AppBundle\Controller\API;

class APIHelper
{
    public $endpoint;
    public $errors = [];

    public function push($endpoint = null){
        if($endpoint == null){
            array_push($this->errors,"Endpoint is null.");
            return false;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$endpoint);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);
        return $response;
    }

    public function getErrors(){
        return $this->errors;
    }
}