<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of EnquiryType
 *
 * @author SakyHank
 */
class EnquiryType extends AbstractType{
    public function getName() {
        return 'enquiry';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('name')
                ->add('email','email')
                ->add('subject')
                ->add('body','textarea');
    }


}
