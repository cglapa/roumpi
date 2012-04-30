<h1>Éditer &ldquo;<?php echo truncate($page->name, 4); ?>&rdquo;</h1>

<?php echo Notifications::read(); ?>

<section class="content">

	<form method="post" action="<?php echo Url::current(); ?>" novalidate>
		<fieldset>
			<p>
    			<label for="name">Nom :</label>
    			<input id="name" name="name" value="<?php echo Input::post('name', $page->name); ?>">
    			
    			<em>Le nom de la page, tel qu’il sera affiché dans le menu.</em>
    		</p>
			
			<p>
			    <label>Titre :</label>
			    <input id="title" name="title" value="<?php echo Input::post('title', $page->title); ?>">
			    
			    <em>Le titre de la page. Il s’affiche dans <code>&lt;title&gt;</code>.</em>
			</p>
			
			<p>
			    <label for="slug">Identifiant :</label>
			    <input id="slug" autocomplete="off" name="slug" value="<?php echo Input::post('slug', $page->slug); ?>">
			    
			    <em>Un identifiant pour votre page (<code id="output">identifiant</code>).</em>
			</p>
			
			<p>
			    <label for="content">Contenu :</label>
			    <textarea id="content" name="content"><?php echo Input::post('content', $page->content); ?></textarea>
			    
			    <em>Le contenu de votre page. Mettez-y du HTML valide.</em>
			</p>
			
			<p>
			    <label>Statut :</label>
    			<select id="status" name="status">
    				<?php foreach(array('draft', 'archived', 'published') as $status): ?>
    				<?php $selected = (Input::post('status', $page->status) == $status) ? 'selected' : ''; ?>
    				<option value="<?php echo $status; ?>"<?php echo $selected; ?>>
    					<?php echo ucwords($status); ?>
    				</option>
    				<?php endforeach; ?>
    			</select>
    			
    			<em>Voulez-vous que votre page soit publique (published), en attente (draft), ou cachée (archived)?</em>
			</p>
		</fieldset>
			
		<p class="buttons">

			<button name="save" type="submit">Enregistrer</button>
			<?php 
			// Dont delete our posts page or home page
			if(in_array($page->id, array(Config::get('metadata.home_page'), Config::get('metadata.posts_page'))) === false): ?>
			<button name="delete" type="submit">Supprimer</button>
			<?php endif; ?>
			
			<a href="<?php echo admin_url('pages'); ?>">Retourner à la liste</a>
		</p>
	</form>

</section>

<aside id="sidebar">
	<h2>Éditer</h2>
	<em>Quelques liens utiles.</em>
	<ul>
		<li><a href="<?php echo Url::make($page->slug); ?>">Voir cette page sur le site</a></li>
	</ul>
</aside>

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

