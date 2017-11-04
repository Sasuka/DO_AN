<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 12/7/2017
 * Time: 10:09
 */
function public_url($url = '')
{
    return base_url('public/' . $url);
}

function pre($list,$exit = true){
    echo "<pre>";
        print_r($list);
    echo "</pre>";
    if ($exit)
        die();
}
