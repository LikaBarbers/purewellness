<?php

function e($string){

    return htmlspecialchars($string,ENT_QUOTES,'UTF-8');

}

function redirect($url){

    header("Location: ".$url);
    exit;

}

function money($price){

    return number_format($price,2)." Lek";

}

function slug($text){

    $text = strtolower($text);

    $text = preg_replace('/[^a-z0-9]+/','-',$text);

    return trim($text,'-');

}
