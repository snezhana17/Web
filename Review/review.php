<!DOCTYPE html>
<html lang="bg">
<!-- WITH SQL -->
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
        <form action="feedback.php" method="post">
         <?php
         $feedback;
            include "../MainPage/array.php";
            // "grade.php"; // comment this
           // include "feedbackOnlyTable.php"; // comment this
            
            for($i=0;$i<count($array);$i++)
            {
            
                        echo "<li>";
                            print_r("Номер: ");
                            print_r($i+1);
                        echo "</li>";

                        echo "<li>";
                            print_r($array[$i]['Question']);
                        echo "</li>";

                        echo "<li>";
                            print_r("A) ");
                            print_r($array[$i]['Option1']);
                        echo "</li>";
                        
                        echo "<li>";
                            print_r("B) ");
                            print_r($array[$i]['Option2']);
                        echo "</li>";

                        echo "<li>";
                            print_r("C) ");
                            print_r($array[$i]['Option3']);
                        echo "</li>";

                        echo "<li>";
                            print_r("D) ");
                            print_r($array[$i]['Option4']);
                        echo "</li>";
                        print_r("Моля оценете въпроса: ");
                        
                        $varQuestion = 'question'.$i;
                       
                      
                        echo '<select id="' . $varQuestion . '" name="' . $varQuestion . '">';
                        echo '<option value="0">Изберете oценка</option>';
                        echo '<option value="2">2</option>';
                        echo '<option value="3">3</option>';
                        echo '<option value="4">4</option>';
                        echo '<option value="5">5</option>';
                        echo '<option value="6">6</option>';
                    echo '</select>';
            
                      

        
            }
            
            ?>
           <br>
            <label for="feedback">Обратна връзка:</label><br>
            <textarea name="feedbk" rows="5" cols="60" maxlength="1000">
            </textarea>
            <p><input type="submit" value="Запишете рецензия" /></p>
        </form>
        
           
        </section>
        
    </body>
    </html>
