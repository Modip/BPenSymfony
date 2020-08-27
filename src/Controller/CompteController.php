<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/Compte/liste", name="compte_liste")
     */
    public function index()
    {
        $cmpt = new Compte();
        $form = $this->createForm(CompteType::class, $cmpt, array('action'=>$this->generateUrl('compte_add')));

       // $form = $this->createForm(CompteType::class, $cmpt);
        $data['form'] = $form->createView();
        return $this->render('compte/liste.html.twig',$data);

    }

    /**
     * @Route("/Compte/add", name="compte_add")
     */

    public function add(Request $request)
    {
        
        $cp = new Compte();
        $form = $this->createForm(CompteType::class, $cp);
        $form->handleRequest($request);

        if ($form->isSubmitted() )
        {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($cp);
            $em->flush();
        }
        return new Response('compte bien creer');
    }
}
