<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="review.css">
    <title>Review</title>
</head>

<body>
    <section class="page">
        <h1>Рецензия на тест</h1>

         <?php
        include "../MainPage/array.php";
           //за оценки
        for($i = 0; $i < count($array); $i++)
        {
            $varQuestion = "question" . $i;
            $currentAnswer = $_POST[$varQuestion];
                 $con = new mysqli($dbHost, $dbUsername, $dbPassword,$myDb);
        if ($con->connect_error) {
           die("Connection failed: " . $con->connect_error);

       }
       $grade=intval($currentAnswer);
       if($grade!=0){
       $index=$i+1;
       $query = "INSERT INTO grade (file_name, question, grade) VALUES ('$filename', '$index','$grade')";		
       if ($con->query($query)) {
         echo"<p>Оценкa от въпрос " . $index . " запазенa успешно</p>";
       }else{
           echo "false";
           echo "<br>false<br>";
       }}
       
       $con->close();
        }
     
   




//за обратна връзка

         $feedback=$_POST['feedbk'];
         $con = new mysqli($dbHost, $dbUsername, $dbPassword,$myDb);
         if ($con->connect_error) {
            echo "print";
            die("Connection failed: " . $con->connect_error);

        }
        
        $query = "INSERT INTO feedback_ (file_name, feedback) VALUES ('$filename', '$feedback')";		
	    if ($con->query($query)) {
	      echo"Обратна връзка запазена успешно";
	    }else{
	        echo "false";
            echo "<br>false<br>";
	    }
        
        $con->close();

?>
</section>

</body>
</html>