<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilities
 *
 * @author User
 */
class Utilities {
    public static function checkDateFormat($stringDate,$format='m/d/Y'){
        switch ($format) {
            case 'm/d/Y' :
                $pattern = "/^[0-12]{1,2}\/[0-31]{1,2}\/[0-9]{4}$/";
                break;
            case 'd/m/Y' :
                $pattern = "/^[0-31]{1,2}\/[0-12]{1,2}\/[0-9]{4}$/";
                break;
            case 'm-d-Y' :
                $pattern = "/^[0-12]{1,2}-[0-31]{1,2}-[0-9]{4}$/";
                break;
            case 'd-m-Y' :
                $pattern = "/^[0-31]{1,2}-[0-12]{1,2}-[0-9]{4}$/";
                break;
            case 'Y-m-d' :
                $pattern = "/^[0-9]{4}-[0-12]{1,2}-[0-31]{1,2}$/";
                break;
            default:
                $pattern = "/^[0-12]{1,2}\/[0-31]{1,2}\/[0-9]{4}$/";
                break;
        }
        if(preg_match($pattern,$stringDate)){
            return true;
        }
        return false;
    }
}
