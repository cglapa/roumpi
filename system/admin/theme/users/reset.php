<h1>Changer le mot de passe</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" >
		<fieldset>
			<legend>Mot de passe changé pour <?php echo $user->real_name; ?></legend>
			<em>S’il vous plaît, entrez un nouveau mot de passe que vous n’oublierez pas.</em>
			
			<p>
			    <label for="password">Mot de passe :</label>
			    <input name="password" id="password" type="password" value="<?php echo Input::post('password'); ?>">
			</p>

			<p class="buttons">
			    <button type="submit">Envoyer</button>
			    <a href="<?php echo Url::make(); ?>">Back to <?php echo Config::get('metadata.sitename'); ?></a>
			</p>
		</fieldset>
	</form>

</section>
