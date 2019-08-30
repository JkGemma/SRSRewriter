<?php

// Flayac Quentin - quentin.flayac@epitech.eu
// 29/08/19 v2
// PHP Homemade Script to Transform GML SRS

class SRSReader {
  public function logger() {
    $args = func_get_args();
    fwrite(STDOUT, implode(" ", $args) . "\n");
    return;
  }
  
  public static function doThis($opts) {
    if((isset($opts["F"]) || isset($opts["Folder"])) && $opts["FoF"][0] === 'folder') {
      self::logger("\nStarting folderRewrite...");
      self::folderRewrite($opts);
      self::logger("Done");
    }
    elseif((isset($opts["f"]) || isset($opts["file"])) && $opts["FoF"][0] === 'file') {
      self::logger("\nStarting fileRewrite...");
      self::fileRewrite($opts);
      self::logger("Done");
    }
    elseif((isset($opts["c"]) || isset($opts["check"])) && $opts["FoF"][0] === 'file') {
      self::logger("\nStarting SRS Checker...");
      self::checkSRS($opts);
      self::logger("Done");
    }
    else {
      self::logger("Exit. Invalid Arguments. -h or --help");
    }
  }
  public function SRSMan(){
        echo"\nSRSRewriter(1)         User Commands         SRSRewriter(1)\n
    \nMAINTAINER
            Flayac Quentin - quentin.flayac@epitech.eu
    \nNAME
            SRSRewriter – PHP Tool to Edit / Check CityGML Files
    \nSYNOPSIS
            SRSRewriter [OPTIONS]... FILE/FOLDER
    \nEXAMPLE
            php main.php -h
            php main.php -F -s=3946 /home/CityGMLFolder/
            php main.php -f -s=3946 /home/CityGMLFolder/citygml.gml
            php main.php -c /home/CityGMLFolder/citygml.gml

    \nDESCRIPTION
            This tool was made in order to add the property 'srsName' to cityGML
            files node. Since the v2 he is able to check all node who contain
            'srsDimension' and display them.

            -f, --file
                Look into the cityGML files passed as arguement.
            -F, --Folder
                Look for cityGML files into the folder passed as arguement.
                /!\ It doesn't watch in subdirectories /!\
            -s, --srs = STRING with INTEGER srsName
                Add the srsName on each node with srsDimension=\"3\"
            -c, --check /!\ Only with single file /!\
                Check all gml:envelope node of the file.

    \nBONUS COMMANDS
            -h, --help=HELP
            Open the Manual.\n\n";
  }
  public function folderRewrite($opts) {
    // basefolder -> filename (//countable)
    $files = scandir($opts["FoF"][1]);
    // 587
    for($i = 0; $i < count($files); $i++) {
      $extension = explode(".", $files[$i]);
      $extPlacement = count($extension);
      if($extension[$extPlacement - 1] === "gml") {
        // basefile content in an array, exploded with \n
        $array = explode("\n", file_get_contents($opts["FoF"][1]."/".$files[$i]));
        // basefile name
        $filename = explode("/", $files[$i]);
        $content = isset($opts['F']) ? $test = $opts['F'] : $test = $opts['Folder'];
        for($y = 0; $y < count($array); $y++) {
          $srsReplace = "srsDimension=\"3\"";
          $srsUpdate = "srsName=\"EPSG:".$content."\" srsDimension=\"3\"";
          $array[$y] = str_replace($srsReplace, $srsUpdate, $array[$y]);
        }
        // create a new File with modification
        self::logger("File saved at: " . __DIR__."/rewrited/rewrited_".$filename[count($filename) - 1]);
        file_put_contents(__DIR__."/rewrited/rewrited_".$filename[count($filename) - 1], implode("\n", $array));
      }
    }
    return;
  }
  public function fileRewrite($opts) {
    // basefile content in an array, exploded with \n
    $array = explode("\n", file_get_contents($opts["FoF"][1]));
    // basefile name
    $filename = explode("/", $opts["FoF"][1]);
    $content = isset($opts['f']) ? $test = $opts['f'] : $test = $opts['file'];
    for($i = 0; $i < count($array); $i++) {
      $srsReplace = "srsDimension=\"3\"";
      $srsUpdate = "srsName=\"EPSG:".$content."\" srsDimension=\"3\"";
      $array[$i] = str_replace($srsReplace, $srsUpdate, $array[$i]);
    }
    // create a new File with modification
    self::logger("File saved at: " . __DIR__."/rewrited/rewrited_".$filename[count($filename) - 1]);
    file_put_contents(__DIR__."/rewrited/rewrited_".$filename[count($filename) - 1], implode("\n", $array));
    return;
  }
  function checkSRS($opts) {
    $array = explode("\n", file_get_contents($opts["FoF"][1]));
    $search = 'srsDimension';
    for($i = 0; $i < count($array); $i++) {
      if(strpos($array[$i], $search) !== false) {
        echo "l." . $i . ": " . $array[$i] . "\n";
      }
    }
  }
}
