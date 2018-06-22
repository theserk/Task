<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Controller\API\APIAdaptor;
use AppBundle\Controller\API\FirstService;
use AppBundle\Controller\API\SecondService;
use AppBundle\Controller\ExchangeRateController;

class GetExchangeRatesFormAPIConsole extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('AppBundle:GetExchangeRates');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $exchangeRates = [];
        $firstService = new APIAdaptor(new FirstService());
        $secondService = new APIAdaptor(new SecondService());
        $exchangeRates[] = $firstService->getAllRates();
        $exchangeRates[] = $secondService->getAllRates();
        $exchangeRate = new ExchangeRateController();
        $exchangeRate->save($this->compareRates($exchangeRates));
    }

    protected function compareRates($rates)
    {
        $arr = [];
        foreach ($rates as $rateGroup) {
            foreach ($rateGroup as $key => $rate) {
                $arr[$key][] = $rate;
            }
        }
        return [
            "USD" => min($arr["USD"]),
            "EUR" => min($arr["EUR"]),
            "GBP" => min($arr["GBP"])
        ];
    }
}