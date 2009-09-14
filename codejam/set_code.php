<?php
  $conn = mysql_connect("localhost", "root", "test");
  mysql_select_db("codejam", $conn);

  $res = mysql_query("SELECT id,handle FROM user ORDER BY handle ASC", $conn);
  $users = array();
  while ($row = mysql_fetch_assoc($res)) {
    $users[$row['handle']] = $row['id'];
  }
  
  function update($submissions,$round) {
    global $conn;
    global $users;
    echo "Round -- $round\n";
    $i = 0;
    foreach($submissions as $submission) {
      $data = split("\|",$submission);
      $q = "UPDATE score SET score.lang='".$data[5]."' WHERE score.user_id=".$users[$data[0]]." AND competition_id=2 AND question=".($data[3]-1);
      mysql_query($q, $conn);
      $i++;
      if (($i%1000)==0)
        echo $i."\n";
    }
  }
  
  $r1a = file('round1a',FILE_IGNORE_NEW_LINES);
  $r1b = file('round1b',FILE_IGNORE_NEW_LINES);
  $r1c = file('round1c',FILE_IGNORE_NEW_LINES);
  update($r1a,2);
  update($r1b,3);
  update($r1c,4);
  
  /*
    SQL UPDATES - too lazy to add this into code now, later
    UPDATE score SET lang='CPP' WHERE lang='C++';
    UPDATE score SET lang='CSharp' WHERE lang='C#';
    UPDATE score SET lang='Unknown' WHERE lang='?';
    UPDATE score SET lang='FSharp' WHERE lang='F#';    
  */
?>
