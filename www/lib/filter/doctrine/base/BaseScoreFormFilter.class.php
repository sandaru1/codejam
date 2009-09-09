<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Score filter form base class.
 *
 * @package    filters
 * @subpackage Score *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseScoreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'time'           => new sfWidgetFormFilterInput(),
      'tries'          => new sfWidgetFormFilterInput(),
      'lang'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'time'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tries'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lang'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('score_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Score';
  }

  public function getFields()
  {
    return array(
      'user_id'        => 'Number',
      'competition_id' => 'Number',
      'question'       => 'Number',
      'time'           => 'Number',
      'tries'          => 'Number',
      'lang'           => 'Text',
    );
  }
}