<?php

namespace AppBundle\Controller\API;
use AppBundle\Controller\API\APIInterface;

class APIAdaptor
{
    public $service;
    public function __construct(APIInterface $APIInterface)
    {
        $this->service = $APIInterface;
    }
    public function getUSD()
    {
        return $this->service->getUSD();
    }

    public function getEUR()
    {
        return $this->service->getEUR();
    }

    public function getGBP()
    {
        return $this->service->getGBP();
    }

    public function getAllRates(){
        return [
          "USD" => $this->service->getUSD(),
          "EUR" => $this->service->getEUR(),
          "GBP" => $this->service->getGBP(),
        ];
    }
}