import emailjs from '@emailjs/browser';

const $form = document.getElementById('form');
console.log($form);
$form.addEventListener('submit', e => {
  e.preventDefault();

  emailjs.sendForm('service_p0s6a5l', 'template_yyt39bn', '#form', 'FFmUcw1xH_OIsxk-m')
  .then(function (response) {
    $form.reset();
    console.log('SUCCESS!', response.status, response.text);
  }, function (error) {
    console.log('FAILED...', error);
  });
});