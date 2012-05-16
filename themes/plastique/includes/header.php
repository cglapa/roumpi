<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title><?php echo page_title('Page non trouvée'); ?> - <?php echo site_name(); ?></title> 

		<meta name="description" content="<?php echo site_description(); ?>">

		<link rel="stylesheet" href="<?php echo theme_url('/css/reset.css'); ?>">
		
		
		<link rel="stylesheet" href="<?php echo theme_url('/css/style.css'); ?>">
		
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">

		<script src="//code.jquery.com/jquery-latest.min.js"></script>
		<script>var base = '<?php echo theme_url(); ?>';</script>
		<!--<script src="<?php echo theme_url('/js/main.js'); ?>"></script>-->
		
		<?php if(customised()): ?>
		    <!-- Custom CSS -->
    		<style><?php echo article_css(); ?></style>
    		
    		<!--  Custom Javascript -->
    		<script><?php echo article_js(); ?></script>
		<?php endif; ?>
	</head>
	<body>
	
		<div id="search">		<?php if(has_menu_items()): ?>
		<nav id="main" role="navigation">
			<ul>
				<?php while(menu_items()): ?>
				<li <?php echo (menu_active() ? 'class="active"' : ''); ?>>
					<a href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>">
						<?php echo menu_name(); ?>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</nav>
		<?php endif; ?>
		</div><!--<form id="search" action="<?php echo search_url(); ?>" method="post">
			<input type="search" name="term" placeholder="Pour rechercher, tapez le texte puis sur entrée&hellip;" value="<?php echo search_term(); ?>">
		</form>-->
	
		<header id="top">
			<div class="wrap">
				
				<a id="logo" href="<?php echo base_url(); ?>"><img src="<?php echo theme_url('/img/logo.png'); ?>" alt="<?php echo site_name(); ?>"></a>

				<p class="description"><?php echo site_description(); ?></p>
			</div>
		</header>
