<?php
    
    include('../MainPage/array.php');

    //Getting only the name without the extension
    $name= substr($filename,0,-4);
    

    $myfile = fopen("./Aiken/$name.txt", "w") or die("Unable to open file!");

    for($i = 0; $i < count($array); $i++){
        fwrite($myfile,$array[$i]['Question']."\n");
        fwrite($myfile,"A) ");
        fwrite($myfile,$array[$i]['Option1']."\n");
        fwrite($myfile,"B) ");
        fwrite($myfile,$array[$i]['Option2']."\n");
        fwrite($myfile,"C) ");
        fwrite($myfile,$array[$i]['Option3']."\n");
        fwrite($myfile,"D) ");
        fwrite($myfile,$array[$i]['Option4']."\n");
        fwrite($myfile,"ANSWER: ");

        switch ($array[$i]['Answer']) {
            case 1:
                fwrite($myfile,"A");
                break;
            case 2:
                fwrite($myfile,"B");
                break;
            case 3:
                fwrite($myfile,"C");
                break;
            case 4:
                fwrite($myfile,"D");
                break;
            default:
               echo "Not a correct format for ANSWER\n";
        }
        
        if($i !== count($array) - 1){
            fwrite($myfile,"\n\n");
        }
    }
    $filepath = "./Aiken/$name.txt";

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