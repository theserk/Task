<?php

namespace AppBundle\Controller\API;

use AppBundle\Controller\API\APIHelper;
use AppBundle\Controller\API\APIInterface;

class FirstService implements APIInterface
{
    public $endpoint = "http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0";
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
            foreach ($APIResult["result"] as $exchangeRate) {
                switch ($exchangeRate["symbol"]) {
                    case "USDTRY":
                        $this->usd = (float) $exchangeRate["amount"];
                        break;
                    case "EURTRY":
                        $this->eur = (float) $exchangeRate["amount"];
                        break;
                    case "GBPTRY":
                        $this->gbp = (float) $exchangeRate["amount"];
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