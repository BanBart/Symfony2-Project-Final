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
use Project\LineOfWorkBundle\Entity\Feedback;
/**
 * Description of FeedbackFixtures
 *
 * @author SakyHank
 */
class FeedbackFixtures extends AbstractFixture implements OrderedFixtureInterface{
    public function getOrder() {
        return 5;
    }

    public function load(ObjectManager $manager) {
        $feedback1 = new Feedback();
        $feedback1->setFeedbackerName('annon129323');
        $feedback1->setContent('Great site, one of the best out there!!');
        
        for($i = 2; $i< 20; $i++){
            $feedback = new Feedback();
            $feedback->setFeedbackerName('annon--'.$i.'--');
            $feedback->setContent('--'.$i.'--feedback-content '.'Great site, one of the best out there!!');
            $manager->persist($feedback);
        }
        $manager->persist($feedback1);
        $manager->flush();
        
    }

//put your code here
}
