<form action="<?php echo url_for('scores/index'); ?>" method="GET">
<input type="hidden" name="round" value="<?php echo $round; ?>" />
<table>
<tr>
  <td>
    <?php
      $end = $form->getOption('questions');
      $mid = floor($end/2);
      for($i=0;$i<$mid;$i++) {
    ?>
        <?php echo $form['question_'.$i]; ?>
        <?php echo $form['question_'.$i]->renderLabel(); ?>
    <?php
      }
    ?>
  </td>
  <td><?php echo $form['handle']->renderLabel();?></td>
  <td><?php echo $form['handle']; ?></td>
  <td><?php echo $form['fb_users']; ?></td>
  <td><?php echo $form['fb_users']->renderLabel(); ?></td>
  <td rowspan="2" valign="middle">
    <input type="submit" value="Search" class="inputsubmit" />
  </td>
</tr>
<tr>
  <td>
    <?php
      for($i=$mid;$i<$end;$i++) {
    ?>
        <?php echo $form['question_'.$i]; ?>
        <?php echo $form['question_'.$i]->renderLabel(); ?>
    <?php
      }
    ?>
  </td>
  <td><?php echo $form['country']->renderLabel();?></td>
  <td><?php echo $form['country']; ?></td>
  <td></td>
  <td align="right"><?php echo $form['results']; ?></td>
</tr>
</table>
</form>
<?php 
  include_partial('scores/list', array('ranks' => $pager->getResults())) 
?>
 <p />
<div class="pager">
<?php if ($pager->haveToPaginate()): ?>
    <a href="<?php echo url_for('scores/index');echo "?$query"; ?>&page=1">&lt;&lt;</a>
    <a href="<?php echo url_for('scores/index');echo "?$query"; ?>&page=<?php echo $pager->getPreviousPage() ?>">&lt;</a>
 
    <?php foreach ($pager->getLinks(10) as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('scores/index');echo "?$query"; ?>&page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('scores/index');echo "?$query"; ?>&page=<?php echo $pager->getNextPage() ?>">&gt;</a>
    <a href="<?php echo url_for('scores/index');echo "?$query"; ?>&page=<?php echo $pager->getLastPage() ?>">&gt;&gt;</a>
<?php endif; ?>
  <span class="count">
  <strong><?php echo $pager->getNbResults() ?></strong> competitors found
 
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
  </span>
</div>
