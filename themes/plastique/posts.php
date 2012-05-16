<?php setlocale(LC_ALL, 'fr_FR'); ?>
<div id="content-bg">
<?php if(has_posts()): ?>
    <ul class="items wrap">
    	<?php while(posts()): ?>
    	<li>
    		<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>">
    		    <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo utf8_encode (strftime(' %d  %B  %y',article_time())); ?></time>
    		    <h2><?php echo truncate(article_title(),5); ?></h2>
				<p class="article_desc"><?php echo article_description();?></p>
    		</a>
    	</li>
    	<?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>Il faudrait peut être écrire quelque chose !</p>
<?php endif; ?>
</div>
<?php echo my_last_tweet(); ?>
