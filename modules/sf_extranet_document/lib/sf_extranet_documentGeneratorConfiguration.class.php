<?php

/**
 * sf_extranet_document module configuration.
 *
 * @package    plop
 * @subpackage sf_extranet_document
 * @author     Aurélien MANCA <aurelien.manca@gmail.com>
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sf_extranet_documentGeneratorConfiguration extends BaseSf_extranet_documentGeneratorConfiguration
{

  public function getQueryMethods()
  {
    return array('filterByDocumentType');
  }

  public function getForm($object = null, $options = array())
  {
    $options['user_id'] = sfContext::getInstance()->getUser()->getGuardUser()->getId();

    return parent::getForm($object, $options);
  }

}
