<?php

if(!function_exists('getInitials')) {
    function getInitials(string $name) {
        $words = explode(' ', $name);
        return array_reduce($words, function($acumulado, $elemento){
            return $acumulado .= strtoupper(substr($elemento,0,1));
        }, '');
    }
}
