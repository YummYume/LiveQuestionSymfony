<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Profile;
use App\Form\ProfilType;

class SecondController extends AbstractController
{
    /**
     * @Route("/second", name="second")
     */
    public function index( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $profile  = new Profile();
        $form  = $this->createForm(ProfilType::class, $profile);

        if($request-> isMethod("POST") && $form->handleRequest($request)->isValid())
        {
            $em->persist($profile);
            $em->flush();
        }

        return $this->render('second/index.html.twig', [
            'controller_name' => 'SecondController',
            'form' => $form->createView(),
        ]);
    }
}
