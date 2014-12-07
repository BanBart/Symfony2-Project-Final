<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Repository;
use FOS\ElasticaBundle\Repository;
use Project\LineOfWorkBundle\Entity\Job;

/**
 * Description of SearchRepository
 *
 * @author SakyHank
 */
class SearchRepository extends Repository{
    
    public function search(Job $search){
        $boolQuery = new \Elastica\Query\Bool();
        if($search->getPosition() !== null && $search->getCategory() === null && $search->getLocation() === null){
            
            $positionQuery = new \Elastica\Query\Match();
            $positionQuery->setFieldQuery('position', $search->getPosition());         
            $positionQuery->setFieldParam('position', 'analyzer', 'snowball');
            
            $locationQuery = new \Elastica\Query\Match();
            $locationQuery->setFieldQuery('location', $search->getPosition());
            $locationQuery->setFieldParam('location', 'analyzer', 'snowball');
            
            $boolQuery->addShould($positionQuery);
            $boolQuery->addShould($locationQuery);
            
            if($this->find($boolQuery)){
                return $this->find($boolQuery);
            }else {
                return null;
            }
            
        }else if($search->getPosition() !== null ){ 
            $positionQuery = new \Elastica\Query\Match();
            $positionQuery->setFieldQuery('position', $search->getPosition());
            $positionQuery->setFieldFuzziness('position', 1);
            $positionQuery->setFieldMinimumShouldMatch('position', '80%');
            $positionQuery->setFieldParam('position', 'analyzer', 'snowball');
            $boolQuery->addMust($positionQuery);
            
            if($search->getCategory()!== null){
                $categoryQuery = new \Elastica\Query\Match();
                $categoryQuery->setFieldQuery('category',$search->getCategory()->getName());
                //$categoryQuery->setFieldParam('category', 'analyzer', 'snowball');
                $boolQuery->addMust($categoryQuery);
            }
            if($search->getLocation()!== null){
                $locationQuery= new \Elastica\Query\Match();
                $locationQuery->setFieldQuery('location', $search->getLocation());
                $locationQuery->setFieldParam('location', 'analyzer', 'snowball');
                $boolQuery->addMust($locationQuery);
            }
            if($this->find($boolQuery)){
                return $this->find($boolQuery);
            }else {
                return null;
            }
        }else{
            return null;
        }
            
        
    }
    
    public function findByPartialName($searchTerm)
    {
        $boolQuery = new \Elastica\Query\Bool();
        $positionQuery = new \Elastica\Query\Match();
        $positionQuery->setFieldQuery('position', $searchTerm);
        $positionQuery->setFieldParam('position', 'type', 'phrase_prefix');
        $boolQuery->addShould($positionQuery);
        
        $locationQuery = new \Elastica\Query\Match();
        $locationQuery->setFieldQuery('location',$searchTerm);
        $locationQuery->setFieldParam('location','type','phrase_prefix');
        $boolQuery->addShould($locationQuery);
        
        $companyQuery = new \Elastica\Query\Match();
        $companyQuery->setFieldQuery('company',$searchTerm);
        $companyQuery->setFieldParam('company','type','phrase_prefix');
        $boolQuery->addShould($companyQuery);
        

        return $this->find($boolQuery, 100);
    }
}
