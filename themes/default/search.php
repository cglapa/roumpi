<section class="content">
    
    <h2>Vous avez recherché « <?php echo search_term(); ?> ».</h2>
    
    <?php if(has_search_results()): ?>
        <p>À celà, nous avons trouvé <?php echo total_search_results(); ?> <?php echo pluralise(total_search_results(), 'result'); ?> for &ldquo;<?php echo search_term(); ?>&rdquo;</p>
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

        <p><?php echo search_prev(); ?> <?php echo search_next(); ?></p>

    <?php else: ?>
        <p>Malheureusement, nous n’avons rien trouvé à propos de <em><?php echo search_term(); ?></em>. L’avez-vous correctement écrit ?</p>
    <?php endif; ?>
    
</section>

