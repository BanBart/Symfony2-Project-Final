<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Project\LineOfWorkBundle\Entity\User;
/**
 * Description of UserFixtures
 *
 * @author SakyHank
 */
class UserFixtures extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface {
    
    private $container;
    
    public function setContainer(ContainerInterface $container = null) {
        $this->container=$container;
    }
    
    public function load(ObjectManager $object){
        $userManager = $this->container->get('fos_user.user_manager');
        
        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('sakyhank@gmail.com');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($admin);
        $admin->setPassword($encoder->encodePassword('admin', $admin->getSalt()));
        $admin->setEnabled(true);
        $admin->addRole('ROLE_ADMIN');
        
        $user1 = $userManager->createUser();
        $user1->setUsername('user1');
        $user1->setEmail('asdfasdf@gggg.com');
        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user1);
        $user1->setPassword($encoder->encodePassword('pass1', $user1->getSalt()));
        $user1->setEnabled(true);
        
        
        
        $user2 = $userManager->createUser();
        $user2->setUsername('user2');
        $user2->setEmail('asdfasdf@gmgmg.com');
        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user2);
        $user2->setPassword($encoder->encodePassword('pass2', $user2->getSalt()));
        $user2->setEnabled(true);

        $object->persist($user1);
        $object->persist($user2);
        $object->persist($admin);
        $object->flush();
        
        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
    }
    
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }

}
