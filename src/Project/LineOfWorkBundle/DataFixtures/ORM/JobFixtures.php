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
use Project\LineOfWorkBundle\Entity\Job;
/**
 * Description of JobFixtures
 *
 * @author SakyHank
 */
class JobFixtures extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $object)
    {
        
         $job1 = new Job();
         $job1->setCategory($object->merge($this->getReference('category-programming')));
         $job1->setUser($object->merge($this->getReference('user1')));
         $job1->setType('full-time');
         $job1->setCompany('Sensio Labs');
         //$job1->setLogo('sensio-labs.gif');
         $job1->setUrl('http://www.sensiolabs.com/');
         $job1->setPosition('Web Developer');
         $job1->setLocation('Paris, France');
         $job1->setDescription('You\'ve already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.');
         $job1->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
         $job1->setIsPublic(true);
         $job1->setIsActivated(true);
         $job1->setToken('job_1');
         $job1->setEmail('job@example.com');
         $job1->setExpiresAt(new \DateTime('+30 days'));
         
         $job2 = new Job();
         $job2->setCategory($object->merge($this->getReference('category-design')));
         $job2->setUser($object->merge($this->getReference('user2')));
         $job2->setType('part-time');
         $job2->setCompany('Extreme Sensio');
         $job2->setLogo('extreme-sensio.gif');
         $job2->setUrl('http://www.extreme-sensio.com/');
         $job2->setPosition('Web Designer');
         $job2->setLocation('Paris, France');
         $job2->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.');
         $job2->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
         $job2->setIsPublic(true);
         $job2->setIsActivated(true);
         $job2->setToken('job_2');
         $job2->setEmail('job@example.com');
         $job2->setExpiresAt(new \DateTime('+30 days'));
         
         for($i=3 ;$i<30; $i++){
             $job = new Job();
             $job->setCategory($object->merge($this->getReference('category-design')));
             $job->setUser($object->merge($this->getReference('user2')));
             $job->setType('part-time');
             $job->setCompany('Extreme Sensio');
             $job->setLogo('extreme-sensio.gif');
             $job->setUrl('http://www.extreme-sensio.com/');
             $job->setPosition('Web Designer');
             $job->setLocation('Paris, France');
             $job->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.');
             $job->setHowToApply('Send your resume to fabien.potencier [at] sensio.com');
             $job->setIsPublic(true);
             $job->setIsActivated(true);
             $job->setToken('job_'.$i);
             $job->setEmail('job'.$i.'@example.com');
             $job->setExpiresAt(new \DateTime('+30 days'));
             $object->persist($job);
         }
         
        
   /*     for($i = 100; $i <= 130; $i++)
    {
        $job = new Job();
        $job->setCategory($em->merge($this->getReference('category-programming')));
        $job->setType('full-time');
        $job->setCompany('Company '.$i);
        $job->setPosition('Web Developer');
        $job->setLocation('Paris, France');
        $job->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
        $job->setHowToApply('Send your resume to lorem.ipsum [at] dolor.sit');
        $job->setIsPublic(true);
        $job->setIsActivated(true);
        $job->setToken('job_'.$i);
        $job->setEmail('job@example.com');
 
        $em->persist($job);
    }*/
 
         $object->persist($job1);
         $object->persist($job2);
         $object->flush();
    }
 
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
