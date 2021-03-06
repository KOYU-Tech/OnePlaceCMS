<?php

if (! function_exists('array_columns')) {
    function array_columns(array $arr, array $keysSelect)
    {
        $keys = array_flip($keysSelect);
        $filteredArray = array_map(function($a) use($keys){
            return array_intersect_key($a,$keys);
        }, $arr);

        return $filteredArray;
    }
}
