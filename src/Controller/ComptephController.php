<?php

namespace App\Controller;

use App\Entity\Compteph;
use App\Form\ComptephType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\Routing\Annotation\Route;

class ComptephController extends AbstractController
{
    /**
     * @Route("Compte/listecp", name="comptecp_liste")
     */
    public function index()
    {
        $cmpt = new Compteph();
        $form = $this->createForm(ComptephType::class, $cmpt, array('action'=>$this->generateUrl('compteph_add')));

        $data['form'] = $form->createView();
        return $this->render('compte/listecp.html.twig',$data);
    }

    /**
     * @Route("/Compteph/add", name="compteph_add")
     */

    public function addComptephysique(Request $request)
    {
        
        $cmptp = new Compteph();
        $form = $this->createForm(ComptephType::class, $cmptp);
        $form->handleRequest($request);

        if ($form->isSubmitted() )
        {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmptp);
            $em->flush();
        }
        return new HttpFoundationResponse('compte bien creer');
    
    }
}
