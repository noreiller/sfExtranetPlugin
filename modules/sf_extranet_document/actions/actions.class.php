<?php

require_once dirname(__FILE__).'/../lib/sf_extranet_documentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sf_extranet_documentGeneratorHelper.class.php';

/**
 * sf_extranet_document actions.
 *
 * @package    plop
 * @subpackage sf_extranet_document
 * @author     Aurélien MANCA <aurelien.manca@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sf_extranet_documentActions extends autoSf_extranet_documentActions
{
  public function preExecute()
  {
    $module = 'sf_extranet_document';
    if (!in_array($module, array_keys(sfPlop::getSafePluginModules())))
      $this->forward404();

    if (!$this->getUser()->isAuthenticated())
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

    if (!$this->getUser()->hasCredential($module))
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

    parent::preExecute();

    $user = $this->getUser();
    $user->setCulture($user->getProfile()->getCulture());

    ProjectConfiguration::getActive()->LoadHelpers(array('I18N'));
    $this->getResponse()->setTitle(sfPlop::setMetaTitle(__('Extranet documents', '', 'plopAdmin')));
  }

  protected function checkType()
  {
    if (!$this->getRoute()->getObject()->isDocument())
      $this->forward404();
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->checkType();

    parent::executeEdit($request);
  }

  public function executeDownload(sfWebRequest $request)
  {
    $this->redirect('@sf_extranet_download?id=' . $this->getRoute()->getObject()->getId());
  }
}
