<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextType::class, ['attr' =>['maxLength' => 100, 'placeholder' => 'Ex.: Dupont']])
            ->add('Prenom',TextType::class, ['attr' =>['maxLength' => 100]])
            ->add('email', EmailType::class, ['attr' =>['maxLength' => 100]])
            ->add('message', TextareaType::class, ['attr'=> ['maxLength' => 100,'minLength'  => 50], 'help' =>'100 char max'])
            ->add('fichier', FileType::class, ['required' => false, 'help' => 'pdf only - 2 Mo max', 'constraints' =>
             [new File(['maxSize'=>'2048k', 'mimeTypes'=>['application/pdf'], 'mimeTypesMessage'=>'Merci de selectionner un fichier au format pdf'])]]) // par défaut required est true
            ->add('envoyer', SubmitType::class) // c'est optionel
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
