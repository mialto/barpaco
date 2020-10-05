<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $tapa = new Tapa();
        //construyendo el formulario
        $formBuilder = $this->createFormBuilder($tapa);
        $formBuilder->add('nombre', TextType::class);
        $formBuilder->add('descripcion', TextAreaType::class);
        $formBuilder->add('ingredientes', TextareaType::class);
        $formBuilder->add('fechaCreacion', DateType::class); 
        $formBuilder->add('save', SubmitType::class, array('label'=>'Crear tapa'));

        $form = $formBuilder->getForm();
        // replace this example code with whatever you need
        return $this->render('gestionTapas/nuevaTapa.html.twig', array('form'=>$form->createView()));
    }
}