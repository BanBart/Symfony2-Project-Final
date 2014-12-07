<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Project\LineOfWorkBundle\Entity\Category;

/**
 * Description of CategoryFixtures
 *
 * @author SakyHank
 */
class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $object){
        $design = new Category();
        $design->setName('Design');
 
        $programming = new Category();
        $programming->setName('Programming');
 
        $manager = new Category();
        $manager->setName('Manager');
 
        $administrator = new Category();
        $administrator->setName('Administrator');
 
        $object->persist($design);
        $object->persist($programming);
        $object->persist($manager);
        $object->persist($administrator);
        $object->flush();
 
        $this->addReference('category-design', $design);
        $this->addReference('category-programming', $programming);
        $this->addReference('category-manager', $manager);
        $this->addReference('category-administrator', $administrator);
        
    }

    public function getOrder() {
        return 1;
    }

}
