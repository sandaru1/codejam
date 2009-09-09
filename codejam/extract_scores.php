<?php
//  $countries = array();
//  $pass = array();

  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("codejam", $conn);
  
  $round = 1; // DB value for Qualification Round
  $q = 6;

  for($i=0;$i<=430;$i++) {
    $content = file_get_contents("json/data".$i);
    $arr = json_decode($content);
    foreach($arr->rows as $row) {
      mysql_query("INSERT INTO user(handle,country) VALUES('".$row->n."','".$row->c."')", $conn);
      $user = mysql_insert_id($conn);
      mysql_query("INSERT INTO rank(user,round,rank,points) VALUES('".$user."',1,'".$row->r."','".$row->pts."')", $conn);
      for($k=0;$k<$q;$k++) {
        mysql_query("INSERT INTO score(user,round,question,time,tries) VALUES('".$user."',1,$k,'".$row->ss[$k]."','".$row->att[$k]."')", $conn);
      }

      //echo $row->n.",".$row->c."\n";
/*      $c = $row->c;
      if (isset($countries[$c])) {
        $countries[$c]++;
      } else {
        $countries[$c] = 1;
      }
      if (!isset($pass[$c]))
        $pass[$c] = 0;
      if ($row->pts>=33) {
        $pass[$c]++;
      }*/
    }
  }
/*  asort($countries);
  foreach($countries as $country => $count) {
    echo "$country\t$count({$pass[$country]})\n";
  }*/
?>
