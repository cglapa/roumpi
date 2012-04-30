
<h1>Ajouter un article</h1>

<?php echo Notifications::read(); ?>

<section class="content">
	<nav class="tabs">
		<ul>
			<li><a href="#post">Article</a></li>
			<li><a href="#customise">Personnaliser</a></li>
			<li><a href="#fields">Champs personnalisés</a></li>
			<li><a href="#comments">Commentaires</a></li>
		</ul>
	</nav>
	<form method="post" action="<?php echo Url::current(); ?>" novalidate>
		<div data-tab="post" class="tab">

			<fieldset>
				<p>
	    			<label for="title">Titre :</label>
	    			<input id="title" name="title" value="<?php echo Input::post('title'); ?>">
	    			
	    			<em>Le titre de votre page.</em>
	    		</p>
				
				<p>
				    <label for="slug">Identifiant :</label>
				    <input id="slug" autocomplete="off" name="slug" value="<?php echo Input::post('slug'); ?>">
				    
				    <em>Ce qui sera affiché dans l’url (<code id="output">identifiant</code>).</em>
				</p>
				
	            <p>
	                <label for="description">Description:</label>
	                <textarea id="description" name="description"><?php echo Input::post('description'); ?></textarea>
	                
	                <em>Une brève description de ce qui est publié. Ça sera mis dans l’introduction, dans le flux RSS et dans <code>&lt;meta name="description" /&gt;</code>.</em>
	            </p>
	            
				<p>
				    <label for="html">Contenu :</label>
				    <textarea id="html" name="html"><?php echo Input::post('html'); ?></textarea>
				    
				    <em>Le contenu de l’article. Mettez une bonne dose de HTML valide.</em>
				</p>
				
				<p>
				    <label>Statut:</label>
	    			<select id="status" name="status">
	    				<?php foreach(array('draft', 'archived', 'published') as $status): ?>
	    				<?php $selected = (Input::post('status') == $status) ? ' selected' : ''; ?>
	    				<option value="<?php echo $status; ?>"<?php echo $selected; ?>>
	    					<?php echo ucwords($status); ?>
	    				</option>
	    				<?php endforeach; ?>
	    			</select>
	    			
	    			<em>Les statuts : publié (published), Brouillon (draft), ou caché (archived).</em>
				</p>
				
				<p>
				    <label for="comments">Autoriser les commentaires :</label>
				    <input id="comments" name="comments" type="checkbox" value="1"<?php if(Input::post('comments')) echo ' checked'; ?>>
				    <em>Ceci permettra au public de donner son avis.</em>
				</p>
			</fieldset>
		
		</div>
		<div data-tab="customise" class="tab">

			<fieldset>
			    <legend>Personnaliser</legend>
			    <em>Ici, vous pouvez personnaliser vos articles. Cette section est optionnelle.</em>
			    
			    <p>
			        <label for="css">CSS personnel :</label>
			        <textarea id="css" name="css"><?php echo Input::post('css'); ?></textarea>
			        
			        <em>Un peu de CSS en plus. Ça sera mis dans un bloc <code>&lt;style&gt;</code>.</em>
			    </p>

	            <p>
	                <label for="js">JS personnalisé :</label>
	                <textarea id="js" name="js"><?php echo Input::post('js'); ?></textarea>
	                
	                <em>Pour quelque chose de classe. Tout est emballé dans un bloc <code>&lt;script&gt;</code>.</em>
	            </p>
			</fieldset>
		
		</div>
		<div data-tab="fields" class="tab">

			<fieldset>
			    <legend>Autres champs</legend>
			    <em>Ajoutez ce que vous voulez ici.</em>

				<div id="fields">
					<!-- Re-Populate post data -->
					<?php foreach(Input::post('field', array()) as $data => $value): ?>
					<?php list($key, $label) = explode(':', $data); ?>
					<p>
						<label><?php echo $label; ?></label>
						<input name="field[<?php echo $key; ?>:<?php echo $label; ?>]" value="<?php echo $value; ?>">
					</p>
					<?php endforeach; ?>
				</div>
			</fieldset>

			<button id="create" type="button">Créer un champ personnalisé</button>
		</div>
			
		<p class="buttons">
			<button type="submit">Create</button>
			<a href="<?php echo admin_url('posts'); ?>">Return to posts</a>
		</p>
	</form>

</section>

<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.1/mootools-yui-compressed.js"></script>
<script>window.MooTools || document.write('<script src="<?php echo theme_url('assets/js/mootools.js'); ?>"><\/script>');</script>
<script src="<?php echo theme_url('assets/js/helpers.js'); ?>"></script>
<script src="<?php echo theme_url('assets/js/popup.js'); ?>"></script>
<script src="<?php echo theme_url('assets/js/custom_fields.js'); ?>"></script>
<script src="<?php echo theme_url('assets/js/tabs.js'); ?>"></script>
<script>
	(function() {
		var slug = $('slug'), output = $('output');

		// call the function to init the input text
		formatSlug(slug, output);

		// bind to input
		slug.addEvent('keyup', function() {formatSlug(slug, output)});
	}());
</script>
