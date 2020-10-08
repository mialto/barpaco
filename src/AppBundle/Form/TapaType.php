<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use AppBundle\Entity\Tapa;

class TapaType extends AbstractType
{
    public function buildForm(FormBUilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('descripcion', CKEditorType::class)
            ->add('ingredientes', EntityType::class, array('class' => 'AppBundle:Ingrediente', 'multiple' => true))
            ->add('categoria', EntityType::class, array('class' => 'AppBundle:Categoria'))
            ->add('foto', FileType::class, array('attr'=> array('onchange'=>'onChange(event)')))
            ->add('top')
            ->add('save', SubmitType::class, array('label'=>'Crear tapa'))
        ;
    }
}