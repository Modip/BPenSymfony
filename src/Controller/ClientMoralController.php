<?php

namespace App\Controller;

use App\Entity\ClientMoral;
use App\Form\ClientMoralType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientMoralController extends AbstractController
{
    /**
     * @Route("/Client/listecm", name="clientcm_liste")
     */
    public function index()
    {
        $cm = new ClientMoral();
        $form = $this->createForm(ClientMoralType::class, $cm, array('action'=>$this->generateUrl('clientmoral_add')));
       
        $data['form'] = $form->createView();
        return $this->render('client/listecm.html.twig', $data);
    }

    /**
     * @Route("/ClientMoral/add", name="clientmoral_add")
     */

    public function add(Request $request)
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
