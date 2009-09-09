<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("codejam", $conn);

  $res = mysql_query("SELECT id,handle FROM user ORDER BY handle ASC", $conn);
  $users = array();
  while ($row = mysql_fetch_assoc($res)) {
    $users[$row['handle']] = $row['id'];
  }
  
  $submissions = file('submissions',FILE_IGNORE_NEW_LINES);
  $i = 0;
  foreach($submissions as $submission) {
    $data = split("\|",$submission);
    $q = "UPDATE score SET score.lang='".$data[5]."' WHERE score.user_id=".$users[$data[0]]." AND competition_id=1 AND question=".($data[3]-1);
    mysql_query($q, $conn);
    $i++;
    if (($i%1000)==0)
      echo $i."\n";
  }
?>
