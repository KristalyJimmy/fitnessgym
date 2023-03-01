<?php 

     function generateRandomId(int $length = 6) {
        $numbers = '123456789';
        $randomNumbers = '';
        for($i=0; $i<$length; $i++) {
            $randomNumbers .= $numbers[rand(0, strlen($numbers)-1)];
        }
        return $randomNumbers;
    }