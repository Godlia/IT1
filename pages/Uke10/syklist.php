<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kilometerteller</title>
    <link rel="stylesheet" href="../../ style.css">
</head>

<body>

    <h1>Kilometerteller</h1>

    <form action="" method="post">
        <input type="number" name="km" id="km">
        <label for="km">Kilometer:</label>
        <input type="submit" value="Registrer">
    </form>

    <div>
        <?php
        $targetkm = 3000;
        $fil = fopen("syklist.txt", "a");
        $kmdisplay = file_get_contents("syklist.txt");
        $prevkm = $kmdisplay;
        if (isset($_POST['km'])) {
            $km = $_POST['km'];
            
            $newkm = $prevkm + $km;
            $remainingkm = $targetkm - $newkm;
            $kmdisplay = $newkm;
            ftruncate($fil, 0);
            fwrite($fil, $newkm);
            fclose($fil);
        }

            echo "Du har syklet $kmdisplay km. <br>";
            print("Du har " . $remainingkm . " km igjen. <br>");

            if ($newkm >= $targetkm) {
                echo "Gratulerer! Du har nådd målet ditt!";
            }

            //turn into a pizzadiagram
            $percent = $newkm / $targetkm * 100;
            echo 'Du har syklet ' . round($percent) . '% av målet ditt. <br>';
            print("<img src='sektordiagram.php?needle=". $newkm . "&haystack=".$targetkm."' alt='pizzadiagram' width='200' height='200'>");

?>
    </div>

</body>

</html>