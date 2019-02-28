let doc = document;

let menu = doc.getElementById('menu--open'),
		menuButtonOpen = doc.getElementById('menuButtonOpen'),
 		menuButtonClose = doc.getElementById('menuButtonClose');

menuButtonClose.onclick = function() {
	menu.style.display = 'none';
	menuButtonClose.style.display = 'none';
	menuButtonOpen.style.display = 'block';
};

menuButtonOpen.onclick = function() {
	menu.style.display = 'flex';
	menuButtonOpen.style.display = 'none';
	menuButtonClose.style.display = 'block';
};


let mainSliderNumber = 1,
		sliderLength = document.getElementById('main-slider').children.length,
		allSlide = document.querySelectorAll('div.main-slider__item');

buildSlider()
allSlide[0].className += ' main-slider__item--active';

function sliderLeft() {
	if(mainSliderNumber == 1){
		mainSliderNumber = sliderLength
		allSlide[0].className = 'main-slider__item';		
	}
	else {
		mainSliderNumber--
		allSlide[mainSliderNumber].className = 'main-slider__item';		
	}
	allSlide[mainSliderNumber - 1].className += ' main-slider__item--active';
	buildSlider()	
}
function sliderRight() {
	if(mainSliderNumber == sliderLength){
		mainSliderNumber = 1
		allSlide[sliderLength - 1].className = 'main-slider__item';
	}
	else {
		mainSliderNumber++
		allSlide[mainSliderNumber - 2].className = 'main-slider__item';			
	}
	allSlide[mainSliderNumber - 1].className += ' main-slider__item--active';
	buildSlider()
}

function sliderPosition() {
	mainSliderNumber
}
function mainSliderNumberText() {
	let text = document.querySelectorAll('p.slide-number');
	for (let i = 0; i < sliderLength; i++) {
		text[i].innerHTML = mainSliderNumber + ' / ' + sliderLength;
	}
}
function buildSlider() {
	mainSliderNumberText()
}