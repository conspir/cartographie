<?php

namespace CartographieBundle\Controller;

use CartographieBundle\Entity\Application;
use CartographieBundle\Form\ApplicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApplicationController
 * @Route("/application")
 * @package CartographieBundle\Controller
 */
class ApplicationController extends Controller
{
    /**
     * @Route("/ajouter")
     */
    public function ajouterAction() {
        
        $application = new Application();
        
        $form = $this->get('form.factory')->create(ApplicationType::class, $application);
        
        return $this->render('CartographieBundle:Application:ajouter.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function validerAction(Request $request) {
        
        $application = new Application();
        
        if ($request->isMethod('POST')) {
            
            $form = $this->get('form.factory')->create(ApplicationType::class, $application);
            
            $form->handleRequest($request);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();
            
            return $this->render('@Cartographie/Page/index.html.twig');
            
        }
        
    }
    
}
