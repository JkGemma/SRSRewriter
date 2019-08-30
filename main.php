<?php

// Flayac Quentin - quentin.flayac@epitech.eu
// 29/08/19 v2
// PHP Homemade Script to Transform GML SRS

include('class.php');
$shortopt = "f::F::s:ch";
$longopt = ["file::", "Folder::", "srs:", "check", "help"];
$opts = getopt($shortopt, $longopt);
$end = array_pop($argv);
$opts["FoF"] = isFileorFolder($end);

function main($opts) {
  if(isset($opts['h']) || isset($opts["help"])) {
    SRSReader::SRSMan();
  } else {
    SRSReader::doThis($opts);
  }
}

function isFileOrFolder($end) {
  if(is_dir($end)) {
    return array('folder', $end);
  }
  if(is_file($end)) {
    return array('file', $end);
  }
}


main($opts);
