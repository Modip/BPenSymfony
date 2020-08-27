<?php

namespace App\Controller;

use App\Entity\ClientMoral;
use App\Entity\ClientPhysique;
use App\Form\ClientMoralType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/Client/liste", name="client_liste")
     */
    public function index()
    {
        $cm = new ClientMoral();
       
        $form = $this->createForm(ClientMoralType::class, $cm, array('action'=>$this->generateUrl('clientmoral_add')));
        $data['form'] = $form->createView();
        // $cp = new ClientPhysique();
        // $form = $this->createForm(ClientPhysiqueType::class , $cp);
        return $this->render('client/liste.html.twig', $data);
    }

    /**
     * @Route("/ClientMoral/add", name="clientmoral_add")
     */

    public function add(HttpFoundationRequest $request)
    {
    
       // $em = $this->getDoctrine()->getManager();
        $cm = new ClientMoral();
        $form = $this->createForm(ClientMoralType::class, $cm);
       
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            
            $cm = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($cm);
            $em->flush();
           // var_dump("ajout");
           // die;
        }
       // return $this->redirectToRoute('client_list');
        return new Response('client ajouter');

    }
}
