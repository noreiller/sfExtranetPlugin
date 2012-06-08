<?php

class BasesfExtranetDashboardActions extends sfActions
{
  /**
   * Check admin credentials.
   * @return Boolean
   */
  protected function checkCredentials()
  {
    $module = 'sf_extranet_dashboard';
    if (!in_array($module, array_keys(sfPlop::getSafePluginModules()))
      && !$this->getUser()->hasCredential($module)
    )
      $this->forward404();

    if (!$this->getUser()->isAuthenticated())
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

    if (!$this->getUser()->hasCredential($module))
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

    return $this->getUser()->isAuthenticated() && $this->getUser()->isSuperAdmin();
  }

  public function preExecute()
  {
    $this->isUserAdmin = $this->checkCredentials();
    ProjectConfiguration::getActive()->LoadHelpers(array('I18N'));
    $this->getResponse()->setTitle(sfPlop::setMetaTitle(__('Extranet dashboard', '', 'plopAdmin')));
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->events = sfExtranetItemQuery::create()
      ->filterByIsPublished(true)
      ->filterByType('event')
      ->orderByDate(Criteria::DESC)
      ->setLimit(sfConfig::get('app_extranet_dashboard_pagination', sfConfig::get('extranet_dashboard_pagination')))
      ->find()
    ;

    $category = $request->getParameter('category');
    if ($category && strlen(trim($category)) == 0)
      unset($category);
    $q = sfExtranetItemQuery::create()
      ->filterByIsPublished(true)
      ->filterByType('document')
      ->orderByUpdatedAt(Criteria::DESC)
    ;
    if (isset($category))
      $q->filterByCategory('%' . $category . '%');
    $this->documents = $q->find();

    $this->categories = sfExtranetItemPeer::getCategories();
    $this->category = $category;
  }

  public function executeDownload(sfWebRequest $request)
  {
    if (!$request->hasParameter('id'))
      $this->forward404();

    $item = sfExtranetItemQuery::create()->findOneById($request->getParameter('id'));
    if (!$item || $item->getType() != 'document')
      $this->forward404();

    $file_name = $item->getFile();
    $data_dir = sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR;
    $file_real = $data_dir . $file_name;
    $info = pathinfo($file_name);
    $ext = $info['extension'];
    $attachment = $item->getTitle() . '.' . $ext;

    $this->setLayout(false);

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public", false);
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Content-Disposition: attachment; filename=\"" . $attachment . "\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . filesize($file_real));

    if ($stream = fopen($file_real, 'rb'))
    {
      while(!feof($stream) && connection_status() == 0)
      {
        set_time_limit(0);
        print(fread($stream, 1024*8));
        flush();
      }
      fclose($stream);
    }

  }

}
