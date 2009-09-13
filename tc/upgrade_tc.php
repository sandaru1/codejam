<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("tc", $conn);

  $res = mysql_query("SELECT id,handle,rating FROM user", $conn);
  $users = array();
  while ($row = mysql_fetch_assoc($res)) {
    $users[$row['handle']]['rating'] = $row['rating'];
    $users[$row['handle']]['id'] = $row['id'];
  }

  $tc = file('coders',FILE_IGNORE_NEW_LINES);
  foreach($tc as $line) {
    $x = split(' - ',$line);
    if ($users[$x[0]]['rating']!=$x[1])
      mysql_query("UPDATE user SET rating={$x[1]} WHERE id='".$users[$x[0]]['id']."'",$conn);
  }
?>

