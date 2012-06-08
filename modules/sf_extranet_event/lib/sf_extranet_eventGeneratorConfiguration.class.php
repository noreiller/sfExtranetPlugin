<?php

/**
 * sf_extranet_event module configuration.
 *
 * @package    plop
 * @subpackage sf_extranet_event
 * @author     Aurélien MANCA <aurelien.manca@gmail.com>
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sf_extranet_eventGeneratorConfiguration extends BaseSf_extranet_eventGeneratorConfiguration
{

  public function getQueryMethods()
  {
    return array('filterByEventType');
  }
  
  public function getForm($object = null, $options = array())
  {
    $options['user_id'] = sfContext::getInstance()->getUser()->getGuardUser()->getId();

    return parent::getForm($object, $options);
  }

}
