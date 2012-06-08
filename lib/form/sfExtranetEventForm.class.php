<?php

/**
 * sfExtranetEvent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfExtranetEventForm extends sfExtranetItemForm
{
  public function configure()
  {
    parent::configure();

    $this->checkFields('event');

    $this->widgetSchema['date'] = new sfWidgetFormDate(array(
      'format' => '%day%/%month%/%year%'
    ));

    $this->setDefault('type', 'event');
    
    if ($this->getOption('user_id') && $this->isNew())
      $this->setDefault('created_by', $this->getOption('user_id'));

  }
}
