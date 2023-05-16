<?php 
header('Content-disposition: attachment; filename=exportStopsNoSignal.json');
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);
$time_start = microtime(true);

$All = [];

$dato = $_GET['i'];
$link       = 'https://mapaton.org/manage_img/dbConnectPoss.php?i='.$dato;
$jsonData   = file_get_contents($link);

//echo $jsonData;

$dom = new DOMDocument;
$dom->loadHTML($jsonData);

$tables = $dom->getElementsByTagName('table');
$tr     = $dom->getElementsByTagName('tr'); 

foreach ($tr as $element1) {        
    for ($i = 0; $i < count($element1); $i++) {

        //Not able to fetch the user's link :(

  
        $name       = $element1->getElementsByTagName('td')->item(0)->textContent;                  // To fetch name
        $height     = $element1->getElementsByTagName('td')->item(1)->textContent;                  // To fetch height
        $weight     = $element1->getElementsByTagName('td')->item(2)->textContent;                  // To fetch weight
        $date       = $element1->getElementsByTagName('td')->item(3)->textContent;                  // To fetch date
        $info       = $element1->getElementsByTagName('td')->item(4)->textContent;                  // To fetch info


        array_push($All, array(
            "codigo" => $name,
            "ruta"      => $height,
            "imagen"    => $weight,
            "lat"    => $date,
            "lng"      => $info
        ));
    }
}

echo json_encode($All, JSON_PRETTY_PRINT);

?>