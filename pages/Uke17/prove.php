<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://helgerud.informatikk6.net/style.css">
    <title>Document</title>
</head>

<?php
//inputs for id 	dato 	bilprodusent 	bilmodell 	motor 	årgang 	regnr 	skilttype 	aircondition 	antallseter 
include_once("../../functions.php");
$csvfile = fopen("bilprodusenter.csv", "r");
$drivstoff = ["Bensin", "Diesel", "Hybrid", "Elektrisk"];
$modellfile = fopen("modeller.csv", "r");

$bilprodusenter = array();
while (!feof($csvfile)) {
    $line = fgetcsv($csvfile, 1000, ",");
    array_push($bilprodusenter, $line);
}
$bilprodusenter = $bilprodusenter[0];

$modeller = array();
while (!feof($modellfile)) {
    $line = fgetcsv($modellfile, 1000, ",");
    array_push($modeller, $line);
}
$modeller = $modeller[0];



fclose($csvfile);


?>

<body>
    <div style="
    margin-top: auto;
    margin-bottom: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    ">
        <form action="checkandShow.php" method="get">
            <input type="hidden" name="dato" value=<?php print("'" . date("d.m.Y") . "'") ?>>
            <select name="bilprodusent" id="">
                <?php
                foreach ($bilprodusenter as $value) {
                    print("<option value='" . $value . "'>" . $value . "</option>");
                }
                ?>
            </select>
            <select name="bilmodell" id="">
                <?php
                foreach ($modeller as $value) {
                    print("<option value='" . $value . "'>" . $value . "</option>");
                }
                ?>
            </select>
            <select name="motor" id="">
                <?php
                for ($i = 0; $i < count($drivstoff); $i++) {
                    print("<option value='" . $drivstoff[$i] . "'>" . $drivstoff[$i] . "</option>");
                }
                ?>
            </select>
            <select name="årgang" id="">
                <?php
                $yearint = intval(date("Y"));
                for ($i = $yearint; $i >= 1970; $i--) {
                    print("<option value='" . $i . "'>" . $i . "</option>");
                }
                ?>
            </select>
            <input type="text" name="regnr"> <label for="regnr">Registrasjonsnummer</label>
            <div>
                <input type="radio" name="skilttype" value="varebil"> <label for="skilttype">Varebil</label>
                <input type="radio" name="skilttype" value="privat"> <label for="skilttype">Personbil</label>
            </div>
            <input type="checkbox" name="aircondition" id=""> <label for="aircondition">Aircondition</label>
            <br> <input type="number" name="antallseter" id="" max="11" min="2"> <label for="seter">Antall Seter</label>
            <br> <input type="submit" value="Send inn">
        </form>
    </div>
</body>

</html>