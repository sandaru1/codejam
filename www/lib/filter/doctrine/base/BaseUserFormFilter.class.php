<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * User filter form base class.
 *
 * @package    filters
 * @subpackage User *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'handle'    => new sfWidgetFormFilterInput(),
      'country'   => new sfWidgetFormFilterInput(),
      'fb'        => new sfWidgetFormFilterInput(),
      'tc'        => new sfWidgetFormFilterInput(),
      'tc_handle' => new sfWidgetFormFilterInput(),
      'tc_rating' => new sfWidgetFormFilterInput(),
      'votes'     => new sfWidgetFormFilterInput(),
      'voted'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'handle'    => new sfValidatorPass(array('required' => false)),
      'country'   => new sfValidatorPass(array('required' => false)),
      'fb'        => new sfValidatorPass(array('required' => false)),
      'tc'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tc_handle' => new sfValidatorPass(array('required' => false)),
      'tc_rating' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'votes'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voted'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'handle'    => 'Text',
      'country'   => 'Text',
      'fb'        => 'Text',
      'tc'        => 'Number',
      'tc_handle' => 'Text',
      'tc_rating' => 'Number',
      'votes'     => 'Number',
      'voted'     => 'Text',
    );
  }
}