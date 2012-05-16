<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Erreur.</title>
		
		<link rel="stylesheet" href="<?php echo theme_url('/css/reset.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/bootstrap.css'); ?>">
	</head>
	<body>
<h1><img src="<?php echo theme_url('/assets/img/logo.png'); ?>" alt="Logo de Roumpi"></h1>
    	<div class="content">
    		<h2>Ouups !</h2>

		<fieldset>
			<legend>Message d’erreur</legend>
			<?php echo $message; ?> in <strong><?php echo str_replace(PATH, '', $file); ?></strong> on line <strong><?php echo $line; ?></strong>.
		</fieldset>

		<fieldset>
			<legend>Stack Trace.</legend>

			<pre><?php echo $trace; ?></pre>
		</fieldset>

		<fieldset>
			<legend>Contexte de l’erreur.</legend>
			<?php if(count($contexts)): ?>
			<small>
				<?php foreach ($contexts as $num => $context): ?>
					<pre><?php echo htmlentities($num.' '.$context); ?></pre>
				<?php endforeach; ?>
			</small>
			<?php else: ?>
				contexte non disponible
			<?php endif; ?>
		</fieldset>
		
		<fieldset>
			 <legend>Informations supplémentaires</legend>
			
			<ul>
				<li>Version de PHP: <?php echo phpversion(); ?></li>
				<li>Système d’exploitation: <?php echo php_uname(); ?></li>
				<li>Logiciel serveur: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
				<li>User Agent: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
				<li>Request Uri: <?php echo $_SERVER['REQUEST_URI']; ?></li>
			</ul>
		</fieldset>
		<p style="clear: both;"><a href="./" class="button" style="float: right; display: inline-block;">Recharger la page</a></p>
                <br style="clear: both;">
    	</div>
	</body>
</html>
