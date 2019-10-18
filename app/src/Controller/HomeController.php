<?php

namespace App\Controller;


use App\Entity\Add;
use App\Form\AddType;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /** @var TwigEngine */
    private $templating;

    /** @var FormFactory */
    private $formFactory;

    public function __construct($templating, $formFactory)
    {
        $this->templating = $templating;
        $this->formFactory = $formFactory;
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
    public function createAddAction(Request $request) : Response
    {
        $parameters = $request->request->get('');
        $add = new Add();
        $errors = $this->submitForm($add, $parameters);

        return new Response();
    }

    /**
     * @param  $add
     * @param $parameters
     * @return array
     */
    private function submitForm($add, $parameters)
    {
        $form = $this->formFactory->create(
            AddType::class,
            $add,
            ['csrf_protection' => false]
        );
        $form->submit($parameters);
        $form->isValid();

        return $this->getErrorsForm($form);
    }
}