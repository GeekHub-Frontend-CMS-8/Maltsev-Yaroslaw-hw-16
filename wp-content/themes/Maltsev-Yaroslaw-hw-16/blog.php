<?php
	/*
	Template Name: Page Blog
	Template Post Type: page
	*/
?>
<?php get_header() ?>
	<h1>
		PAGE-BLOG PHP
	</h1>	
	<ul class="blog-list">
		<?php foreach(getPostInfo() as $post): ?>
			<li class="blog-list__item">
				<?php //the_post_thumbnail( 'full', 'class="blog__img"' ) ?>
				<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>" class="blog__img">
				<div class="blog__text">
					<h3 class="blog__title">
						<?php //echo $post->post_title;?>
						<?php echo the_title(); ?>
					</h3>
					<div class="blog__desc">
						<?php echo $post->post_content; ?>
						<?php //the_excerpt() ?>
					</div>
					<div class="blog__button-container">
						<button class="blog__button" style="cursor: pointer;">
							Read more
						</button>	
					</div>
					<div class="post__info">
						<p class="post__date--blog">
							<?php //echo the_date('d/m/Y') ?>
							<?php //echo $post->post_date ?>
							<?php echo date('d/m/Y', strtotime($post->post_date)); ?>
						</p>
						<p class="post__comments-number--blog">
							201
						</p>
					</div>				
				</div>
			</li>
		<?php endforeach; ?>	
	</ul>
	<a href="#top" class="button button--top">
		<
	</a>

	<?php get_footer() ?>