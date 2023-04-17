<html>
    <head><link rel="stylesheet" href="../../style.css"></head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

?>
<!--
Varme:
    1gram vann + 1 grad = 1 kalori
    1 L = 1000gram
    Vann starter på 5 grader celsius
        Dusj på 40 grader krever 35 grader oppvarming

Uttak:
    Vanlig Dusjhode: 16L/min
    Sparehode: 8L/min


I/O keys:
'lengde' -> tid
'temperatur' -> temperatur
'dusjhode' -> dusjhode


En kalori = 4,184 joule. 
En kilokalori (1kcal) = 1000 kalori (”cal) = 4,184 KiloJoule.
Omregnet blir det at det trengs 1,16 watthour/liter/celcius  
BEREGN ENERGIBRUKEN


CSV format:
timestamp, lengde, temperatur, dusjhode, literperminutt, litervannbrukt, deltaOppvarming, oppvarmingkalorier, oppvarmingKiloJoule
-->
<?php

if (isset($_POST['lengde']) && isset($_POST['temperatur']) && isset($_POST['dusjhode'])) {
    $iolengde = $_POST['lengde'];
    $iotemperatur = $_POST['temperatur'];
    $iodusjhode = $_POST['dusjhode'];
    $filename = "data.csv";
    

    //kalkulering
    $calcOut = CalculateEnergy($iolengde, $iotemperatur, $iodusjhode);
    AppendToCSVFile($filename, objectToArray($calcOut));
}

?>


<div class="main">
    <!-- INPUT FORM -->
    <div class="calculate">
        <form action="" method="post">
            <div> <label for="lengde">Hvor Lenge skal du dusje?</label><input type="number" name="lengde" id=""></div>
            <select name="temperatur" id="">
                <option value="30">30°</option>
                <option value="32">32°</option>
                <option value="34">34°</option>
                <option value="36">36°</option>
                <option value="38">38°</option>
                <option value="40">40°</option>
                <option value="42">42°</option>
            </select>
            <div><input type="radio" name="dusjhode" id="" value="vanlig"> <label for="dusjhode">Vanlig Dusjhode</label></div>
            <div><input type="radio" name="dusjhode" id="" value="spare"> <label for="dusjhode">Spare Dusjhode</label></div>
            <input type="submit" value="Submit">
        </form>


        <?php

        if (isset($calcOut)) {
            echo "<p>Når du dusjer i $calcOut->lengde minutter, med $calcOut->dusjhode-hode i $calcOut->temperatur grader celsius så, </p>";
            echo "<p>vil det blir brukt " . round($calcOut->oppvarmingwatthour) . " wattimer</p>";
        } else {
            echo "<p>Det Oppsto en feil</p>";
        }
        ?>
    </div>


    <!-- HENT CSV -->
    <div class="FetchCSV">
        <h1>CSV</h1>
        <table>
            <?php
            $filename = "data.csv";
            echo "<html><body><table>
            <tr>
                <th>Timestamp</th>
                <th>Lengde</th>
                <th>Temperatur</th>
                <th>Dusjhode</th>
                <th>Liter per minutt</th>
                <th>Liter vann brukt</th>
                <th>Delta oppvarming</th>
                <th>Oppvarming kalorier</th>
                <th>Oppvarming KiloJoule</th>
                <th>Oppvarming wattimer</th>
            </tr>\n\n";
            $f = fopen($filename, "r");
            $totalwatthours;
            while (($line = fgetcsv($f)) !== false) {
                
                echo "<tr>";

                foreach ($line as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                    
                }
                echo "</tr>\n";

                //get last value in line
                $totalwatthours += end($line);
            }
            fclose($f);

            echo "\n</table></body></html>";
            echo "<p>Totalt: " . round($totalwatthours) . " wattimer</p>";
            

            ?>
        </table>
    </div>
</div>

<style>
    form {
        display: flex;
        flex-direction: column;
        max-width: 25vw;
    }

    .main {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }
</style>

</html>