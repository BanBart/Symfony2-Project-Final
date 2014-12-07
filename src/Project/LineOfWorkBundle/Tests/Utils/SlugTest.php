<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Tests\Utils;
use Project\LineOfWorkBundle\Utils\Slug;
/**
 * Description of SlugTest
 *
 * @author SakyHank
 */
class SlugTest extends \PHPUnit_Framework_TestCase{
    
    public function testSlufigy(){
        $this->assertEquals('sensio', Slug::slugify('Sensio'));
        $this->assertEquals('sensio-labs', Slug::slugify('sensio labs'));
        $this->assertEquals('sensio-labs', Slug::slugify('sensio labs'));
        $this->assertEquals('paris-france', Slug::slugify('paris,france'));
        $this->assertEquals('sensio', Slug::slugify(' sensio'));
        $this->assertEquals('sensio', Slug::slugify('sensio '));
        $this->assertEquals('n-a', Slug::slugify(''));
    }
}
