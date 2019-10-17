<?php

namespace App\Controller;


use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /** @var TwigEngine */
    private $templating;

    public function __construct($templating)
    {
        $this->templating = $templating;
    }

    /**
     * @return Response
     * @throws \Twig\Error\Error
     */
    public function getAllAdds() : Response {
        $adds = [
            'title'  => 'adds',
            'header' => [
                'title'         => 'Titre',
                'release'       => 'Publication',
                'description'   => 'Description',
                'others'        => 'Autres'
            ],
            'content' => [
                [
                    'type'          => 'emploi',
                    'title'        => 'Parquiste pro',
                    'release'      => '10/10/2019'.' ,'.'13:30',
                    'description'  => 'recherche un emploi',
                    'salary'       => '100k',
                    'contract'     => 'CDI'
                ],
                [
                    'type'          => 'automobile',
                    'title'        => 'Vend voiture doccasion',
                    'release'      => '15/10/2019'.' ,'.'13:30',
                    'description'  => 'Elle est rouge',
                    'fuel'         => 'diesel',
                    'price'        => '100k'
                ],
                [
                    'type'          => 'immobilier',
                    'title'        => 'Vend appartement',
                    'release'      => '10/10/2019'.' ,'.'13:30',
                    'description'  => 'Situé dans le 15ème',
                    'surface'      => '30m2',
                    'price'        => '250 000€'
                ],
            ]
        ];

        return new Response($this->templating->render('adds/adds.html.twig', ['adds' => $adds]));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function addAddAction(Request $request) : Response {
        return new Response();
    }
}