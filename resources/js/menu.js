const $menuBtn = document.getElementById('menuBtn');
const $navbar = document.getElementById('navbar');
const $iconOpen = document.getElementById('iconOpen');
const $iconClose = document.getElementById('iconClose');

$menuBtn.addEventListener('click', () => {
	$navbar.classList.toggle('hidden');
	$iconOpen.classList.toggle('hidden');
	$iconClose.classList.toggle('hidden');
});