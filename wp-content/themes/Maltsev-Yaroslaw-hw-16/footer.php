	<footer>
		<div class="advert">
			<div class="advert__img">
				
			</div>
			<div class="advert__text">
				<h3 class="advert__title">
					fashion workshop
				</h3>
				<p class="advert__date-day">
					NOV 21-23
				</p>
				<p class="advert__time">
					9:00am - 4:00pm
				</p>
				<div class="rsvp">
					rsvp
				</div>
			</div>
		</div>

		<div class="news">
			<h3 class="news__title">
				NEWS
			</h3>
			<ul class="news-list">
				<?php foreach(getNews() as $post): ?>
					<li class="news-list__item">
						<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>" class="news-list__img">

						<div class="news-list__text">
							<h3 class="news-list__title">
								<!-- New Gallery Set -->
								<?php echo the_title(); ?>
							</h3>
							<p class="news-list__date">
								<!-- 09.12.2014 -->
								<?php echo date('d/m/Y', strtotime($post->post_date)); ?>
							</p>
							<p class="news-list__desc">
								<!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fringilla mi orci, ac venenatis ante venenatis eget. -->
								<?php echo $post->post_content; ?>
								<a href="<?php the_permalink() ?>" class="news-list__read-more">
									Read More
								</a>
							</p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="category">
			<div class="contact">
				<div class="logo logo--black">
					
				</div>
				<div class="contact-info">
					<p class="contact__number">
						+ 00 123 456 7890
					</p>
					<p class="contact__mail">
						info@square.com
					</p>
					<div class="social-button">
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
				</div>
			</div>
			<div class="twitter-repost">
				<div class="twitter-repost__img">
					
				</div>
				<?php foreach(getTwite() as $post): ?>
					<p class="twitter-repost__text">
						<!-- Unerdwear cookie liquorice. Cake donut cupcake lollipop soufflé candy. Chocolate oat cake @cheesecake tootsie roll. -->
						<?php echo $post->post_content; ?>
					</p>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="firms">
			<ul class="firms-list">
				<li class="firms-list__item firms-list__item--phaseone"></li>
				<li class="firms-list__item firms-list__item--manfrotto"></li>
				<li class="firms-list__item firms-list__item--hasselblad"></li>
				<li class="firms-list__item firms-list__item--broncolor"></li>
			</ul>
		</div>

		<div class="copyright">
			<p class="created-by">
				Created by 2ndself.com, with
			</p>
			<p>
				exclusive for theuncreativelab.com
			</p>
			<p class="reserved">
				© 2014 Square. All Rights Reserved.
			</p>
		</div>
	</footer>
	<?php wp_footer() ?>
	</body>
	</html>	