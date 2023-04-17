<?php
$dir = getcwd();
str_replace($dir, "root/", "/home/inforjza/public_html/helgerud.informatikk6.net/");
//show current directory
echo "Dir: " . $dir . "<br>";
?>
<div>

<a href="../index.php">../</a>
<?php
//definer path som skal søkes
$somePath = ".";
//finn alle directories og put dem i en array
$directories = glob($somePath . '/*');
//gå igjennom alle elementer og print et a element som linker til directorien
foreach ($directories as $dir) {
    //if name is ./index.php, skip
    if ($dir == "./index.php" || $dir == "./listDirectory.php" || $dir == "./cgi-bin" || $dir == "./well-known") {
        continue;
    } else 
        //find if it is a html or php file
    if (file_exists($dir . "/index.php")) {
        echo ("<a href='" . $dir . "/index.php' >" . ltrim($dir, "./") . "</a>");
    } else if (file_exists($dir . "/index.html")) {
        echo ("<a href='" . $dir . "/index.html' >" . ltrim($dir, "./") . "</a>");
    } else {
        echo ("<a href='" . $dir . "' >" . ltrim($dir, "./") . "</a>");
    }
    //if no index file enter into directory and search for index
}
?>
</div>
<style>
    div {
        display: flex;
        flex-direction: column;
        max-width: fit-content;
    }
    a {
        list-style-type: none;
        border: solid 1px black;
        padding: 3px;

        background-color: lightgray;
        font-weight: bolder;
        font-family: 'Sans-Serif';
    }
</style>