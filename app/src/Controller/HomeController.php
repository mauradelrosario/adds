<?php

namespace App\Controller;


use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /** @var TwigEngine */
    public $templating;

    public function index() : Response{
        return new Response($this->templating->render('adds/adds.html.twig'));
    }
}