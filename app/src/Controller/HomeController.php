<?php

namespace App\Controller;


use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /** @var TwigEngine */
    public $templating;

    /**
     * @return Response
     * @throws \Twig\Error\Error
     */
    public function index() : Response{
        return new Response($this->templating->render('adds/adds.html.twig'));
    }

    /**
     * @return Response
     */
    public function addAddAction(Request $request) {
        return new Response();
    }
}