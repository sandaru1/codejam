<?php

  $languages = array(
          'C' => '/\.c$/i',
          'C++' => '/\.cpp$|\.cc$|\.cxx$/i',
          'Python' => '/\.py$/i',
          'C#' => '/\.cs$/i',
          'Java' => '/\.java$/i',
          'Perl' => '/\.pl$/i',
          'Ruby' => '/\.rb$/i',
          'PHP' => '/\.php$/i',
          'Javascript' => '/\.js$/i',
          'VB' => '/\.vb$/i',
          'Pascal' => '/\.pas$/i',
          'Haskell' => '/\.hs$/i',
          'Lua' => '/\.lua$/i',
          'Matlab' => '/\.m$/i',
          'Groovy' => '/\.groovy$/i',
          'Shell Script' => '/\.sh$/i'
          );

  $files = glob("code/*_0_0.zip");
  foreach($files as $file) {
    $za = new ZipArchive();

    $all = array();
    $za->open($file);
    for ($i=0; $i<$za->numFiles;$i++) {
        $f = $za->statIndex($i);
        $all[] = $f['name'];
    }
    $za->close();
    
    $lang = "unknown";
    foreach($all as $f) {
      foreach($languages as $l => $r) {
        if (preg_match($r,$f)!=0) {
          $lang = $l; break;
        }
      }
      if ($lang!="unknown") break;
    }
    if ($lang=="unknown") {
      print_r($all);
    }
    if (!isset($count[$lang]))
      $count[$lang] = 0;
    $count[$lang]++;
  }
  
  foreach($count as $lang => $count) {
    echo "$lang\t$count\n";
  }
  
?>
