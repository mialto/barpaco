<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Form\TapaType;
use AppBundle\Entity\Tapa;

/**
 * @Route("/gestionTapas")
 */
class GestionTapasController extends Controller
{
    /**
     * @Route("/nuevaTapa", name="nuevaTapa")
     */
    public function nuevaTapaAction(Request $request)
    {
        if(!is_null($request)){
            $datos=$request->request->all();
            var_dump($datos);
        }
        $tapa = new Tapa();
        //construyendo el formulario
        $form = $this->createForm(TapaType::class, $tapa);
        
        // replace this example code with whatever you need
        return $this->render('gestionTapas/nuevaTapa.html.twig', array('form'=>$form->createView()));
    }
}