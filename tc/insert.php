<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("tc", $conn);
  
  $xml = simplexml_load_file("tc.xml");

  foreach($xml->children() as $child)
  {
    mysql_query("INSERT INTO user VALUES('".$child->coder_id."','".$child->handle."','".$child->alg_rating."')",$conn);
  }
?> 

