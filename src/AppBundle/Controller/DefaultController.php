<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/ping")
     */
    public function indexAction()
    {
        var_dump('Jest!!!');exit;
      //  return $this->render('index.html.twig');
    }
}