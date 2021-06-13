<?php

namespace App\Helpers;


class Helper {


    public static function getHexColor()
    {
        
        $hex =  dechex(rand(0x000000, 0xFFFFFF));

        $hex = '#'.$hex;

        return $hex;

    }


}

 