<?php

namespace Formation\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Admin controller
 * 
 * @Route("admin")
 */
class AdminController extends Controller
{
    
    /**
     * Index of admin
     * 
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('FormationAdminBundle:admin:index.html.twig');        
    }
    
}
