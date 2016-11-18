<?php

namespace EasyScrum\WelcomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EasyScrumWelcomeBundle:Default:index.html.twig');
    }
}
