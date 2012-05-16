<div id="content-bg">
<section class="content">

    <h1><?php echo article_title(); ?></h1>
	
	<article>
	    <?php echo article_html(); ?>
	</article>
</section>

<?php include('includes/comment_form.php'); ?>

<section class="footnote">
	<p><?php echo numeral(article_id()); ?> article publié. Il comporte <?php echo count_words(article_html()); ?> mots. </p>
</section>

</div>
<?php echo my_last_tweet(); ?>
