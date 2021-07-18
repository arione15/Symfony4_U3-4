<?php

namespace App\Form;

use App\Entity\Aliment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AlimentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prix')
<<<<<<< HEAD
            ->add('imageFile', FileType::class, ['required' => false]) // ce champ n'est pas obligatoire
            ->add('calories')
            ->add('proteines')
            ->add('glucides')
            ->add('lipides')
=======
            ->add('imageFile',FileType::class,['required'=>false])
            ->add('calorie')
            ->add('proteine')
            ->add('glucide')
            ->add('lipide')
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aliment::class,
        ]);
    }
}
