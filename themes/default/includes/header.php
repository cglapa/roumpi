<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>

		<meta name="description" content="<?php echo site_description(); ?>">

		<link rel="stylesheet" href="<?php echo theme_url('/css/reset.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/bootstrap.css'); ?>">
		
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">

		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script src="//code.jquery.com/jquery-latest.min.js"></script>
		<script>var base = '<?php echo theme_url(); ?>';</script>
		<script src="<?php echo theme_url('/js/main.js'); ?>"></script>
		<script src="<?php echo theme_url('/js/bootstrap-collapse.js'); ?>"></script>

		
	    <meta name="viewport" content="width=device-width">
		
		<?php if(customised()): ?>
		    <!-- Custom CSS -->
    		<style><?php echo article_css(); ?></style>
    		
    		<!--  Custom Javascript -->
    		<script><?php echo article_js(); ?></script>
		<?php endif; ?>
	</head>
	<body data-spy="scroll" data-target=".subnav" data-offset="10">
	
		<form id="search" action="<?php echo search_url(); ?>" method="post">
			<input type="search" name="term" placeholder="Pour rechercher quelque chose, tapez le et cliquez sur entrée…" value="<?php echo search_term(); ?>">
		</form>
	
		<header id="top">

    	<h1><a id="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/themes/default/img/logo.png" alt="Logo de Roumpi"></a></h1>
			<div class="wrap">
				
				<!--<?php echo site_name(); ?></a>-->
	
				<?php if(has_menu_items()): ?>
				        <div class="subnav">
          <ul class="nav nav-pills">
<!--				<nav id="main" role="navigation">
					<ul>-->
						<?php while(menu_items()): ?>
						<li <?php echo (menu_active() ? 'class="active"' : ''); ?>>
							<a href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>">
								<?php echo menu_name(); ?>
							</a>
						</li>
						<?php endwhile; ?>
						<li class="search"></li>
					</ul>
				<!--</nav>-->
</div></div>
				<?php endif; ?>
			</div>
		</header>
