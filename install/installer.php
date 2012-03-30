<?php

/*
	fonctions d’aide
*/
function random($length = 16) {
	$pool = str_split('0123456789abcdefghijklmnopqrstuvwxyz
ABCDEFGHIJKLMNOPQRSTUVWXYZ', 1); /*àâéèêëîïôùûüÿçæœ ÀÂÉÈÊËÎÏÔÙÛÜŸÇÆŒ*/
	$value = '';

	for ($i = 0; $i < $length; $i++)  {
		$value .= $pool[mt_rand(0, 61)];
	}

	return $value;
}
	
/*
	Installeur
*/

$fields = array('host', 'user', 'pass', 'db', 'name', 'description', 'theme', 'email', 'path', 'clean_urls');
$post = array();
$warnings = array();
$errors = array();

foreach($fields as $field) {
	$post[$field] = isset($_POST[$field]) ? $_POST[$field] : false;
}

if(empty($post['db'])) {
	$errors[] = 'Merci de renseigner un nom de base de donnée.';
}

if(empty($post['host'])) {
	$errors[] = 'Merci de renseigner un nom d’hôte.';
}

if(empty($post['name'])) {
	$errors[] = 'Entrez s’il vous plaît un nom pour le site.';
}

if(empty($post['theme'])) {
	$errors[] = 'Sélectionnez un thème. S’il vous plaît.';
}

if(filter_var($post['email'], FILTER_VALIDATE_EMAIL) === false) {
	$errors[] = 'Essayez d’entrer une adresse mail valide…';
}

if(version_compare(PHP_VERSION, '5.3.0', '<')) {
	$errors[] = 'Roumpi a besoin d’une version supérieure à PHP 5.3. Or, votre environnement semble être la ' . PHP_VERSION;
}

// test de la bdd
if(empty($errors)) {
	try {
		$dsn = 'mysql:dbname=' . $post['db'] . ';host=' . $post['host'];
		$dbh = new PDO($dsn, $post['user'], $post['pass']);
	} catch(PDOException $e) {
		$errors[] = $e->getMessage();
	}
}

// création des fichiers de configuration
if(empty($errors)) {
	$template = file_get_contents('../config.default.php');
	
	$base_url = ($path = trim($post['path'], '/')) == '' ? '' : $path . '/';
	$index_page = ($post['clean_urls'] === false ? 'index.php' : '');

	$search = array(
		"'host' => 'localhost'",
		"'username' => 'root'",
		"'password' => ''",
		"'name' => 'roumpi'",
		
		// chemins
		"'base_url' => '/'",
		"'index_page' => 'index.php'",
		"'key' => ''"
	);
	$replace = array(
		"'host' => '" . $post['host'] . "'",
		"'username' => '" . $post['user'] . "'",
		"'password' => '" . $post['pass'] . "'",
		"'name' => '" . $post['db'] . "'",

		// chemins
		"'base_url' => '/" . $base_url . "'",
		"'index_page' => '" . $index_page . "'",
		"'key' => '" . random(32) . "'"
	);
	$config = str_replace($search, $replace, $template);

	if(file_put_contents('../config.php', $config) === false) {
		$errors[] = 'Failed to create config file';
	}
	
	// if we have clean urls enabled let setup a 
	// basic htaccess file is there isnt one
	if($post['clean_urls']) {
		// dont overwrite existing htaccess file
		if(file_exists('../.htaccess') === false) {
			$htaccess = file_get_contents('../htaccess.txt');	
			$htaccess = str_replace('# RewriteBase /', 'RewriteBase /' . $base_url, $htaccess);
	
			if(file_put_contents('../.htaccess', $htaccess) === false) {
				$errors[] = 'Incapable de créer un fichier .htaccess. Vous devrez le faire pour avoir les url propres.';
			}
		} else {
			$warnings[] = 'Il semble que vous avez déjà un fichier .htaccess en place. Pour avoir des url propres, vous pouvez copier et coller le code du fichier htaccess.txt. N’oubliez pas de changer l’argument <em>RewriteBase</em> si vous avez installé Roumpi dans un sous-dossier.';
		}
	}
}

// création bdd
if(empty($errors)) {
	// créer un mot de passe unique pour l’installation.
	$password = random(8);

	$sql = str_replace('[[now]]', time(), file_get_contents('roumpi.sql'));
	$sql = str_replace('[[password]]', crypt($password), $sql);
	$sql = str_replace('[[email]]', strtolower(trim($post['email'])), $sql);
	
	try {
		$dbh->beginTransaction();
		$dbh->exec($sql);
		
		$sql= "INSERT INTO `meta` (`key`, `value`) VALUES ('sitename', ?), ('description', ?), ('theme', ?);";
		$statement = $dbh->prepare($sql);
		$statement->execute(array($post['name'], $post['description'], $post['theme']));

		$dbh->commit();
	} catch(PDOException $e) {
		$errors[] = $e->getMessage();
		
		// transaction
		if($dbh->inTransaction()) {
			$dbh->rollBack();
		}
	}
}

// afficher la réponse
header('Content-Type: application/json');

if(empty($errors)) {
	// aucune erreur. c’est toooop !
	$response['installed'] = true;
	$response['password'] = $password;
	$response['warnings'] = $warnings;
} else {
	$response['installed'] = false;
	$response['errors'] = $errors;
	$response['warnings'] = $warnings;
}

// afficher la sortie json
echo json_encode($response);
