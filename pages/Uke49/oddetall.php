<html>
    <head>
        <title>Jeff</title>
    </head>
    <body>
        <!-- Input -->
        <form name="form" action="" method="POST">
            <input type="text" name="tall">
            <input type="submit" value="Sjekk">
        </form>
    </body>
</html>

<!-- Sjekk om tallet er et oddetall eller partall-->
<?php

if (isset($_POST['tall'])) {
    if ($_POST['tall'] % 2 == 0) {
        echo "Tallet er et partall";
    } else {
        echo "Tallet er et oddetall";
    }
}

?>