<?php

class SRSReader {
  public function logger() {
    $args = func_get_args();
    fwrite(STDOUT, implode(" ", $args) . "\n");
    return;
  }

  // public static function my_option($opts){
  //       if(is_dir($opts["folder"])){
  //           if(isset($opts["r"]) || isset($opts["recursive"])){
  //               self::my_recursive($opts["folder"], $size);
  //           }
  //           else{
  //               $size = array();
  //               foreach(glob($opts["folder"]."/"."*.png") as $val){
  //                   $size[] = $val;
  //               }
  //           }
  //           $infopen = finfo_open(FILEINFO_MIME_TYPE);
  //           foreach($size as $val){
  //               if(finfo_file($infopen, $val) == "image/png"){
  //                   $list[] = $val;
  //               }
  //           }
  //           finfo_close($infopen);
  //           self::my_imsize($opts, $list);
  //       }
  //       elseif($opts["folder"] == "css_generator.php"){
  //           echo "Ceci n'est pas un dossier. Si vous avez besoin d'aide, merci d'utiliser la commande  --help\n";
  //       }
  //       else{
  //           echo "Ceci n'est pas un dossier valide. Si vous avez besoin d'aide, merci d'utiliser la commande --help\n";
  //       }
  //   }



  public static function doThis($opts) {
    var_dump($opts);
    // if(isset($argv)) {
    //   // recursive folder
    //   if($argv[1] === "-r") {
    //     logger("\nStarting Recursive Rewrite...");
    //     recursiveRewrite($argv);
    //     logger("Done.");
    //   }
    //   elseif($argv[1] === ("-c" || "--check")) {
    //     logger("LOL");
    //   }
    //   else {
    //     logger("\nStarting...");
    //     baseRewrite($argv);
    //     logger("Done.");
    //   }
    // }
  }

  function recursiveRewrite($argv) {
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
        // argv 3 = dimension -- argv 4 === epsg
        for($y = 0; $y < count($array); $y++) {
          $srsReplace = "srsDimension=\"".$argv[3]."\"";
          $srsUpdate = "srsName=\"EPSG:".$argv[4]."\" srsDimension=\"".$argv[3]."\"";
          $array[$y] = str_replace($srsReplace, $srsUpdate, $array[$y]);
        }
        // create a new File with modification
        logger("File saved at: " . __DIR__."/rewrited/rewrited_".$filename[count($filename) - 1]);
        file_put_contents(__DIR__."/rewrited/rewrited_".$filename[count($filename) - 1], implode("\n", $array));
      }
    }
    return;
  }

  function baseRewrite($argv) {
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
    logger("File saved at: " . __DIR__."/rewrited/rewrited_".$filename[count($filename) - 1]);
    file_put_contents(__DIR__."/rewrited/rewrited_".$filename[count($filename) - 1], implode("\n", $array));
    return;
  }

  function checkSRS($argv) {

  }
}
