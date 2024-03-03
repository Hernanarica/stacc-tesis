const $btnMenuOpen = document.getElementById('btnMenuOpen')
const $btnMenuClose = document.getElementById('btnMenuClose')
const $menuMob = document.getElementById('menuMob')

$btnMenuClose.addEventListener('click', () => {
  $menuMob.classList.toggle('hidden');
});

$btnMenuOpen.addEventListener('click', () => {
  $menuMob.classList.toggle('hidden');
});

