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
 * Description of FeedbackAdmin
 *
 * @author SakyHank
 */
class FeedbackAdmin extends Admin {
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'feedbacker_name'
    );
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('feedbacker_name')
            ->add('content')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('feedbacker_name')
        ;
    }

    // Fields to be shown on lists
   protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('feedbacker_name')
            ->add('content')
        ;
    }
}
