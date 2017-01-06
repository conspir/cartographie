<?php

namespace CartographieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends Controller
{
    
    /**
     * @Route("/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {
        return $this->render('CartographieBundle:Page:index.html.twig');
    }
}
