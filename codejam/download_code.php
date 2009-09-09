<?php
  $countries = array();
  $pass = array();
  for($i=0;$i<=430;$i++) {
    $content = file_get_contents("json/data".$i);
    $arr = json_decode($content);
    foreach($arr->rows as $row) {
      $user = $row->n;
      $ss = $row->ss;
      if ($ss[0]!=-1) {
        $file = "code/{$user}_0_0.zip";
        echo "wget 'http://code.google.com/codejam/contest/scoreboard/do?cmd=GetSourceCode&contest=90101&problem=116101&io_set_id=0&username=$user' -O '$file' &\n";
      }
    }
  }
?>
