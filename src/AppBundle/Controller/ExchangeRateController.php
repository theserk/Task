<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ExchangeRate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\MySQL;

class ExchangeRateController extends Controller
{
    /**
     * @Route("/app", name="app")
     */
    public function appAction(Request $request)
    {
        return $this->render('default/index.html.twig', []);
    }

    public function save($data)
    {
        var_dump($data);
    }
}
