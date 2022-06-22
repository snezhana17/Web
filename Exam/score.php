<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="examStyle.css">
    <title>Exam score</title>
</head>

<body>
    <section class="pageScore">
        <h1>Изпитен режим</h1>
        <br>

        <?php
            include "../MainPage/array.php";
            $score = 0;

            for($i = 0; $i < count($array); $i++)
            {
                $varQuestion = "question" . $i;
                $currentAnswer = $_POST[$varQuestion];

                if ($currentAnswer == $array[$i]['Answer'])
                {
                    $score++;
                    echo("<p>");
                    print_r("Въпрос <b>" . ($i+1) . "</b> e верен!");
                    echo("</p>");
                }
                else
                {
                    echo ("<p>");
                    print_r("Въпрос <b>" . ($i+1) . "</b> e грешен! Верният отговор е <b>");
                    switch ($array[$i]['Answer']) 
                    {
                        case 1:
                            print_r("A.");
                            break;
                        case 2:
                            print_r("B.");
                            break;
                        case 3:
                            print_r("C.");
                            break;
                        case 4:
                            print_r("D.");
                            break;
                    }
                    echo("</b></p>");
                }
            }

            $percentage = ($score/(count($array))*100);
            $roundPercentage = round((float)$percentage, 2);
            
            echo("<br><p><b>");
            print_r("Резултат: ");
            print_r($score);
            print_r(" от " . count($array));
            echo("</b></p><p><b>");
            print_r("Оценка: " . ($roundPercentage) . "%");
            echo("</b></p>");
        ?>

        <form action="exportResult.php" method="post">
            <section id="buttons", class="buttons">
                <button id="button" class="button-9">Експорт на Вашия резултат</button>
            </section>
            <?php
                //Getting only the name without the extension
                $name= substr($filename,0,-4);
                

                $myfile = fopen("./export/$name.txt", "w") or die("Unable to open file!");

                for($i = 0; $i < count($array); $i++){
                    fwrite($myfile,"Въпрос " . ($i + 1) . ": ");
                    fwrite($myfile,$array[$i]['Question']."\n");
                    fwrite($myfile,"A) ");
                    fwrite($myfile,$array[$i]['Option1']."\n");
                    fwrite($myfile,"B) ");
                    fwrite($myfile,$array[$i]['Option2']."\n");
                    fwrite($myfile,"C) ");
                    fwrite($myfile,$array[$i]['Option3']."\n");
                    fwrite($myfile,"D) ");
                    fwrite($myfile,$array[$i]['Option4']."\n");
                    fwrite($myfile,"Верен отговор: ");

                    switch ($array[$i]['Answer']) {
                        case 1:
                            fwrite($myfile,"A\n");
                            break;
                        case 2:
                            fwrite($myfile,"B\n");
                            break;
                        case 3:
                            fwrite($myfile,"C\n");
                            break;
                        case 4:
                            fwrite($myfile,"D\n");
                            break;
                        default:
                        echo "Not a correct format for ANSWER\n";
                    }

                    fwrite($myfile,"Вашият отговор: ");
                    $varQuestion = "question" . $i;
                    $currentAnswer = $_POST[$varQuestion];

                    switch ($currentAnswer) {
                        case 0:
                            fwrite($myfile,"Неотговорен");
                            break;
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

                fwrite($myfile,"\n\nРезултат: ");
                fwrite($myfile,$score);
                fwrite($myfile," от " . count($array));
                fwrite($myfile,"\nОценка: " . $roundPercentage . "%\n");
            ?>
        </form>
        <br>
    </section>
</body>
</html>

