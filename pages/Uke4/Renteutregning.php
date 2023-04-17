<?php
#initialisering.
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
#echo $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
$webside = '
	<div id="overskrift">Rentes rente beregning.</div>
	<form action = "" method = "POST">
	<p>Startsum<input type="text" name="startsum" size="20"></input></p>
	<p>Rente, årlig<input type="text" name="rente" size="20"></input></p>
	<p><input type="submit" name="knapp" value="Send"></input>
	</form>';


#beregning
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	#echo 'Start';
	$startsumInn = $_POST['startsum'];
	$renteInn = $_POST['rente'];

	$startsum = floatval($startsumInn);
	$rentesats = floatval($renteInn);
	$terminsum = array();
	$renteliste = array();

	if ($startsum <= 0 || $rentesats == 0) {
		#skriv errormelding.
		echo 'error';
	} elseif ($startsum > 0 and $rentesats != 0) {
		$sluttsum = ($startsum * 2);

		while ($startsum <= $sluttsum) {
			$rente = (($startsum / 100) * $rentesats);
			$startsum = $startsum + $rente;
			array_push($terminsum, $startsum);
			array_push($renteliste, $rente);
		}
		//write to file
		WriteCSVFile('rente.csv', array($terminsum, $renteliste));
		
	}
}
#visWebside
print "<html><head><link rel='stylesheet' href='../../style.css" . "'></head><body>";
print $webside;
print '</body></html>';
?>