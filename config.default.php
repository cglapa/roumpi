<?php defined('IN_CMS') or die('No direct access allowed.');

/*
	Roumpi - Configuration
*/
return array(
	//  informations base de donnée MySQL
	'database' => array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'name' => 'roumpi'
	),
	
	// paramètres
	'application' => array(
		// chemins (url)
		'base_url' => '/',
		'index_page' => 'index.php',

		// fuseau horraire
		'timezone' => 'UTC+1',

		// accès à l’administration
		'admin_folder' => 'admin',

		// votre clé pour signer les mots de passes
		'key' => ''
	),
	
	// paramètres de sessions
	'session' => array(
		'name' => 'roumpi',
		'expire' => 3600,
		'path' => '/',
		'domain' => ''
	),

	// erreurs
	'error' => array(
		'ignore' => array(E_NOTICE, E_USER_NOTICE, E_DEPRECATED, E_USER_DEPRECATED),
		'detail' => false,
		'log' => false
	),

	// afficher le profil de la base de données
	'debug' => false
);
