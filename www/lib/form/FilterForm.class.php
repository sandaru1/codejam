<?php

class FilterForm extends sfForm {

  public function configure()
  {
    if (isset($this->options['competition'])) {
      $countries = Doctrine::getTable('Competition')->getCountries($this->options['competition']);
    } else {
      $countries = Doctrine::getTable('User')->getCountries();
    }
    

    $this->setWidgets(array(
      'handle'          => new sfWidgetFormInput(array(),array('class' => 'inputtext','style' => 'width:243px')),
      'country'          => new sfWidgetFormSelect(array('choices' => $countries),array('style' => 'width:250px'))
    ));

    $this->setValidators(array(
      'country'          => new sfValidatorString(array('max_length' => 200,'required' => false)),
      'handle'          => new sfValidatorString(array('max_length' => 200,'required' => false))
    ));
    
    for($i=0;$i<$this->options['questions'];$i++) {
      $l = chr(65+floor($i/2)).($i%2==0?'1':'2');
      $this->setWidget('question_'.$i,new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1','label' => $l)));
      $this->setValidator('question_'.$i,new sfValidatorString(array('required' => false)));
    }
    
    $this->setWidget('fb_users',new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1','label' => 'Only Registered Users')));
    $this->setValidator('fb_users',new sfValidatorString(array('required' => false)));

    $this->setWidget('results',new sfWidgetFormSelect(array('choices' => array('50' => '50 results per page','100' => '100 results per page','150' => '150 results per page'))));
    $this->setValidator('results',new sfValidatorString(array('required' => false)));

    $this->widgetSchema->setNameFormat('filter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

}
?>
