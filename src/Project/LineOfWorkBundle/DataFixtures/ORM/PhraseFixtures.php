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
use Project\LineOfWorkBundle\Entity\Phrase;

/**
 * Description of PhraseFixtures
 *
 * @author SakyHank
 */
class PhraseFixtures extends AbstractFixture implements OrderedFixtureInterface {
    public function getOrder() {
        return 4;
    }

    public function load(ObjectManager $manager) {
        $phrase1 = new Phrase();
        $phrase1->setMainHeader('90%');
        $phrase1->setMediumHeader('Catchy slogan.');
        $phrase1->setMediumParagraph('No?');
        $phrase1->setBottomParagraph('I know...');
        
        $phrase2 = new Phrase();
        $phrase2->setMainHeader('70%');
        $phrase2->setMediumHeader('Crazy stuff.');
        $phrase2->setMediumParagraph('Great isn\'t it?');
        $phrase2->setBottomParagraph('blah.');
        
        $phrase3 = new Phrase();
        $phrase3->setMainHeader('10%');
        $phrase3->setMediumHeader('Amazing jobs.');
        $phrase3->setMediumParagraph('Just for polish programmers.');
        $phrase3->setBottomParagraph('No idea.');
        
        $manager->persist($phrase1);
        $manager->persist($phrase2);
        $manager->persist($phrase3);
        $manager->flush();
    }

//put your code here
}
