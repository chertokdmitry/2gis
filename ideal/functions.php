<?php

function debug($arr) 
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function shift($arr) 
{
    $blankItems = [];
    $result = array_merge($blankItems, $arr);
    return $result;
} 