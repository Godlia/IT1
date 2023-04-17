<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Remote Directory Viewer</title>
</head>
<?php
include "./functions.php";
session_start();

?>

<?php
//check if session is valid

$root = "/home/inforjza/public_html/helgerud.informatikk6.net";
//remote directory browser
if (isset($_GET['dir'])) {
    $dir = urldecode($_GET['dir']);
} else {
    $dir = getcwd();
    $dir .= "/pages";
    echo "New Session Created <br>";
}

//show current directory
echo "Dir: " . $dir . "<br>";
$files = scandir($dir);

if(!str_contains($dir, $root)){
    echo "<h1>ERROR: You are not allowed to access <span style='font-weight: 900;'>FILES</span> in these directories</h1>";
}

//go through all files and print a link to them
print("<div class='directory'>");
// sort $files
sort($files, SORT_NATURAL);
for ($file = 0; $file < count($files); $file++) {
    //get file info
    $fileinfo = pathinfo($files[$file]);
    //get path relative to root

    //TODO: hvis denne ikke går så er vi utenfor vår domene, si ifra til bruker
    $workpath = str_replace($root, "", $dir);

    
    // print(var_dump($dir ."/" . $files[$file]));

    //if file is . go up one directory
    if ($files[$file] == ".") {
        print("<form action='remotelistdirectory.php'>" . "<input type='hidden' name='dir' value='" . dirname($dir) . "'><input class='' type='submit' value='Go up'></form>");
    } else if ($files[$file] == "..") {
        //do nothing
    } else
    //if $files[$file] is a directory, link to it and change $_GET['dir']
    if (is_dir($dir ."/" . $files[$file])) {
        print("<form action='remotelistdirectory.php'>" . "<input type='hidden' name='dir' value='" . $dir . "/" .  $files[$file] . "'><input style='color: darkgrey;' type='submit' value='" . $files[$file] . "'></form>");
    }
    //if file is part of fileextensions, link to it, instead of changing $dir
    else if (str_contains($dir, $root)) {
            print("<a class='link' href='" . $workpath . "/" .  $files[$file] . "' target='_blank' rel='noopener noreferrer'>" . $files[$file] . "</a>");
        }
}
print("</div>");

?>

<br><br><br>
<button class="unselectable" id="FoldButton">Show Source</button>
<div class="foldableContainer">
    <pre>
        <?php
        $source = file_get_contents(__FILE__);
        echo htmlspecialchars($source);
        ?>
    </pre>
</div>

<script>
    let button = document.querySelector("#FoldButton");
    var foldableContainer = document.querySelector(".foldableContainer");
    foldableContainer.style.display = "none";

    button.addEventListener("click", () =>{
        //foldableContainer.style.display = "block" ? foldableContainer.style.display = "none" : foldableContainer.style.display = "block";
        if(foldableContainer.style.display == "block"){
            foldableContainer.style.display = "none";
        }else{
            foldableContainer.style.display = "block";
        }
    });
</script>
</html>