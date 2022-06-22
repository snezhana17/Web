<?php

    // This file is a fork of aiken.php
    
    include('../MainPage/array.php');

    //Getting only the name without the extension
    $name= substr($filename,0,-4);             

    $myfile = fopen("./export/$name.txt", "a") or die("Unable to open file!");
    
    $filepath = "./export/$name.txt";

    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die();
    } else {
        http_response_code(404);
        die();
    }
?>