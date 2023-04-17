<?php

$needle = $_GET['needle'];
$haystack = $_GET['haystack'];
$gradtall = (($needle/($haystack/100))*3.6);

$resolutionX = 800;
$resolutionY = 800;

// Lager bilde, tall angir størrelse i pixler
$eksempel = imagecreatetruecolor(800, 800);
//imagecreatetruecolor(horisontal antall pixler, vertikal antall pixler);

//Lager gjennomsiktig bakgrunn
imagesavealpha($eksempel, true);
$trans_colour = imagecolorallocatealpha($eksempel, 0, 0, 0, 127);
imagefill($eksempel, 0, 0, $trans_colour);

//Farger i RGB
$yellow     = imagecolorallocate($eksempel, 255, 255,0);
$darkyellow = imagecolorallocate($eksempel, 204, 204, 0);
$green     = imagecolorallocate($eksempel, 0, 255, 0);
$darkgreen = imagecolorallocate($eksempel, 0, 153, 0);
$red      = imagecolorallocate($eksempel, 255, 0, 0);
$darkred  = imagecolorallocate($eksempel, 204, 0, 0);

//Lager 3D effekt
    for ($i = 60; $i > 50; $i--) {
        imagefilledarc($eksempel, $resolutionX/2 , $i, 100, 50, 0, $gradtall, $darkgreen, IMG_ARC_PIE);
        imagefilledarc($eksempel, 50, $i, 100, 50, $gradtall,  360, $darkyellow, IMG_ARC_PIE);
    }

imagefilledarc($eksempel, 50, 50, 100, 50, 0, $gradtall, $green, IMG_ARC_PIE);
imagefilledarc($eksempel, 50, 50, 100, 50, $gradtall, 360 , $yellow, IMG_ARC_PIE);

//imagefilledarc ( ressurs , X-koordinat , Y-koordinat , diameter , radius , start gradtall , slutt gradtall , farge  , stil )
// X-koordinat må være halvparten av av imagecreatetruecolor X-koordinat
//Y-koordinat må være halvparten av imagecreatertruecolor Y-koordinat
//Om sektordiagram skal være harmonisk plassert midt i bildet. 
//imagecreatetruecolor(X-koordinat, Y-koordinat);

//Flush bildet (send det til skjerm).
header('Content-type: image/png');
imagepng($eksempel);
imagedestroy($eksempel);
?> 