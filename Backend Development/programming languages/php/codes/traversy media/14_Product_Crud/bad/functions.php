<?php

function randomString($n){

    $characterset = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str = '';

    for($i = 0 ; $i < $n ; $i++){
        $index = rand(0 , strlen($characterset) - 1);
        $str .= $characterset[$index];
    }
    return $str ;

}

?>