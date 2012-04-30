<h1>Articles <a href="<?php echo admin_url('posts/add'); ?>">En publier un nouveau</a></h1>

<?php echo Notifications::read(); ?>

<section class="content">
	<?php if($posts->length()): ?>
	<ul class="list">
	    <?php foreach($posts as $article): ?>
	    <li>
	        <a href="<?php echo admin_url('posts/edit/' . $article->id); ?>">
	            <strong><?php echo truncate($article->title, 4); ?></strong>
	            <span>Créé <time><?php echo date(Config::get('metadata.date_format'), $article->created); ?></time> 
	            by <?php echo $article->author; ?></span>
	            
	            <i class="status"><?php echo $article->status; ?></i>
	        </a>
	    </li>
	    <?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p>Aucun article maintenant. Pourquoi ne pas en <a href="<?php echo admin_url('posts/add'); ?>">écrire un neuf</a> ?</p>
	<?php endif; ?>
</section>
