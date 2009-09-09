<?php
if(isset($_GET['first'])) {
  $fql = 'SELECT uid FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1='.$user_id.') AND is_app_user = 1';
  $_friends = $facebook->api_client->fql_query($fql);

  // Extract the user ID's returned in the FQL request into a new array.
  $friends = array();

  if (is_array($_friends) && count($_friends)) {
    foreach ($_friends as $friend) { $friends[] = $friend['uid']; } }

  // Convert the array of friends into a comma-delimeted string.
  $friends = implode(',', $friends);

  // Prepare the invitation text that all invited users will receive.
  $content = "<fb:name uid=\"".$user_id."\" /> has invited you to use <a href=\"http://apps.facebook.com/thecodejam/\">Codejam</a>!\n";
  $content .= "<fb:req-choice url=\"".$facebook->get_add_url()."\" label=\"Add Codejam to your profile\"/>";
?>
  <fb:request-form action="invite" method="post" type="Codejam" content="<? echo htmlentities($content); ?>">
    <fb:multi-friend-selector actiontext="These poor lads still don't use this great app. Invite em all ;)" exclude_ids="<? echo $friends; ?>" />
  </fb:request-form>
<?
} else {
?>
<fb:redirect url="http://apps.facebook.com/thecodejam/" />
<?
}
?>
