<?php

/*
	test de connexion à la bdd
*/

$fields = array('host', 'user', 'pass', 'db');
$post = array();

foreach($fields as $field) {
	$post[$field] = isset($_POST[$field]) ? $_POST[$field] : false;
}

if(empty($post['db'])) {
	$errors[] = 'Vous devez spécifier un nom de base de données';
}

if(empty($post['host'])) {
	$errors[] = 'Il faudrait renseigner un hôte de base.';
}

// tester la bdd
if(empty($errors)) {
	try {
		$dsn = 'mysql:dbname=' . $post['db'] . ';host=' . $post['host'];
		new PDO($dsn, $post['user'], $post['pass']);
	} catch(PDOException $e) {
		$errors[] = $e->getMessage();
	}
}

// envoyer la réponse
header('Content-Type: text/plain');

if(empty($errors)) {
	// aucune erreur, coooooool !
	echo 'good';
} else {
	echo implode(', ', $errors);
}
