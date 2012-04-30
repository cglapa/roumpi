<h1>Données du site</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" novalidate>
		<fieldset>
			<p>
    			<label for="sitename">Nom du site :</label>
    			<input id="sitename" name="sitename" value="<?php echo Input::post('name', $metadata->sitename); ?>">
    			
    			<em>Le nom de votre site.</em>
    		</p>

			<p>
			    <label for="description">Description :</label>
			    <textarea id="description" name="description"><?php echo Input::post('description', $metadata->description); ?></textarea>
			    
			    <em>Un petit paragraphe décrivant votre site.</em>
			</p>

			<p>
			    <label>Page d’accueil :</label>
    			<select id="home_page" name="home_page">
    				<?php foreach($pages as $page): ?>
    				<?php $selected = (Input::post('home_page', $metadata->home_page) == $page->id) ? ' selected' : ''; ?>
    				<option value="<?php echo $page->id; ?>"<?php echo $selected; ?>>
    					<?php echo $page->name; ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>La page d’accueil actuelle.</em>
			</p>

			<p>
			    <label>Page pour les articles :</label>
    			<select id="posts_page" name="posts_page">
    				<?php foreach($pages as $page): ?>
    				<?php $selected = (Input::post('posts_page', $metadata->posts_page) == $page->id) ? ' selected' : ''; ?>
    				<option value="<?php echo $page->id; ?>"<?php echo $selected; ?>>
    					<?php echo $page->name; ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>La page qui affichera la liste de vos articles.</em>
			</p>

			<p>
				<label for="posts_per_page">Articles par page :</label>
				<input id="posts_per_page" name="posts_per_page" value="<?php echo Input::post('posts_per_page', $metadata->posts_per_page); ?>">
				
				<em>Le nombre d’articles à afficher sur une page.</em>
			</p>
			
			<p>
				<label>Thème actuel :</label>
				<select id="theme" name="theme">
					<?php foreach($themes as $theme => $about): ?>
					<?php $selected = (Input::post('theme', $metadata->theme) == $theme) ? ' selected' : ''; ?>
					<option value="<?php echo $theme; ?>"<?php echo $selected; ?>>
						<?php echo $about['name']; ?> by <?php echo $about['author']; ?>
					</option>
					<?php endforeach; ?>
				</select>

				<em>Votre thème actuel.</em>
			</p>

			<p>
				<label for="auto_published_comments">Publier automatiquement les avis :</label>
				<?php $checked = Input::post('auto_published_comments', $metadata->auto_published_comments) ? ' checked' : ''; ?>
				<input name="auto_published_comments" type="checkbox" value="1"<?php echo $checked; ?>>
			</p>

			<p>
				<label for="twitter">Twitter:</label>
				<input id="twitter" name="twitter" value="<?php echo Input::post('twitter', $metadata->twitter); ?>">
				
				<em>Votre compte Twitter. Affiché comme @<span id="output"><?php echo $metadata->twitter; ?></span>.</em>
			</p>
		</fieldset>
			
		<p class="buttons">
			<button name="save" type="submit">Enregistrer</button>
		</p>
	</form>

</section>

<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.1/mootools-yui-compressed.js"></script>
<script>window.MooTools || document.write('<script src="<?php echo theme_url('assets/js/mootools.js'); ?>"><\/script>');</script>
<script src="<?php echo theme_url('assets/js/helpers.js'); ?>"></script>
<script>
	(function() {
		var tweet = $('twitter'), output = $('output');

		// call the function to init the input text
		formatTwitter(tweet, output);

		// bind to input
		tweet.addEvent('keyup', function() {formatTwitter(tweet, output)});
	}());
</script>

