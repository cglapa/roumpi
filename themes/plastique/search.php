<div id="content-bg">
<section class="content">
    
    <h1>Vous avez recherché « <?php echo search_term(); ?> ».</h1>
    
    <?php if(has_search_results()): ?>
        <p>Nous avons trouvé <?php echo total_search_results(); ?> <?php echo pluralise(total_search_results(), 'resultat'); ?> pour « <?php echo search_term(); ?> »</p>
        <ul class="items wrap">
			<?php while(search_results()): ?>
			<li>
				<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>">
				    <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>
				    <h2><?php echo article_title(); ?></h2>
				</a>
			</li>
			<?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Malheureusement, il n’y a pas de résultat pour « <?php echo search_term(); ?> ». L’avez-vous correctement écrit ?</p>
    <?php endif; ?>
    
</section>
</div>
<?php echo my_last_tweet(); ?>
