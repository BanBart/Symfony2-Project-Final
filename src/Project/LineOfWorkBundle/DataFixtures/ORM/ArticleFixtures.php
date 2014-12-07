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
use Project\LineOfWorkBundle\Entity\Article;

/**
 * Description of ArticleFixtures
 *
 * @author SakyHank
 */
class ArticleFixtures extends AbstractFixture implements OrderedFixtureInterface{
    public function getOrder() {
        return 6;
    }

    public function load(ObjectManager $manager) {
        $article = new Article();
        $article->setArticleType('About');
        $article->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel 
            elementum felis. Morbi et nulla eu ante mollis tempor in sed neque. 
            Fusce elit nibh, sollicitudin non aliquam a, eleifend et massa. Vivamus 
            vitae luctus tortor. Pellentesque vel congue justo. Morbi viverra semper 
            eros, at imperdiet tortor bibendum ac. Suspendisse faucibus arcu id mauris 
            vestibulum, eget consectetur lacus rhoncus. Nulla aliquam felis ac condimentum 
            varius. Quisque hendrerit mattis malesuada.');
        
        $oddity1 = new Article();
        $oddity1->setArticleType('Oddity');
        $oddity1->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Nunc at nibh ut sapien suscipit laoreet. Etiam quis facilisis leo. 
        Ut metus lacus, posuere id ligula id, tempor congue est. ');
        
    for($i=2;$i<20;$i++){
        $oddity2 = new Article();
        $oddity2->setArticleType('Oddity');
        $oddity2->setContent('Oddity content -----'.$i.'-----');
        $manager->persist($oddity2);
    }
    
        $manager->persist($oddity1);             
        $manager->persist($article);
        $manager->flush();
    }

}
