<?php

/**
 * sfExtranetItem form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfExtranetItemForm extends BasesfExtranetItemForm
{
  public function configure()
  {
    $this->widgetSchema['type'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();

    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    $this->validatorSchema['file'] = new sfValidatorFile(array(
      'required' => $this->isNew() ? true : false,
      'max_size' => '1024000',
      'path' => sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . 'media'
    ));
  }

  public function checkFields($name = null) 
  {
  	if ($name && class_exists('sfExtranet' . ucfirst($name) . 'Form'))
  	{
  		$required_fields = array(
  			'id',
  			'type',
        'created_by',
        'created_at',
        'updated_at'
  		);

  		$form_fields = sfConfig::get(
  			'app_extranet_' . $name . '_fields',
  			sfConfig::get('extranet_' . $name . '_fields')
			);

  		$fields = $this->getWidgetSchema()->getFields();

  		foreach ($fields as $name => $field)
  		{
  			if (!in_array($name, $form_fields) && !in_array($name, $required_fields))
  				unset($this[$name]);
  		}
  	}
  }
}
