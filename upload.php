<?php

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    return $length > 0 ? substr($haystack, -$length) === $needle : true;
}
// var_dump($_FILES);

// copy all upload files
$shp = '';
for ($i=0; $i < sizeof($_FILES['shp']['name']); $i++) {
  $filename = $_FILES['shp']['name'][$i];
  $tmpname = $_FILES['shp']['tmp_name'][$i];
  $location = './upload/' . $filename ;
  move_uploaded_file($tmpname, $location);

  // if ends with shp, keep location
  if (endsWith($filename, '.shp')) {
    $shp = $location;
  }
}

// Register autoloader
require_once('php-shapefile/src/Shapefile/ShapefileAutoloader.php');
Shapefile\ShapefileAutoloader::register();

// Import classes
use Shapefile\Shapefile;
use Shapefile\ShapefileException;
use Shapefile\ShapefileReader;

try {
    // Open Shapefile
    $Shapefile = new ShapefileReader($shp);
    
    // Read all the records
    while ($Geometry = $Shapefile->fetchRecord()) {
        // Skip the record if marked as "deleted"
        if ($Geometry->isDeleted()) {
            continue;
        }
        
         // Print Geometry as an Array
        //print_r($Geometry->getArray());
        
        // Print Geometry as WKT
        //print_r($Geometry->getWKT());
        
        // Print Geometry as GeoJSON
        print_r($Geometry->getGeoJSON());
        
        
        // Print DBF data
        //print_r($Geometry->getDataArray());
    }

} catch (ShapefileException $e) {
    // Print detailed error information
    echo "Error Type: " . $e->getErrorType()
        . "\nMessage: " . $e->getMessage()
        . "\nDetails: " . $e->getDetails();
}





?>