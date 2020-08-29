<?php

namespace App\Controller;

use App\Entity\Comptemor;
use App\Form\ComptemorType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\Routing\Annotation\Route;

class ComptemorController extends AbstractController
{
    /**
     * @Route("/Compte/listecm", name="comptecm_liste")
     */
    public function index()
    {
        $cmpt = new Comptemor();
        $form = $this->createForm(ComptemorType::class, $cmpt, array('action'=>$this->generateUrl('comptemor_add')));

        $data['form'] = $form->createView();
        return $this->render('compte/listecm.html.twig', $data);

    }

    /**
     * @Route("/Comptemor/add", name="comptemor_add")
     */

    public function addComptemoral(HttpFoundationRequest $request)
    {
        
        $cmptm = new Comptemor();
        $form = $this->createForm(ComptemorType::class, $cmptm);
        $form->handleRequest($request);

        if ($form->isSubmitted() )
        {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmptm);
            $em->flush();
        }
        return new HttpFoundationResponse('compte bien creer');
    }
}
