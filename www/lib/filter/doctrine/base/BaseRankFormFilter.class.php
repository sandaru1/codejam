<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Rank filter form base class.
 *
 * @package    filters
 * @subpackage Rank *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseRankFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rank'           => new sfWidgetFormFilterInput(),
      'points'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rank'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'points'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rank_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rank';
  }

  public function getFields()
  {
    return array(
      'user_id'        => 'Number',
      'competition_id' => 'Number',
      'rank'           => 'Number',
      'points'         => 'Number',
    );
  }
}