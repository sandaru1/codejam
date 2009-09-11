<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("codejam", $conn);
  $res = mysql_query("SELECT id,tc FROM user WHERE tc_handle IS NOT NULL", $conn);
  $users = array();
  while ($row = mysql_fetch_assoc($res)) {
    $users[$row['tc']] = $row['id'];
  }
  $tc = file('coders',FILE_IGNORE_NEW_LINES);
  foreach($tc as $line) {
    $x = split(' - ',$line);
    if (isset($users[$x[2]])) {
      mysql_query("UPDATE user SET tc_rating={$x[1]} WHERE id=".$users[$x[2]],$conn);
    }
  }
?>

