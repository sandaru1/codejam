<?php

# FROZEN_SF_LIB_DIR: /var/www/production/sfweb/www/cache/symfony-for-release/1.2.2/lib

require_once dirname(__FILE__).'/../lib/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
 	  $this->enablePlugins(array('sfDoctrinePlugin','sfProtoculousPlugin'));
  	$this->disablePlugins(array('sfPropelPlugin'));
  }
}
