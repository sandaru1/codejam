<?php

/**
 * User form base class.
 *
 * @package    form
 * @subpackage user
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'handle'    => new sfWidgetFormInput(),
      'country'   => new sfWidgetFormInput(),
      'fb'        => new sfWidgetFormInput(),
      'tc'        => new sfWidgetFormInput(),
      'tc_handle' => new sfWidgetFormInput(),
      'tc_rating' => new sfWidgetFormInput(),
      'votes'     => new sfWidgetFormInput(),
      'voted'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'handle'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'country'   => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'fb'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'tc'        => new sfValidatorInteger(array('required' => false)),
      'tc_handle' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'tc_rating' => new sfValidatorInteger(array('required' => false)),
      'votes'     => new sfValidatorInteger(array('required' => false)),
      'voted'     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}