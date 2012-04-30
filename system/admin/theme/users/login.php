<h1>Connexion</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" >
		<fieldset>
			
			<p>
			    <label for="user">Pseudonyme :</label>
			    <input autocapitalize="off" name="user" id="user" value="<?php echo Input::post('user'); ?>">
			</p>
			
			<p>
    			<label for="pass">Mot de passe :</label>
    			<input type="password" name="pass" id="pass">
    			
    			<em><a href="<?php echo admin_url('users/amnesia'); ?>">Mot de passe oublié ?</a></em>
			</p>

			<p class="buttons">
			    <button type="submit">Connexion</button>
			    <a href="<?php echo Url::make(); ?>">Retour à <?php echo Config::get('metadata.sitename'); ?></a>
			</p>
		</fieldset>
	</form>

</section>
