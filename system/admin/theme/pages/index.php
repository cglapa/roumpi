<h1>Listes des pages <a href="<?php echo admin_url('pages/add'); ?>">En écrire une nouvelle</a></h1>

<?php echo Notifications::read(); ?>
	
<section class="content">
	<?php if($pages->length()): ?>
    	<ul class="list">
    	    <?php foreach($pages as $page): ?>
    	    <li>
    	        <a href="<?php echo admin_url('pages/edit/' . $page->id); ?>">
    	            <strong><?php echo truncate($page->name, 4); ?></strong>
    	            <i class="status"><?php echo ucwords($page->status); ?></i>
    	        </a>
    	    </li>
    	    <?php endforeach; ?>
    	</ul>
	<?php else: ?>
    	<p>Il n’y a pas encore de pages. Pourquoi ne pas <a href="<?php echo admin_url('pages/add'); ?>">en écrire une nouvelle</a>?</p>
	<?php endif; ?>
</section>
