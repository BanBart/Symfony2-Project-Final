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
use Project\LineOfWorkBundle\Entity\Commercial;

/**
 * Description of CommercialFixtures
 *
 * @author SakyHank
 */
class CommercialFixtures extends AbstractFixture implements OrderedFixtureInterface{
    public function getOrder() {
        return 7;
    }

    public function load(ObjectManager $manager) {
        for($i=1;$i<20;$i++){
            $commercial = new Commercial();
            $commercial->setContent('Commercial content nr--'.$i.'--');
            $commercial->setName('Commercial--'.$i.'--');
            $manager->persist($commercial);
        }
        $manager->flush();
    }

//put your code here
}
