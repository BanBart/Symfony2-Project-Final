<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of PhraseAdmin
 *
 * @author SakyHank
 */
class PhraseAdmin extends Admin{
    
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'medium_header'
    );
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('main_header')
            ->add('medium_header')
            ->add('medium_paragraph')
            ->add('bottom_paragraph')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('medium_header')
        ;
    }

    // Fields to be shown on lists
   protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('medium_header')
            ->add('main_header')
            ->add('medium_paragraph')
            ->add('bottom_paragraph')
        ;
    }
    
}
