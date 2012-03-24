<?php

/**
 *    Roumpi
 *
 *    dérive de AnchorCMS, par @visualidiot.
 *    Tout se passera bien !
 */

// point de référence
define('ROUMPI_START', microtime(true));

//  définir le chemin
define('PATH', pathinfo(__FILE__, PATHINFO_DIRNAME) . '/');

//  bloquer l’accès à tous les fichiers PHP
define('IN_CMS', true);

//  version
define('ROUMPI_VERSION', 1.3247);

// mettons en place l’application et rendons la prête
require PATH . 'system/bootstrap.php';
