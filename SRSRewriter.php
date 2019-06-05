<?php

// --------------------------
// Flayac Quentin 22.11.18
// --------------------------

function SRSRewriter($argv){
  if(isset($argv)){
    // recursive folder
    if($argv[1] === "-r"){
      // basefolder -> filename (//countable)
      $folder = scandir($argv[2]);
      // 587
      for($i = 0; $i < count($folder); $i++) {
        $extension = explode(".", $folder[$i]);
        $extPlacement = count($extension);
        if($extension[$extPlacement - 1] === "gml") {
          // basefile content in an array, exploded with \n
          $array = explode("\n", file_get_contents($argv[2]."/".$folder[$i]));
          // basefile name
          $filename = explode("/", $folder[$i]);
          // argv 3 = dimension -- argv 4 === EPSG
          for($i = 0; $i < count($array); $i++) {
            $srsReplace = "srsDimension=\"".$argv[3]."\"";
            $srsUpdate = "srsName=\"EPSG:".$argv[4]."\" srsDimension=\"".$argv[3]."\"";
            $array[$i] = str_replace($srsReplace, $srsUpdate, $array[$i]);
          }
          // create a new File with modification
          file_put_contents(__DIR__."/rewrited/rewrited_".$filename[count($filename) - 1], implode("\n", $array));
        }
      }
    }
    else {
      // basefile content in an array, exploded with \n
      $array = explode("\n", file_get_contents($argv[1]));
      // basefile name
      $filename = explode("/", $argv[1]);
      // argv 2 = dimension -- argv 3 === epsg
      for($i = 0; $i < count($array); $i++) {
        $srsReplace = "srsDimension=\"".$argv[2]."\"";
        $srsUpdate = "srsName=\"EPSG:".$argv[3]."\" srsDimension=\"".$argv[2]."\"";
        $array[$i] = str_replace($srsReplace, $srsUpdate, $array[$i]);
      }
      // create a new File with modification
      file_put_contents(__DIR__."/rewrited/rewrited_".$filename[count($filename) - 1], implode("\n", $array));
    }
  }
}
SRSRewriter($argv);
