<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Utils;

/**
 * Description of Slug
 *
 * @author SakyHank
 */
class Slug {
    
    static public function slugify($text){
        
        $text = preg_replace('#[^\\pL\d]+#u','-', $text);
        
        $text = trim($text, '-');
        
        if(function_exists('iconv')){
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
        
        $text = strtolower($text);
        
        $text = preg_replace('#[^-\w]+#', '', $text);
        
        if(empty($text)){
            return 'n-a';
        }
        
        return $text;
    }
}
