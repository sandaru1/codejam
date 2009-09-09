<?php
  if (!isset($_GET['handle']))
    die("handle is required");
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("tc", $conn);
  $q = sprintf("SELECT * FROM user WHERE handle='%s'",mysql_real_escape_string($_GET['handle']));
  $res = mysql_query($q, $conn);
  while ($row = mysql_fetch_assoc($res)) {
    // can't be bothered to make mysql case sensitive
    if ($row['handle']==$_GET['handle']) {
      echo json_encode($row);
      exit();
    }
  }
?>

