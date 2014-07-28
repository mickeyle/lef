<?php
namespace Web\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('WebSiteBundle:Default:index.html.twig');
    }
}