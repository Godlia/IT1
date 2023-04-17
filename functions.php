<?
print_r("<script>console.log('functions loaded')</script>");
$fileextensions = array("php", "html", "css", "jpg", "pdf", "png", "txt", "py", "js");

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}


function WriteCSVFile($filename, $array)
{
    $fp = fopen($filename, 'w');
    //if $array is multidimensional array, make each array a line in the csv file
    if (is_array($array[0])) {
        //array is multidimensional
        //go through param $array and extract internal arrays
        foreach ($array as $valArray) {
            //use internal arrays that contain values and print them into file
            foreach ($valArray as $value) {
                fwrite($fp, $value . ",");
            }
            //new line when done with a internal array
            fwrite($fp, PHP_EOL);
        }
    } else if (!is_array($array[0])) {
        //array is onedimensional
            //write values into file
            foreach ($array as $value) {
                fwrite($fp, $value . ",");
            }
            fwrite($fp, PHP_EOL);
    }
    fclose($fp);
    echo '<script>console.log("Array written to: ' . $filename . '")</script>';
}

function AppendToCSVFile($filename, $array) {
    $handle = fopen($filename, 'a');
    fputcsv($handle, $array);
    fclose($handle);
}

//read csv file and return array
function ReadCSVFile($filename, $delimiter = ',')
{
    echo '<script>console.log("Reading file: ' . $filename . '")</script>';
    //check if $filename is a file
    if (!is_file($filename)) {
        $file_to_read = fopen($filename, 'r');
    } else {
        $file_to_read = $filename;
    }

    while (!feof($file_to_read) ) {

        $lines[] = fgetcsv($file_to_read, 1000, $delimiter);
        
    }

    fclose($file_to_read);

    return $lines;

}

//take inn array and make it into an object
function arrayToObject($array)
{
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = arrayToObject($value);
        }
        $object->$key = $value;
    }
    return $object;
}

//take inn object and and make json file
function objectToJsonFile($object, $filename)
{
    $json = json_encode($object);
    file_put_contents($filename, $json);
}

//append object to json file
function appendObjectToJsonFile($object, $filename)
{
    $json = json_encode($object);
    file_put_contents($filename, $json, FILE_APPEND);
}


function objectToArray($object)
{
    $array = json_decode(json_encode($object), true);
    return $array;
}



function CalculateEnergy($lengde, $temperatur, $dusjhode) {
    $dusjhode == 'spare' ? $literperminutt = 8 : $literperminutt = 16;
    $litervannbrukt = $literperminutt * $lengde;
    $deltaOppvarming = $temperatur - 5;
    $oppvarmingkalorier = $litervannbrukt * $deltaOppvarming;

    //oppvarmingskalorier til joule
    $oppvarmingjoule = $oppvarmingkalorier * 4184;

    //oppvarmingsjoule til watttimer
    $oppvarmingwatthour = $oppvarmingjoule / 3600;

    $output = new stdClass();
    $output->timestamp = date("H:i:s");
    $output->lengde = $lengde;
    $output->temperatur = $temperatur;
    $output->dusjhode = $dusjhode;
    $output->literperminutt = $literperminutt;
    $output->litervannbrukt = $litervannbrukt;
    $output->deltaOppvarming = $deltaOppvarming;
    $output->oppvarmingkalorier = $oppvarmingkalorier;
    $output->oppvarmingKiloJoule = $oppvarmingjoule / 1000;
    $output->oppvarmingwatthour = $oppvarmingwatthour;

    
    return $output;
}
