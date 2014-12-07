<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
/**
 * Description of SearchType
 *
 * @author SakyHank
 */
class JobSearchType extends AbstractType {
    public function getName() {
        return 'job_search';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('position')
                //->add('choice','button',array('label'=>'Advanced search'))
                ->add('category',null,array('required'=>false, 'empty_value'=>'<<category>>'))
                ->add('location',null, array('required'=>false));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Project\LineOfWorkBundle\Entity\Job'
        ));
    }


}
