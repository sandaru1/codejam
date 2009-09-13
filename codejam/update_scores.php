<?php
  // this script doesn't insert user data
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("codejam", $conn);
  
  $round = 3; // DB value for Qualification Round
  $q = 6;

  for($i=0;$i<=141;$i++) {
    $content = file_get_contents("json/data".$i);
    $arr = json_decode($content);
    foreach($arr->rows as $row) {
      $res = mysql_query("SELECT id FROM user WHERE handle COLLATE latin1_bin ='".$row->n."'", $conn);
      $user_row = mysql_fetch_assoc($res);
      $user = $user_row['id'];
      mysql_query("INSERT INTO rank(user_id,competition_id,rank,points) VALUES('".$user."',$round,'".$row->r."','".$row->pts."')", $conn);
      for($k=0;$k<$q;$k++) {
        mysql_query("INSERT INTO score(user_id,competition_id,question,time,tries,lang) VALUES('".$user."',$round,$k,'".$row->ss[$k]."','".$row->att[$k]."','Unknown')", $conn);
      }
    }
  }
?>
