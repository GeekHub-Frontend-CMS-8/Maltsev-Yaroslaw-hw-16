<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<title><?php the_title() ?></title>
	<?php 
	wp_head();
	?>
</head>
<body>
	<header class="header">
		<menu class="menu">
			<div class="menu__img menu__img--close" id="menuButtonOpen">
				
			</div>
			<div class="menu--open" id="menu--open">
				<div class="menu__img menu__img--open" id="menuButtonClose">
					
				</div>
				<?php
						wp_nav_menu([
								// 'menu' => '',
							'theme_location' => 'header-menu',
							/*'container' => false,
							'menu_class' => 'menu-list',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'depth' => 0,*/
						]);						
						?>				
				<!--<ul class="menu-list">
					<li class="menu-list__item" id="portfolio">
						Portfolio
						<!- <ul class="submenu submenu-list">
							<li class="submenu-list__item">
								Item 1
								<ul class="submenu--right">
									<li class="submenu--right__item">Subitem 1</li>
									<li class="submenu--right__item">Subitem 2</li>
									<li class="submenu--right__item">Subitem 3</li>
									<li class="submenu--right__item">Subitem 4</li>
									<li class="submenu--right__item">Subitem 5</li>
								</ul>
							</li>
						</ul> ->
					</li>	
				</ul>-->
			</div>
		</menu>

		<a href="<?php get_template_directory_uri() ?>#top" class="logo logo--yellow" id="logo">
			
		</a>
		<div class="social-button social-button--header">
			<ul class="social-button-list">
				<!-- li.social-button-list__item*5 -->
				<li class="social-button-list__item social-button-list__item--mail"></li>
				<li class="social-button-list__item social-button-list__item--gp"></li>
				<li class="social-button-list__item social-button-list__item--pig"></li>
				<li class="social-button-list__item social-button-list__item--insta"></li>
				<li class="social-button-list__item social-button-list__item--twitter"></li>
				<li class="social-button-list__item social-button-list__item--facebook"></li>
			</ul>
		</div>
	</header>
