<?php

/**
 * Score form base class.
 *
 * @package    form
 * @subpackage score
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseScoreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormInputHidden(),
      'competition_id' => new sfWidgetFormInputHidden(),
      'question'       => new sfWidgetFormInputHidden(),
      'time'           => new sfWidgetFormInput(),
      'tries'          => new sfWidgetFormInput(),
      'lang'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => 'Score', 'column' => 'user_id', 'required' => false)),
      'competition_id' => new sfValidatorDoctrineChoice(array('model' => 'Score', 'column' => 'competition_id', 'required' => false)),
      'question'       => new sfValidatorDoctrineChoice(array('model' => 'Score', 'column' => 'question', 'required' => false)),
      'time'           => new sfValidatorInteger(array('required' => false)),
      'tries'          => new sfValidatorInteger(array('required' => false)),
      'lang'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('score[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Score';
  }

}