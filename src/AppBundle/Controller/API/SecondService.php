<?php

namespace AppBundle\Controller\API;

use AppBundle\Controller\API\APIHelper;
use AppBundle\Controller\API\APIInterface;

class SecondService implements APIInterface
{
    public $endpoint = "http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3";
    public $data;
    public $usd;
    public $eur;
    public $gbp;

    public function __construct()
    {
        if (!empty($this->data))
            return true;
        $APIHelper = new APIHelper();
        $APIResult = $APIHelper->push($this->endpoint);
        if ($APIResult) {
            foreach ($APIResult as $exchangeRate) {
                switch ($exchangeRate["kod"]) {
                    case "DOLAR":
                        $this->usd = (float) $exchangeRate["oran"];
                        break;
                    case "AVRO":
                        $this->eur = (float) $exchangeRate["oran"];
                        break;
                    case "İNGİLİZ STERLİNİ":
                        $this->gbp = (float) $exchangeRate["oran"];
                        break;
                }
            }
            return true;
        } else {
            var_dump($APIHelper->getErrors());
            return false;
        }
    }

    public function getUSD()
    {
        return $this->usd;
    }

    public function getEUR()
    {
        return $this->eur;
    }

    public function getGBP()
    {
        return $this->gbp;
    }
}