<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Tapa;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //capturamos el repositorio de la tabla contra la BBDD
        //$repository = $this->getDoctrine()->getRepository(Tapa::class);
        // replace this example code with whatever you need
        return $this->render('frontal/index.html.twig');
    }

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/nosotros.html.twig');
    }

    /**
     * @Route("/contactar/{sitio}", name="contactar")
     */
    public function contactarAction(Request $request, $sitio="todos")
    {
        // replace this example code with whatever you need
        return $this->render('frontal/bares.html.twig', array('sitio'=>$sitio));
    }
}
