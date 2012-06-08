<?php

// autoloading for plugin lib actions is broken as at symfony-1.0.2
require_once(sfConfig::get('sf_plugins_dir') . '/sfExtranetPlugin/modules/sf_extranet_dashboard/lib/BasesfExtranetDashboardActions.class.php');

class sf_extranet_dashboardActions extends BasesfExtranetDashboardActions
{
}