<?php

if(!function_exists('pageNotFound')) {
    function pageNotFound(){
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        return view('errors/404');
    }
}

