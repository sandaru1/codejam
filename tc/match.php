<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("codejam", $conn);
  $res = mysql_query("SELECT id,handle FROM user ORDER BY handle ASC", $conn);
  $users = array();
  while ($row = mysql_fetch_assoc($res)) {
    $users[$row['handle']] = $row['id'];
  }
  ksort($users);
  $tc = file('coders',FILE_IGNORE_NEW_LINES);
  sort($tc);
  $tc_pos = 0;
  foreach($users as $user => $id) {
    while ($tc[$tc_pos]<$user && $tc_pos<count($tc))
      $tc_pos++;
    $x = split(' - ',$tc[$tc_pos]);
    if ($user==$x[0]) {
      mysql_query("UPDATE user SET tc={$x[2]}, tc_handle='{$x[0]}', tc_rating={$x[1]} WHERE id=$id",$conn);
    }
  }
?>

