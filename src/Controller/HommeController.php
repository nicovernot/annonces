<?php

namespace App\Controller;

use App\Entity\App;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HommeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('homme/index.html.twig', [
            'controller_name' => 'HommeController',
        ]);
    }

     /**
     * @Route("/site", name="site_data")
     */
    public function site()
    {   
        $em = $this->getDoctrine()->getManager();

        
        $qb = $em->createQueryBuilder();

    $qb->select('c','i')
        ->from('App\Entity\App', 'c')
        ->innerJoin('App\Entity\Menu', 'i');
     

        $app = $qb->getQuery()->getResult();

    if (!$app) {
        throw $this->createNotFoundException(
            'No product found id '
        );
    }
    return $this->json($app);

    }
}
