<?php

namespace Hap\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HapUsuarioBundle:Default:index.html.twig');
    }
}
