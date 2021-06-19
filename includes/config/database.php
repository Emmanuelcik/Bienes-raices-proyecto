<?php

function conectarDB() :mysqli{
    $db = mysqli_connect("localhost", "root", "n0m3l0", "bienes_raices");
    
    if(!$db){
        echo "Error";
        exit;
    }

    return $db;
}