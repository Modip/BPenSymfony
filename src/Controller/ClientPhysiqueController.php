<?php

namespace App\Controller;

use App\Entity\ClientPhysique;

use App\Form\ClientPhysiqueType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\Routing\Annotation\Route;

class ClientPhysiqueController extends AbstractController
{
    /**
     * @Route("/Client/listecp", name="clientcp_liste")
     */
    public function index()
    {

        $cp = new ClientPhysique();
        $form = $this->createForm(ClientPhysiqueType::class, $cp, array('action'=>$this->generateUrl('clientphysique_add')));
        $data['form'] = $form->createView();
        return $this->render('client/listecp.html.twig', $data);
       
    }
    /**
     * @Route("/ClientPhysique/add", name="clientphysique_add")
     */
    public function addClientPhysique(Request $request)
    {
    
       
        $cp = new ClientPhysique();
        $form = $this->createForm(ClientPhysiqueType::class, $cp);
       
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            
            $cp = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($cp);
            $em->flush();
           // var_dump("ajout");
           // die;
        }
       // return $this->redirectToRoute('client_list');
        return new HttpFoundationResponse('client ajouter');

    }
}
