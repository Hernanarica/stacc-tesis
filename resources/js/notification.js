const $close = document.getElementById('close');
const $msj = document.getElementsByClassName('message-session');

$close.addEventListener('click', () => {
  $msj[0].classList.add('hidden');
});

setTimeout(() => {
  $msj[0].classList.add('hidden');
}, 4000);
