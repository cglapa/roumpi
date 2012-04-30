
<h1>Ajouter une page</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" novalidate>
		<fieldset>
			<p>
    			<label for="name">Nom :</label>
    			<input id="name" name="name" value="<?php echo Input::post('name'); ?>">
    			
    			<em>Le nom de votre page. Tel qu’il sera affiché dans le menu.</em>
    		</p>
			
			<p>
			    <label>Titre :</label>
			    <input id="title" name="title" value="<?php echo Input::post('title'); ?>">
			    
			    <em>Le titre de votre page, qui sera affiché dans <code>&lt;title&gt;</code>.</em>
			</p>
			
			<p>
			    <label for="slug">Identifiant :</label>
			    <input id="slug" autocomplete="off" name="slug" value="<?php echo Input::post('slug'); ?>">
			    
			    <em>L’identifiant pour l’url (<code><?php echo $_SERVER['HTTP_HOST']; ?>/<span id="output">slug</span></code>).</em>
			</p>
			
			<p>
			    <label for="content">Contenu:</label>
			    <textarea id="content" name="content"><?php echo Input::post('content'); ?></textarea>
			    
			    <em>Le contenu de votre page. Mettez-y du HTML valide.</em>
			</p>
			
			<p>
			    <label>Statut :</label>
    			<select id="status" name="status">
    				<?php foreach(array('draft', 'archived', 'published') as $status): ?>
    				<option value="<?php echo $status; ?>" <?php if(Input::post('status') == $status) echo 'selected'; ?>>
    					<?php echo ucwords($status); ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>Voulez vous que votre page soit affichée (published), en attente (draft), ou cachée (archived)?</em>
			</p>
		</fieldset>
			
		<p class="buttons">
			<button type="submit">Create</button>
			<a href="<?php echo admin_url('pages'); ?>">Retourner voir la liste des pages</a>
		</p>
	</form>

</section>

<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.1/mootools-yui-compressed.js"></script>
<script>window.MooTools || document.write('<script src="<?php echo theme_url('assets/js/mootools.js'); ?>"><\/script>');</script>

<script src="<?php echo theme_url('assets/js/helpers.js'); ?>"></script>

<script>
	(function() {
		var slug = $('slug'), output = $('output');

		// call the function to init the input text
		formatSlug(slug, output);

		// bind to input
		slug.addEvent('keyup', function() {formatSlug(slug, output)});
	}());
</script>


