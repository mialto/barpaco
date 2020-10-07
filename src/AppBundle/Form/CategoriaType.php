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

use AppBundle\Entity\Tapa;

class CategoriaType extends AbstractType
{
    public function buildForm(FormBUilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('descripcion', CKEditorType::class)
            ->add('foto', FileType::class, array('attr'=> array('onchange'=>'onChange(event)')))
            ->add('save', SubmitType::class, array('label'=>'Nueva Categoria'))
        ;
    }
}