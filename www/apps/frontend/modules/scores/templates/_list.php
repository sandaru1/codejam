<link rel="stylesheet" type="text/css" media="screen" href="<?php echo public_path('css/main.css',true); ?>?ts=<?php echo filemtime(sfConfig::get('sf_root_dir').'/web/css/main.css'); ?>" />
<table class="scoreboard" cellpadding="0" cellmargin="0">
  <tr class="header">
    <th>rank</th>
    <th>handle</th>
    <th>name</th>
    <th>country</th>
    <th>score</th>
    <th colspan="2">Problem A</th>
    <th colspan="2">Problem B</th>
    <th colspan="2">Problem C</th>
  </tr>
  <?php foreach ($ranks as $i => $rank): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td>
        <?php echo $rank->getRank(); ?>
      </td>
      <td>
        <?php echo $rank->getUser()->getHandleFormatted(); ?>
      </td>
      <td>
        <?php
          if ($rank->getUser()->getFb()!=null) {
        ?>
          <fb:name uid="<?php echo $rank->getUser()->getFb(); ?>" useyou="false" />
        <?php
          } else echo "&nbsp;";
        ?>
      </td>
      <td>
        <?php echo $rank->getUser()->getCountry(); ?>
      </td>
      <td>
        <?php echo $rank->getPoints(); ?>
        <?php echo $rank->getUser()->getFormattedVotes(); ?>
      </td>
      <?php
        $scores = $rank->getScores();
        foreach($scores as $score) {
          ?>
            <td><?php echo $score->getFormatedTime(); ?></td>
          <?php
        }
      ?>
    </tr>
  <?php endforeach; ?>
</table>
