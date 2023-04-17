<?php
$symboler = array("+", "-", "*", "/");
?>

<html>

<body>
    <style contenteditable="true" style="display: block;">
        input {
            width: 50px;
        }
    </style>

    <form method="post" action="./kalkulatorbackend.php">
        <input type="number" name='tall1'>
        <select name='tegn' id="tegn">
            <?php for ($i = 0; $i < count($symboler); $i++) {
                echo "<option value='$symboler[$i]'>$symboler[$i]</option>";
            } ?>
        </select>
        <input type="number" name='tall2'>
        <input type="submit" value="Beregn">
    </form>
</body>

</html>