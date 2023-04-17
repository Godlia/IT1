<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        width: 15vw;
    }
</style>
<body>
    <h1>Velkommen til energikalkulatoren</h1>
    <p>Legg inn mengde Fett, protein og karbohydrat</p>
    <form action="energikalkulator.php" method="post">
        <label for="fett">Fett</label>
        <input type="number" step="0.1" name="fett" id="fett">
        <label for="protein">Protein</label>
        <input type="number" step="0.1" name="protein" id="protein">
        <label for="karbohydrat">Karbohydrat</label>
        <input type="number" step="0.1" name="karbohydrat" id="karbohydrat">
        <input type="submit" value="Beregn">
    </form>
</body>
<?php
    $KcalPerFett = 9;
    $KcalPerProtein = 4;
    $KcalPerKarbohydrat = 4;

    $fett = $_POST["fett"];
    $protein = $_POST["protein"];
    $karbohydrat = $_POST["karbohydrat"];
    $energi = $fett * $KcalPerFett + $protein * $KcalPerProtein + $karbohydrat * $KcalPerKarbohydrat;
    echo "Energien i produktet er: $energi";
?>
</html>