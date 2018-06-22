<?php

namespace AppBundle\Controller\API;

interface APIInterface
{
    public function getUSD();
    public function getEUR();
    public function getGBP();
}