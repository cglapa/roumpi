<h1>Changer le mot de passe</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" >
		<fieldset>
			
			<p>
			    <label for="email">Mél. :</label>
			    <input autocapitalize="off" name="email" id="email" value="<?php echo Input::post('email'); ?>">
			</p>

			<p class="buttons">
			    <button type="submit">Retrouver</button>
			    <a href="<?php echo Url::make(); ?>">Revenir à <?php echo Config::get('metadata.sitename'); ?></a>
			</p>
		</fieldset>
	</form>

</section>

