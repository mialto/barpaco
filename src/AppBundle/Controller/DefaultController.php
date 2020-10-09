<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Tapa;
use AppBundle\Entity\Categoria;
use AppBundle\Entity\Ingrediente;
use AppBundle\Repository\TapaRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/{pagina}", name="homepage")
     */
    public function indexAction(Request $request, $pagina=1)
    {
        $numTapas=3;
        //capturamos el repositorio de la tabla contra la BBDD
        $tapaRepository = $this->getDoctrine()->getEntityManager()->getRepository(Tapa::class);
        //$tapas = $tapaRepository->findByTop(1);
        $tapas = $tapaRepository->paginaTapas($numTapas, $pagina);
        
        // replace this example code with whatever you need
        return $this->render('frontal/index.html.twig', array('tapas'=>$tapas, 'paginaActual'=>$pagina));
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

    /**
     * @Route("/tapa/{id}", name="tapa")
     */
    public function tapaAction(Request $request, $id=null)
    {
        if($id != null ){
            //capturamos el repositorio de la tabla contra la BBDD
            $tapaRepository = $this->getDoctrine()->getRepository(Tapa::class);
            $tapa = $tapaRepository->find($id);
            return $this->render('frontal/tapa.html.twig', array('tapa'=>$tapa));
        }else{
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/categoria/{id}", name="categoria")
     */
    public function catAction(Request $request, $id=null)
    {
        if($id != null ){
            //capturamos el repositorio de la tabla contra la BBDD
            $categoriaRepository = $this->getDoctrine()->getRepository(Categoria::class);
            $categoria = $categoriaRepository->find($id);
            return $this->render('frontal/categoria.html.twig', array('categoria'=>$categoria));
        }else{
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/ingrediente/{id}", name="ingrediente")
     */
    public function ingAction(Request $request, $id=null)
    {
        if($id != null ){
            //capturamos el repositorio de la tabla contra la BBDD
            $ingredienteRepository = $this->getDoctrine()->getRepository(Ingrediente::class);
            $ingrediente = $ingredienteRepository->find($id);
            return $this->render('frontal/ingrediente.html.twig', array('ingrediente'=>$ingrediente));
        }else{
            return $this->redirectToRoute('homepage');
        }
    }
}
