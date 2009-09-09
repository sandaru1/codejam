<?php
$xml = simplexml_load_file("tc.xml");

foreach($xml->children() as $child)
  {
  echo $child->handle." - ".$child->alg_rating." - ".$child->coder_id. "\n";
  }
?> 

