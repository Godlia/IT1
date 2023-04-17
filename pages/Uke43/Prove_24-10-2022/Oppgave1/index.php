<?php
//Definer variabel dagen som dagens dato
//monday = red
//tuesday = yellow
//wednesday = green
//thurday = blue
//friday = pink
//satuday = silver
//sunday = gold

//initialiser variabeler
$dagen = date("l");
$dato = date("d-m-Y");
//$norsksdag er for å få oversatt dagens dato til norsk
$norskdag = "";
$farge = "";

//Sjekk hvilken dag det er og sett variabelen farge til riktig farge og norskdag til riktig dag
if($dagen == "Monday"){
    $farge = "red";
    $norskdag = "Mandag";
} else if($dagen == "Tuesday"){
    $farge = "yellow";
    $norskdag = "Tirsdag";
} else if($dagen == "Wednesday"){
    $farge = "green";
    $norskdag = "Onsdag";
} else if($dagen == "Thursday"){
    $farge = "blue";
    $norskdag = "Torsdag";
} else if($dagen == "Friday"){
    $farge = "pink";
    $norskdag = "Fredag";
} else if($dagen == "Saturday"){
    $farge = "silver";
    $norskdag = "Lørdag";
} else if($dagen == "Sunday"){
    $farge = "gold";
    $norskdag = "Søndag";
} else {
    $farge = "black";
    $norskdag = "Ukjent";
}
?>

<html>
    <head>
    <link rel="stylesheet" href="Oppgave1.css">
    </head>
    <body style="background-color: <?php echo($farge); ?>;">
        <div>
            <h1>
                <?php
                    echo("Velkommen det er i dag <br>" . $norskdag . "<br>og datoen er <br>" . $dato);
                ?>
            </h1>
        </div>
    </body>
</html>