<h1>Éditer le profil de <?php echo $user->username; ?></h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" novalidate autocomplete="off">
		<fieldset>
			<p>
    			<label for="real_name">Vrai nom :</label>
    			<input id="real_name" name="real_name" value="<?php echo Input::post('real_name', $user->real_name); ?>">
    			
    			<em>Le vrai nom de l’utilisateur. Il apparaîtra dans son résumé, visible par le public.</em>
    		</p>
						
            <p>
                <label for="bio">Biographie :</label>
                <textarea id="bio" name="bio"><?php echo Input::post('bio', $user->bio); ?></textarea>
                
                <em>Une courte biographie pour cette utilisateur, en HTML valide, si possible.</em>
            </p>
			
			<p>
			    <label for="status">Statut :</label>
    			<select id="status" name="status">
    				<?php foreach(array('inactive','active') as $status): ?>
    				<?php $selected = (Input::post('status', $user->status) == $status) ? ' selected' : ''; ?>
    				<option value="<?php echo $status; ?>"<?php echo $selected; ?>>
    					<?php echo ucwords($status); ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>S’il est inactif, l’utilisateur sera incapable de se connecter.</em>
			</p>
			
			<p>
			    <label for="role">Fonction :</label>
    			<select id="role" name="role">
    				<?php foreach(array('administrator', 'editor', 'user') as $role): ?>
    				<?php $selected = (Input::post('role', $user->role) == $role) ? ' selected' : ''; ?>
    				<option value="<?php echo $role; ?>"<?php echo $selected; ?>>
    					<?php echo ucwords($role); ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>La fonction de l’utilisateur. Voyez <a href="//julienbarrier.fr/roumpi/docs#fonctions">la doc</a> pour plus d’infos.</em>
			</p>
		</fieldset>
		
		<fieldset>
		
		    <legend>Détails de l’utilisateur</legend>
		    <em>Changons quelques choses pour qu’il puisse se connecter à Roumpi.</em>
		
		    <p>
		        <label for="username">Pseudonyme :</label>
		        <input id="username" name="username" value="<?php echo Input::post('username', $user->username); ?>">
		        
		        <em>Le pseudonyme voulu.</em>
		    </p>

            <p>
                <label for="password">Mot de passe :</label>
                <input id="password" type="password" name="password">
                
                <em>Laissez vide pour ne rien changer</em>
            </p>
            
		    <p>
		        <label for="email">Mél. :</label>
		        <input id="email" name="email" value="<?php echo Input::post('email', $user->email); ?>">

                <em>L’adresse e-mail de l’utilisateur. Ceci est nécessaire si il oublie son mot de passe.</em>
		    </p>
		</fieldset>
			
		<p class="buttons">
			<button type="submit">Mettre à jour</button>
			<?php if(Users::authed()->id !== $user->id): ?>
			<button name="delete" type="submit">Supprimer</button>
			<?php endif; ?>
			
			<a href="<?php echo admin_url('users'); ?>">Retourner à la liste</a>
		</p>
	</form>

</section>
