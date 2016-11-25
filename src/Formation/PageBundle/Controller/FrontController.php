<?php

namespace Formation\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    public function indexAction()
    {
        return $this->render('PageBundle:Front:index.html.twig');
    }
}
