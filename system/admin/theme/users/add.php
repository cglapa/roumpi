<h1>Ajouter un nouvel utilisateur</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" novalidate autocomplete="off">
		<fieldset>
			<p>
    			<label for="real_name">Vrai nom :</label>
    			<input id="real_name" name="real_name" value="<?php echo Input::post('real_name'); ?>">
    			
    			<em>Le vrai nom de l’utilisateur. Il sera utilisé dans la présentation publique de l’utilisateur.</em>
    		</p>
						
            <p>
                <label for="bio">Biographie :</label>
                <textarea id="bio" name="bio"><?php echo Input::post('bio'); ?></textarea>
                
                <em>Une courte biographie, tout en HTML.</em>
            </p>
			
			<p>
			    <label for="status">Statut :</label>
    			<select id="status" name="status">
    				<?php foreach(array('inactive','active') as $status): ?>
    				<?php $selected = (Input::post('status') == $status) ? ' selected' : ''; ?>
    				<option value="<?php echo $status; ?>"<?php echo $selected; ?>>
    					<?php echo ucwords($status); ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>S’il est inactif, l’utilisateur ne pourra pas se connecter.</em>
			</p>
			
			<p>
			    <label for="role">Fonction :</label>
    			<select id="role" name="role">
    				<?php foreach(array('administrator', 'editor', 'user') as $role): ?>
    				<?php $selected = (Input::post('role') == $role) ? ' selected' : ''; ?>
    				<option value="<?php echo $role; ?>"<?php echo $selected; ?>>
    					<?php echo ucwords($role); ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>La fonction de l’utilisateur. Voyez <a href="//julienbarrier.fr/roumpi/docs#fonctions">la doc</a> pour queulques informations.</em>
			</p>
		</fieldset>
		
		<fieldset>
		
		    <legend>Détails sur les utilisateurs</legend>
		    <em>Ajoutez d’autres choses poru qu’il puisse se connecter sur Roumpi.</em>
		
		    <p>
		        <label for="username">Pseudonyme :</label>
		        <input id="username" name="username" value="<?php echo Input::post('username'); ?>">
		        
		        <em>Le pseudo choisi. Ceci pourra être changé plus tard.</em>
		    </p>

            <p>
                <label for="password">Mot de passe :</label>
                <input id="password" type="password" name="password">
                
                <em>Le mot de passe correspondant, qui pourra aussi être changé plus tard.</em>
            </p>
            
		    <p>
		        <label for="email">Mél. :</label>
		        <input id="email" name="email" value="<?php echo Input::post('email'); ?>">
		        
		        <em>L’adresse e-mail de l’utilisateur. Nécessaire si il oublie son mot de passe.</em>
		    </p>
		</fieldset>
			
		<p class="buttons">
			<button type="submit">Créer</button>
			<a href="<?php echo admin_url('users'); ?>">Retourner à la liste</a>
		</p>
	</form>

</section>

