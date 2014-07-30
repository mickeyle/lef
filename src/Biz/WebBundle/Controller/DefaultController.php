<?php

namespace Biz\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BizWebBundle:Default:index.html.twig');
    }
}
