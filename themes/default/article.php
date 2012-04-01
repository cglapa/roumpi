<section class="content" id="article-<?php echo article_id(); ?>">
    <h2><?php echo article_title(); ?></h2>
	
	<article>
	    <?php echo article_html(); ?>
	</article>


<?php include 'includes/comment_form.php'; ?>

<footer class="footnote">
	<p>Cet article est le <?php echo numeral(article_id()); ?> que j’ai publié. J’y ai écrit <?php echo count_words(article_html()); ?> mots. 
	<?php echo article_custom_field('attribution'); ?></p>
</footer>
</section>

