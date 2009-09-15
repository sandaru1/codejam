<?php

/**
 * scores actions.
 *
 * @package    sf_sandbox
 * @subpackage scores
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class scoresActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($request->hasParameter('round'));
    $this->round = $request->getParameter('round');
    $competition = Doctrine::getTable('Competition')->find($this->round);
    
    $this->form = new FilterForm(array(),array('questions' => $competition->getQuestions(),'competition' => $this->round));
    $this->form->bind($request->getParameter($this->form->getName()));
    
    $size = $this->form->getValue('results');
    if ($size=="")
      $size = 50;
    
    $this->pager = new sfDoctrinePager('Rank',$size);
    $this->pager->setQuery($competition->getRanksQuery($this->form));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $query = $_SERVER['QUERY_STRING'];
    $this->query = preg_replace("/page=.*/","",$query);
  }
}
