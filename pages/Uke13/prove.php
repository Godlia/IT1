<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Prøve</title>
</head>
<style>
    html {
        margin-left: 5px;
    }
</style>
<h1>Prøve Uke 13 Solbergfossen</h1>


<?php
include "../../functions.php";
//mønsteret i csven er Tidspunkt;Vannføring (m³/s);Korrigert;Kontrollert
$fileurl = "./csv.csv";

function ReadCSV($filename)
{
    $csvfile = fopen($filename, "r");
    while (!feof($csvfile)) {
        $lines[] = fgetcsv($csvfile, 1000, ";");
    }
    fclose($csvfile);
    return $lines;
}


//vi skal fjerne alle linjer som ikke er innenfor tidsintervallet 2023-03-01 til 2023-03-07
function filterDateLines($lines, $date1, $date2)
{
    $filteredLines = array();
    foreach ($lines as $line) {
        if ($line[0] >= $date1 && $line[0] <= $date2) {
            $filteredLines[] = $line;
        }
    }
    return $filteredLines;
}

//vi skal fjerne alle linjer som ikke er klokkeslett 00:00:00 og 12:00:00
function filterTimeLines($lines)
{
    $filteredLines = array();
    foreach ($lines as $line) {
        if (substr($line[0], 11, 8) == "00:00:00" || substr($line[0], 11, 8) == "12:00:00") {
            $filteredLines[] = $line;
        }
    }
    return $filteredLines;
}

//fjern korrigert og kontrollert
function cleanLines($lines) {
    $filteredLines = array();
    foreach ($lines as $line) {
        $filteredLines[] = array($line[0], $line[1]);
    }
    return $filteredLines;
}


function barGraph($array) {
    $max = 0;
    foreach ($array as $line) {
        if ($line[1] > $max) {
            $max = $line[1];
        }
    }
    $max = $max + 1;
    $graph = "<div class='chart'>";
    foreach ($array as $line) {
        $graph .= "<div>$line[0]<div style='width: " . ($line[1] / $max) * 100 . "%;' class='barText'>" . $line[1] . "</div></div>";
    }
    $graph .= "</div>";

    
    return $graph;
}


$lines = ReadCSV($fileurl);

//vi elsker funksjoner som førsteklassesobjekter!!!
//starter med å fjerne alle linjer som ikke er innafor datointervallet, så tidsintervallet, så korrigert og kontrollert
$filtered = cleanLines(filterTimeLines(filterDateLines($lines, "2023-03-01", "2023-03-08")));

WriteCSVFile("filtered.csv", $filtered);
print_r(barGraph($filtered));
//output $filtered oversiktlig


echo "<div> <h2>raw</h2>";
foreach ($filtered as $line) {
    echo $line[0] . " " . $line[1] . " " . $line[2] . " " . $line[3] . "<br>";
}
echo "</div>";



//$line[0] er tidspunkt
//$line[1] er vannføring
//$line[2] er korrigert
//$line[3] er kontrollert







?>
</html>