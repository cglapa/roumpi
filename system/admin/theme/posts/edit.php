
<h1>Éditer &ldquo;<?php echo truncate($article->title, 4); ?>&rdquo;</h1>

<?php echo Notifications::read(); ?>

<section class="content">
	<nav class="tabs">
		<ul>
			<li><a href="#post">Article</a></li>
			<li><a href="#customise">Personnaliser</a></li>
			<li><a href="#fields">Champs personnalisés</a></li>
			<li>
			    <a href="#comments">Commentaires			    
			    <?php if($pending > 0): ?>
			        <span title="You have <?php echo $pending; ?> comments"><?php echo $pending; ?></span>
			    <?php endif; ?>
	            </a>
	        </li>
		</ul>
	</nav>
	<form method="post" action="<?php echo Url::current(); ?>" novalidate>

		<div data-tab="post" class="tab">

			<fieldset>
				<p>
	    			<label for="title">Titre :</label>
	    			<input id="title" name="title" value="<?php echo Input::post('title', $article->title); ?>">
	    			
	    			<em>Le titre de votre article.</em>
	    		</p>
				
				<p>
				    <label for="slug">Identifiant:</label>
				    <input type="url" id="slug" autocomplete="off" name="slug" value="<?php echo Input::post('slug', $article->slug); ?>">
				    
				    <em>L’identifiant de votre article (<code id="output">identifiant</code>).</em>
				</p>
				
	            <p>
	                <label for="description">Description :</label>
	                <textarea id="description" name="description"><?php echo Input::post('description', $article->description); ?></textarea>
	                
	                <em>Une petite description de l’article. Ça sera utilisé dans l’introduction, dars le flux RSS et dans <code>&lt;meta name="description" /&gt;</code>.</em>
	            </p>
	            
				<p>
				    <label for="html">Contenu:</label>
				    <textarea id="html" name="html"><?php echo Input::post('html', $article->html); ?></textarea>
				    
				    <em>Le contenu. Mettez-y une bonne dose de HTML valide.</em>
				</p>
				
				<p>
				    <label>Statut :</label>
	    			<select id="status" name="status">
	    				<?php foreach(array('draft', 'archived', 'published') as $status): ?>
	    				<?php $selected = (Input::post('status', $article->status) == $status) ? ' selected' : ''; ?>
	    				<option value="<?php echo $status; ?>"<?php echo $selected; ?>>
	    					<?php echo ucwords($status); ?>
	    				</option>
	    				<?php endforeach; ?>
	    			</select>
	    			
	    			<em>Statuts : publié (published), brouillon (draft), ou caché (archived).</em>
				</p>
				
				<p>
				    <label for="comments">Autoriser les commentaires :</label>
				    <input id="comments" name="comments" type="checkbox" value="1"<?php if(Input::post('comments', $article->comments)) echo ' checked'; ?>>
				    <em>Ceci permettra au public de donner son avis.</em>
				</p>
			</fieldset>
		
		</div>
		<div data-tab="customise" class="tab">

			<fieldset>
			    <legend>Personnaliser</legend>
			    <em>Ici, personnalisez vos articles. C’est évidemment optionnel.</em>
			    
			    <p>
			        <label for="css">CSS perso :</label>
			        <textarea id="css" name="css"><?php echo Input::post('css', $article->css); ?></textarea>
			        
			        <em>CSS personnalisé, qui sera affiché dans un bloc <code>&lt;style&gt;</code>.</em>
			    </p>

	            <p>
	                <label for="js">JS perso :</label>
	                <textarea id="js" name="js"><?php echo Input::post('js', $article->js); ?></textarea>
	                
	                <em>Du Javascript personnalisé, qui sera bien emballé dans un bloc <code>&lt;script&gt;</code>.</em>
	            </p>
			</fieldset>
		
		</div>
		<div data-tab="fields" class="tab">

			<fieldset>
			    <legend>Champs personnalisés</legend>
			    <em>Mettez-y ce que vous voulez.</em>

				<div id="fields">
					<!-- Re-Populate data -->
					<?php foreach(parse_fields($article->custom_fields) as $key => $data): ?>
					<p>
						<label><?php echo $data['label']; ?></label>
						<input name="field[<?php echo $key; ?>:<?php echo $data['label']; ?>]" value="<?php echo $data['value']; ?>">
					</p>
					<?php endforeach; ?>
					
					<!-- Re-Populate post data -->
					<?php foreach(Input::post('field', array()) as $data => $value): ?>
					<?php list($key, $label) = explode(':', $data); ?>
					<p>
						<label><?php echo $label; ?></label>
						<input name="field[<?php echo $key; ?>:<?php echo $label; ?>]" value="<?php echo $value; ?>">
					</p>
					<?php endforeach; ?>
				</div>
				
				
				<button id="create" type="button">Créer un champ personnilsé</button>
			</fieldset>
		
		</div>
		<div data-tab="comments" class="tab">

			<fieldset>
			    <legend>Commentaires</legend>
			    <em>Modérez ici les commentaires.</em>

			    <?php if(count($comments)): ?>
			    <ul id="comments">
			    <?php foreach($comments as $comment):?>
			    <li data-id="<?php echo $comment->id; ?>">
			    	<header>
    			    	<p><strong><?php echo $comment->name; ?></strong> 
    			    	<?php echo date(Config::get('metadata.date_format'), $comment->date); ?><br>
    			    	<em>Statut : <span data-status="<?php echo $comment->id; ?>"><?php echo $comment->status; ?></span></em></p>
    			    </header>
    			    
			    	<p class="comment" data-text="<?php echo $comment->id; ?>"><?php echo $comment->text; ?></p>
			    	
			    	<ul class="options">
			    		<?php if($comment->status == 'pending'): ?>
			    		<li><a href="#publish">Publier</a></li>
			    		<?php endif; ?>
			    		<li><a href="#edit">Editer</a></li>
			    		<li><a href="#delete">Supprimer</a></li>
		    		</ul>
			    </li>
			    <?php endforeach; ?>
			    </ul>
			    <?php else: ?>
			    <p>Pas d’avis. Pour le moment.</p>
			    <?php endif; ?>
			</fieldset>
		
		</div>

		<p class="buttons">
			<button name="save" type="submit">Enregistrer</button>
			<button name="delete" type="submit">Supprimer</button>
			<a href="<?php echo admin_url('posts'); ?>">Retourner à la liste.</a>
		</p>
		
	</form>
</section>

<aside id="sidebar">
	<h2>Éditer</h2>
	<em>Quelques liens utiles</em>
	<ul>
		<li><a href="<?php echo Url::make($page->slug . '/' . $article->slug); ?>">Voir ceci sur votre site</a></li>
	</ul>
</aside>

<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.1/mootools-yui-compressed.js"></script>
<script>window.MooTools || document.write('<script src="<?php echo theme_url('assets/js/mootools.js'); ?>"><\/script>');</script>
<script src="<?php echo theme_url('assets/js/helpers.js'); ?>"></script>
<script src="<?php echo theme_url('assets/js/popup.js'); ?>"></script>
<script src="<?php echo theme_url('assets/js/custom_fields.js'); ?>"></script>
<script src="<?php echo theme_url('assets/js/comments.js'); ?>"></script>
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
