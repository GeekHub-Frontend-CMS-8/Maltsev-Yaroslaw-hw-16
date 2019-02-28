<?php get_header(); ?>

	<div class="center">
		<div class="post-wrapper">
			<section class="post">
				<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>" alt="" class="post__img">
				<h3 class="post__title">
					<?php echo the_title(); ?>
				</h3>
				<div class="post__info">
					<p class="post__date">
						<?php echo date('d/m/Y', strtotime($post->post_date)); ?>
					</p>
					<p class="post__comments-number">
						201
					</p>
					<p class="post__likes-number">
						400
					</p>
				</div>
				<p class="post__text">
					<?php echo $post->post_content; ?>
				</p>
				<div class="post__share">
					<p class="share__text">
						share
					</p>
					<div class="share__button share__button--facebook"></div>
					<div class="share__button share__button--twitter"></div>
					<div class="share__button share__button--pinterest"></div>
				</div>
			</section>

			<section class="comments">
				<h1 class="comments__title section-title">
					10 Comments
				</h1>
				<ul class="comments-list">
					<li class="comments-list__item">
						<div class="comments__user-info">
							<div class="comments__main-info">
									<h3 class="comments__user-name">
										Name
									</h3>
									<p class="comments__date">
										02 June 2014, 15:20
									</p>								
							</div>
							<div class="comments__reply">
								<p class="comments__reply-button">
									Reply
								</p>
							</div>
						</div>
						<div class="comments__content">
							<div class="comments__avatar-block">
								<img src="" class="comments__avatar-img">
							</div>
							<div class="comments__text-block">
								<p class="comments__text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque molestie, purus id mollis pharetra, lacus turpis dapibus magna, eget aliquam diam erat at velit.
								</p>
							</div>
						</div>
					</li>
					<li class="comments-list__item comments-list__item--answer">
						<div class="comments__user-info">
							<div class="comments__main-info">
									<h3 class="comments__user-name">
										Name
									</h3>
									<p class="comments__date">
										02 June 2014, 15:20
									</p>								
							</div>
							<div class="comments__reply">
								<p class="comments__reply-button">
									Reply
								</p>
							</div>
						</div>
						<div class="comments__content">
							<div class="comments__avatar-block">
								<img src="" class="comments__avatar-img">
							</div>
							<div class="comments__text-block">
								<p class="comments__text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque molestie, purus id mollis pharetra, lacus turpis dapibus magna, eget aliquam diam erat at velit.
								</p>
							</div>
						</div>
					</li>					
				</ul>
			</section>

			<section class="leave-comment">
				<h1 class="section-title">
					Leave a comment
				</h1>
				<?php comments_template() ?>	
				<form action="post" class="comment-form">
					<label for="name"></label>
					<input type="text" name="name" placeholder="Name">
					<label for="email"></label>
					<input type="email" name="email" placeholder="E-mail">
					<label for="site"></label>
					<input type="text" name="site" placeholder="Web Site">
					<label for="job"></label>
					<input type="text" name="job" placeholder="Job">
					<textarea placeholder="Comment"></textarea>
					<button type="submit">
						Send
					</button>
				</form>
				<p class="leave-comment__text">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis semper nisl, vitae malesuada massa egestas a. Vestibulum vestibulum urna sapien, eu bibendum magna ornare non.
				</p>
			</section>
		</div>		
	</div>
<?php get_footer() ?>