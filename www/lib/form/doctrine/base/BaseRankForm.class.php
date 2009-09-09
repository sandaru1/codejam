<?php

/**
 * Rank form base class.
 *
 * @package    form
 * @subpackage rank
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseRankForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormInputHidden(),
      'competition_id' => new sfWidgetFormInputHidden(),
      'rank'           => new sfWidgetFormInput(),
      'points'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => 'Rank', 'column' => 'user_id', 'required' => false)),
      'competition_id' => new sfValidatorDoctrineChoice(array('model' => 'Rank', 'column' => 'competition_id', 'required' => false)),
      'rank'           => new sfValidatorInteger(array('required' => false)),
      'points'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rank[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rank';
  }

}