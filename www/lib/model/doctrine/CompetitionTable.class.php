<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CompetitionTable extends Doctrine_Table
{
  public function getCountries($round)
  {
    $query = Doctrine_Query::create()
              ->from('Rank r, r.User u')->select('r.competition_id,u.country,count(*) as c')
              ->andWhere('r.competition_id = ?',$round);
    $arr = $query->groupBy('u.country')->fetchArray();
    $countries = array('' => 'Any');
    foreach($arr as $u) {
      $user = $u['User'];
      $countries[$user['country']] = $user['country'].' ('.$u['c'].')';
    }
    return $countries;
  }
}
