<head>
    <title>Check and show</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<?php
//dato bilprodusent bilmodell motor årgang regnr aircondition antallseter

//check all inputs are set
if (!isset($_GET["dato"]) || !isset($_GET["bilprodusent"]) || !isset($_GET["bilmodell"]) || !isset($_GET["motor"]) || !isset($_GET["årgang"]) || !isset($_GET["regnr"]) || !isset($_GET["skilttype"]) || !isset($_GET["aircondition"]) || !isset($_GET["antallseter"])) {
    print("Alle felt må fylles ut");
    die();
}


$error = false;
$regnrREGEX = "/[A-Z]{2}[0-9]{5}/";
if (preg_match($regnrREGEX, $_GET["regnr"])) {
} else {
    print("Regnr er ikke gyldig");
    $error = true;

}

if (!is_numeric($_GET["antallseter"])) {
    print("Antallseter er ikke gyldig");
    $error = true;
} else {
    if (intval($_GET["antallseter"]) > 5 && $_GET["bilmodell"] != "Transporter") {
        print("Antallseter er ikke gyldig");
        $error = true;
    } else if (intval($_GET["antallseter"]) > 3 && $_GET["skilttype"] == "varebil") {
        print("Antallseter er ikke gyldig");
        $error = true;
    }
}

?>

<table>
    <tr>
        <td>Dato</td>
        <td><?php print($_GET["dato"]) ?></td>
    </tr>
    <tr>
        <td>Bilprodusent</td>
        <td><?php print($_GET["bilprodusent"]) ?></td>
    </tr>
    <tr>
        <td>Bilmodell</td>
        <td><?php print($_GET["bilmodell"]) ?></td>
    </tr>
    <tr>
        <td>Motor</td>
        <td><?php print($_GET["motor"]) ?></td>
    </tr>
    <tr>
        <td>Årgang</td>
        <td><?php print($_GET["årgang"]) ?></td>
    </tr>
    <tr>
        <td>Regnr</td>
        <td><?php print($_GET["regnr"]) ?></td>
    </tr>
    <tr>
        <td>Skilttype</td>
        <td><?php print($_GET["skilttype"]) ?></td>
    </tr>
    <tr>
        <td>Aircondition</td>
        <td><?php print($_GET["aircondition"]) ?></td>
    </tr>
    <tr>
        <td>Antallseter</td>
        <td><?php print($_GET["antallseter"]) ?></td>
    </tr>
</table>
<?php print("Error: " . $error); ?>
<form action="db_connection.php" method="post">
    <input type="hidden" name="dato"            value="<?php print($_GET["dato"]) ?>">
    <input type="hidden" name="bilprodusent"    value="<?php print($_GET["bilprodusent"]) ?>">
    <input type="hidden" name="bilmodell"       value="<?php print($_GET["bilmodell"]) ?>">
    <input type="hidden" name="motor"           value="<?php print($_GET["motor"]) ?>">
    <input type="hidden" name="årgang"          value="<?php print($_GET["årgang"]) ?>">
    <input type="hidden" name="regnr"           value="<?php print($_GET["regnr"]) ?>">
    <input type="hidden" name="skilttype"       value="<?php print($_GET["skilttype"]) ?>">
    <input type="hidden" name="aircondition"    value="<?php print($_GET["aircondition"]) ?>">
    <input type="hidden" name="antallseter"     value="<?php print($_GET["antallseter"]) ?>">
    <input type="hidden" name="error"           value="<?php print($error) ?>">

    <input type="submit" value="Godta">
</form>