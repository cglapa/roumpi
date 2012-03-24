<!doctype html>
<html lang="en-gb">
    <head>
        <meta charset="utf-8">
        <title>Installer Roumpi</title>
        <mate name="robots" content="noindex, nofollow">
        
        <link rel="stylesheet" href="assets/css/app.css">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery.js"><\/script>');</script>
        <script src="assets/js/app.js"></script>
    </head>
    <body>
    
    	<h1><img src="assets/img/logo.png" alt="Logo de Roumpi"></h1>
    	
    	<?php
    	
    	/*
    		vérification de la compatibilité
    	*/
    	$compat = array();
    	
    	// php
    	if(version_compare(PHP_VERSION, '5.3.0', '<')) {
    		$compat[] = 'Roumpi fonctionne avec une version de PHP postérieure à la 5.3.<br><em>La votre est la ' . PHP_VERSION . '</em>';
    	}
    	
    	// PDO
    	if(class_exists('PDO') === false) {
    		$compat[] = 'Roumpi a besoin de PDO (PHP Data Objects)<br>
    		<em>Vous pouvez avoir plus d’informations à propos de <a href="//php.net/manual/en/book.pdo.php">l’anstallation et de la mise en place de PHP Data Objects</a> 
    		 (en) sur le site php.net.</em>';
    	} else {
    		if(in_array('mysql', PDO::getAvailableDrivers()) === false) {
    			$compat[] = 'Roumpi a besoin du driver MySQL PDO<br>
    				<em>Vous pouvez en savoir plusYou can find more about <a href="//php.net/manual/en/ref.pdo-mysql.php">à ce sujet</a> 
    				 (en) sur le site php.net.</em>';
    		}
    	}

        //peut on écrire un fichier de conf ?
        // note: le seul moyen est d’essayer.
        if(@file_put_contents('../test.php', '<?php //test') === false) {
            $compat[] = 'Il semble que l’on ne puisse pas écrire sur le répertoire racine. Roumpi ne sera donc pas capable d’écrire un fichier de configuration.
                Il serait donc avantageux de rendre ce dossier inscriptible au moins jusqu’à la fin de l’installation.';
        } else {
            unlink('../test.php');
        }

    	?>
    	
    	<?php if(count($compat)): ?>
    
    	<div class="content">
    		<h2>Ouups !</h2>
    		
    		<p>Roumpi a besoin de certaines petites choses :</p>
    		
    		<ul style="padding-bottom: 1em;">
    			<?php foreach($compat as $item): ?>
    			<li><?php echo $item; ?></li>
    			<?php endforeach; ?>
    		</ul>
    		
    		<p><a href="." class="button" style="float: none; display: inline-block;">C’est bon, c’est corrigé !</a></p>
    	</div>
    
    	<?php elseif(file_exists('../config.php')): ?>
    	
    	<div class="content">
    		<h2>Ouuups !</h2>
    		
    		<p>Roumpi est déjà installé. Vous devriez vraiment supprimer ce dossier…</p>
    		
    		<p><a href="../" class="button" style="float: none; display: inline-block;">Retourner sur le site principal.</a></p>
    	</div>
    	
    	<?php else: ?>
    
        <p class="nojs error">Vous avez besoin de Javascript pour permettre cette installation. <em>Désolé :(</em></p>

        <div class="content">
            <h2>Bienvenue sur Roumpi.</h2>

            <p>Si vous cherchiez une réelle expérience de partage, simple et légère, vous avez bien trouvé. Il faudra juste remplir les quelques détails ci-dessous, et vous aurez un site internet installé dans quelques instants.</p>
            
            <small>Si vous souhaitiez une installation plus personnalisée, libre à vous de modifier <code>config.default.php</code> 
            (avant ou après l’installation, ça n’a pas vraiment d’importance, du moment que vous le renomiez en 
            <code>config.php</code>).</small>
            
            <div class="notes"></div>
            
            <form method="get" novalidate>
                <fieldset id="diagnose">
                    <legend>À propos de votre base de donnée.</legend>
                    
                    <p>
                        <label for="host">Votre hôte :</label>
                        <input id="host" name="host" value="localhost">
                    </p>
                    <p>
                        <label for="user">Le compte utilisateur :</label>
                        <input id="user" autocapitalize="off" name="user" placeholder="root">
                    </p>
                    <p>
                        <label for="pass">Le mot de passe :</label>
                        <input id="pass" autocapitalize="off" name="pass" placeholder="password">
                    </p>
                    <p>
                        <label for="db">Le nom de la base :</label>
                        <input id="db" autocapitalize="off" name="db" placeholder="anchor">
                    </p>
                    
                    <a href="#check" class="button">Vérifier tout ceci…</a>
                </fieldset>
                
                <fieldset>
                    <legend>À propos de votre site.</legend>
                    
                    <p>
                        <label for="name">Votre nom :</label>
                        <input id="name" name="name" placeholder="My awesome Anchor site">
                    </p>
                    
                    <p>
                        <label for="description">Description pour votre site :</label>
                        <textarea id="description" name="description"></textarea>
                    </p>

                    <p>
                        <label for="theme">Thème graphique :</label>
                        <select id="theme" name="theme">
                            <?php foreach(glob('../themes/*') as $theme): $name = basename($theme); ?>
                            <?php if(file_exists($theme . '/about.txt')): ?>
                            <option value="<?php echo $name; ?>" <?php if($name === 'default') echo 'selected'; ?>><?php echo ucwords($name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    
                    <p>
                        <label for="email">Votre adresse mail :</label>
                        <input id="email" name="email">
                    </p>
                    
                    <p>
                        <label for="path">Chemin sur le serveur :</label>
                        <input id="path" name="path" value="<?php echo dirname(dirname($_SERVER['SCRIPT_NAME'])); ?>">
                    </p>
                    
                    <p>
                        <label><input type="checkbox" name="clean_urls" value="1">
                        Avoir des url sympas</label> (si le mod_rewrite d’Apache est activé)
                    </p>
                    
                </fieldset>
                
                <br style="clear: both;">
                <button type="submit">Installer Roumpi</button>
            </form>
        </div>
        
        <?php endif; ?>
        
        <p class="footer">Fait avec amour par <a href="//julienbarrier.fr">@JulienBarrier</a>. 
        Si quelque chose ne marche pas, envoyez lui un message sur Twitter.<br>Il répondra sûrement !</p>
    </body>
</html>
