<ul>
<?php
  foreach($rounds as $round) {
?>
    <li><?php echo link_to($round->getName(),'scores/index?round='.$round->getId()); ?></li>
<?
  }
?>
</ul>
<?php
  if ($user==null) {
?>
Enter your codejam username so that it can be linked with your name.<br/>
<fb:editor action="<?php echo url_for('round/register'); ?>"> 
<fb:editor-text label="Handle" name="handle"/> 
<fb:editor-buttonset>
  <fb:editor-button value="Save"/>
</fb:editor-buttonset>
</fb:editor>
<?php
  } else {
?>
  Your Codejam Handle : <?php echo $user->getHandle(); ?>
  <?php
    if ($user->getTc()==null) {
  ?>
    <fb:editor action="<?php echo url_for('round/registerTc'); ?>"> 
      <fb:editor-text label="TC Handle" name="handle"/> 
      <fb:editor-buttonset>
        <fb:editor-button value="Save"/>
      </fb:editor-buttonset>
    </fb:editor>
  <?php
    } else {
  ?>
    <br/>TC Handle : <?php echo $user->getTcHandle(); ?>
  <?
    }
  ?>
 
  <?php if($user->getVotes() != null) { ?>
    <br /><b><?php echo $user->getVotes(); ?></b> competitor<?php echo ($user->getVotes()>1?"s are":" is"); ?> counting on you to win :)
  <?php } ?>
  
  <p>
  <i>(Voting/Betting will be improved to support several users.)</i>
  </p>
  <?php if($user->getVoted() == null) { ?>
    <fb:explanation message="Who would win codejam?">
        <fb:editor action="<?php echo url_for('round/vote'); ?>"> 
          <fb:editor-text label="Codejam Handle" name="handle"/> 
          <fb:editor-buttonset>
            <fb:editor-button value="Save"/>
          </fb:editor-buttonset>
        </fb:editor>
    </fb:explanation>
  <?php } else { ?>
    You think <b><?php echo $user->getVoted(); ?></b> would win codejam.
  <?php } ?>
<?php
  }
?>
<p/>

