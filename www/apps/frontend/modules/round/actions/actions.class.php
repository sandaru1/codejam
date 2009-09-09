<?php

/**
 * round actions.
 *
 * @package    sf_sandbox
 * @subpackage round
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class roundActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->rounds = Doctrine::getTable('Competition')->createQuery()->execute();

    $appapikey = sfConfig::get("app_facebook_api_key");
    $appsecret = sfConfig::get("app_facebook_api_secret");
    $facebook = new Facebook($appapikey, $appsecret);
    $facebook->require_frame();
    $user_id = $facebook->require_login();
    
    //$user_id = "1076694583";
    
    $this->getUser()->setAttribute('user_id',$user_id);
    
    $this->user = Doctrine::getTable('User')->getFBUser($user_id);
  }
  
  public function executeRegister(sfWebRequest $request)
  {
    $handle = $request->getParameter('handle');
    $user = Doctrine::getTable('User')->createQuery()->where('handle COLLATE latin1_bin = ?',$handle)->fetchOne();
    if ($user!=null) {
  	  if($user->getFb() == null) {
        $user->setFb($this->getUser()->getAttribute('user_id'));
        try {
          $user->save();
        } catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        $this->redirect('round/index');
      }
    }
  }

  public function executeRegisterTc(sfWebRequest $request)
  {
    $handle = $request->getParameter('handle');
    $user = Doctrine::getTable('User')->createQuery()->where('fb = ?',$this->getUser()->getAttribute('user_id'))->fetchOne();
    if ($user!=null) {
      $tc_info = json_decode(file_get_contents("http://www.sandaru1.com/tc_api.php?handle=".$handle));
      if (isset($tc_info->handle)) {
        $user->setTc($tc_info->id);
        $user->setTcHandle($tc_info->handle);
        $user->setTcRating($tc_info->rating);
        $user->save();
      }
    }
    $this->redirect('round/index');
  }
  
  public function executeVote(sfWebRequest $request)
  {
    $handle = $request->getParameter('handle');
    $user_voted = Doctrine::getTable('User')->createQuery()->where('handle COLLATE latin1_bin = ?',$handle)->fetchOne();
    $user = Doctrine::getTable('User')->createQuery()->where('fb = ?',$this->getUser()->getAttribute('user_id'))->fetchOne();
    
    if ($user!=null && $user_voted != null) {
      $user->setVoted($handle);
      $user->save();

  	  $votes = $user_voted->getVotes();
  	  if($votes == null) {
  	    $votes = 0;
  	  }
	  
  	  $votes++;
      $user_voted->setVotes($votes);
      $user_voted->save();
    }
    $this->redirect('round/index');
  }
  
  public function executeInvite($request) {
    $appapikey = sfConfig::get("app_facebook_api_key");
    $appsecret = sfConfig::get("app_facebook_api_secret");
    $this->facebook = new Facebook($appapikey, $appsecret);
    $this->facebook->require_frame();
    $this->user_id = $this->facebook->require_login();
  }
}
