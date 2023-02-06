<?php

namespace App\Helpers;

class GenerateRandomString
{

    public function getString($length) {      
        $chars = "abcdefghijklmnopqrstuvwxyz1234567890";
        $ticket = "";
        for ($i=0; $i < $length; $i++) { 
            $index = rand(0, strlen($chars)-1);
            $ticket .= $chars[$index];
        }
        return $ticket;
    }
}

?>