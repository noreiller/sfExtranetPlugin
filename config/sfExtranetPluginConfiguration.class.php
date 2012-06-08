<?php
/**
 * Description of sfExtranetPluginConfiguration
 *
 * @author Aurélien MANCA <aurelien.manca@gmail.com>
 */
class sfExtranetPluginConfiguration extends sfPluginConfiguration
{

  public function initialize()
  {
    parent::initialize();

    if (class_exists('sfPlop'))
      sfPlop::loadPlugin(array(
        'modules' => array(
          'sf_extranet_dashboard' => array('name' => 'Extranet dashboard', 'route' => '@sf_extranet_dashboard'),
          'sf_extranet_event' => array('name' => 'Extranet events', 'route' => '@sf_extranet_event'),
          'sf_extranet_document' => array('name' => 'Extranet documents', 'route' => '@sf_extranet_document')
        )
      ));

    sfConfig::add(array(
      'extranet_dashboard_pagination' => 10,
      'extranet_anonymous_name' => 'Anonymous',
      'extranet_event_fields' => array(
        'title',
        'description',
        'date',
        'is_published'
      ),
      'extranet_document_fields' => array(
        'title',
        'category',
        'file',
        'is_published'
      )
    ));
  }
}
?>
