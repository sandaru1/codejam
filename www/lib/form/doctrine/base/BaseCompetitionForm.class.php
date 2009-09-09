<?php

/**
 * Competition form base class.
 *
 * @package    form
 * @subpackage competition
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseCompetitionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInput(),
      'questions' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'Competition', 'column' => 'id', 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'questions' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('competition[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Competition';
  }

}