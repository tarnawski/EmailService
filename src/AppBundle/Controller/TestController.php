<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TestController extends Controller
{
    /**
     * @Route("/test")
     */
    public function indexAction()
    {
        return JsonResponse::create([
            'status' => 'success'
        ]);
    }
}