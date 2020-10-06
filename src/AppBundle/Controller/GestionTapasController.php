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
    
        $tapa = new Tapa();
        //construyendo el formulario
        $form = $this->createForm(TapaType::class, $tapa);
        //Recogemos la informacion del submit
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $tapa = $form->getData();

            $tapa->setFoto("");
            $tapa->setFechaCreacion(new \DateTime());

            //Almacenar nueva tapa
            $em = $this->getDoctrine()->getManager();
            $em->persist($tapa);
            $em->flush();
    
            //redirige a la url de la tapa que acabamos de crear
            return $this->redirectToRoute('tapa', array('id' => $tapa->getId()));
        }
        // replace this example code with wmhatever you need
        return $this->render('gestionTapas/nuevaTapa.html.twig', array('form'=>$form->createView()));
    }
}