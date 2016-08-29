<?php

namespace TodoList\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FolderType extends FormBuilderInterface {

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('title', 'text')
            ->add('type', 'choice', array(
                'choices' => array('PRIVATE' => 'Private', 'WORK' => 'Work')
            ));
    }

    public function getName(){
        return 'folder';
    }
}