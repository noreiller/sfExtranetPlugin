<?php

/**
 * sfExtranetDocument form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfExtranetDocumentForm extends sfExtranetItemForm
{
  public function configure()
  {
  	parent::configure();
  	
  	$this->checkFields('document');

    $this->setDefault('type', 'document');

    if ($this->getOption('user_id') && $this->isNew())
      $this->setDefault('created_by', $this->getOption('user_id'));
  }
}
