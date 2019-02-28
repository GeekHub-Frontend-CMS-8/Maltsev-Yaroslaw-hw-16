<?php get_header() ?>
	<h1>
		PAGE-BLOG PHP
	</h1>	
	<ul class="blog-list">
		<?php foreach(getPostsInfo() as $post): ?>
			<li class="blog-list__item">
				<?php //the_post_thumbnail( 'full', 'class="blog__img"' ) ?>
				<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>" class="blog__img">
				<div class="blog__text">
					<h3 class="blog__title">
						<?php echo the_title(); ?>
						<?php //echo esc_html( kama_excerpt([ 'text'=>the_title(), 'maxchar'=>100 ]) );	?>
					</h3>
					<div class="blog__desc">
						<?php //echo $post->post_content; ?>
						<?php echo esc_html( kama_excerpt([ 'text'=>$post->post_content, 'maxchar'=>350 ]) );	?>
					</div>
					<div class="blog__button-container">
						<button class="blog__button" style="cursor: pointer;" onclick="document.location.href='<?php the_permalink() ?>'">
							Read more
						</button>
					</div>
					<div class="post__info">
						<p class="post__date--blog">
							<?php echo date('d/m/Y', strtotime($post->post_date)); ?>
						</p>
						<p class="post__comments-number--blog">
							<?php the_ID() ?>
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