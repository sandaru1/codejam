<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("tc", $conn);
  $res = mysql_query("SELECT handle FROM user", $conn);
  $users = array();
  while ($row = mysql_fetch_assoc($res)) {
    $users[$row['handle']] = true;
  }
  
  $xml = simplexml_load_file("tc.xml");

  foreach($xml->children() as $child)
  {
    if (!isset($users[(string)$child->handle]))
      mysql_query("INSERT INTO user VALUES('".$child->coder_id."','".$child->handle."','".$child->alg_rating."')",$conn);
  }
?> 

