const $menuBtn = document.getElementById('menuBtn');
const $navbar = document.getElementById('navbar');
const $iconOpen = document.getElementById('iconOpen');
const $iconClose = document.getElementById('iconClose');
const $close = document.getElementById('close');
const $msj = document.getElementsByClassName('message-session');

$menuBtn.addEventListener('click', () => {
	$navbar.classList.toggle('hidden');
	$iconOpen.classList.toggle('hidden');
	$iconClose.classList.toggle('hidden');
});

$close.addEventListener('click', () => {
   $msj[0].classList.add('hidden');
});

