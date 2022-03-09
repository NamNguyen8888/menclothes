var activeNav = document
	.querySelector('.header__menu__left__item')
	.querySelectorAll('a');
activeNav.forEach((e) => {
	e.addEventListener('click', function () {
		activeNav.forEach((el) => el.classList.remove('active'));
		this.classList.add('active');
	});
});

window.addEventListener('scroll', function () {
	var header = this.document.querySelector('.header');
	header.classList.toggle('sticky', window.scrollY > 80);
});
var openToggle = document.querySelector('.header__menu-mobile-toggle');
var closeToggle = document.querySelector('.header__menu__left__close');
var activeToggle = document.querySelector('.header__menu__left');
openToggle.addEventListener('click', function () {
	activeToggle.classList.toggle('active');
});
closeToggle.addEventListener('click', function () {
	activeToggle.classList.toggle('active');
});
