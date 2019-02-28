<?php get_header() ?>
<section class="main-slider" id="main-slider">
	<?php foreach(getSlider() as $slider): ?>
		<div class="main-slider__item" style="background: url('<?php echo $slider['img'] ?>'); no-repeat center; background-size: 100% 100%;">
			<div class="main-slider__info">
				<div class="main-slider__text">
					<h3 class="main-slider__title" id="main-slider__title">
						<?php echo $slider['name'] ?>
					</h3>
					<p class="main-slider__prof" id="main-slider__prof">
						<?php echo $slider['Profession'] ?>
					</p>
					<p class="main-slider__desc">
						<?php echo $slider['description'] ?>
					</p>				
				</div>
				<div class="main-slider__controlle">
					<div>
						<button class="button-left main-slider__button main-slider__button-left" onclick="sliderLeft()">
							<
						</button>
						<button class="button-right main-slider__button main-slider__button-right" onclick="sliderRight()">
							>
						</button>
					</div>
					<p class="slide-number"></p>
				</div>
			</div>		
		</div>
	<?php endforeach; ?>		
	
</section>

<?php get_footer() ?>