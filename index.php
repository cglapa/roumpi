<?php

/**
* Roumpi
*
* Un CMS sympa, par @JulienBarrier. basé sur Anchor CMS de @visualidiot.
* Que du bon !
*/

// benchmark
define('ROUMPI_START', microtime(true));

// Set the include path
define('PATH', pathinfo(__FILE__, PATHINFO_DIRNAME) . '/');

// Block direct access to any PHP files
define('IN_CMS', true);

// Roumpi version
define('ROUMPI_VERSION', 0.6);

// Lets bootstrap our application and get it ready to run
require PATH . 'system/bootstrap.php';
