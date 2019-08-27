<?php

include('class.php');

$shortopt = "r::c";
$longopt = ["recursive", "check"];
$opts = getopt($shortopt, $longopt);
$folder = array_pop($argv);
$opts["folder"] = $folder;

function main($opts) {
  SRSReader::doThis($opts);
}

main($opts);
