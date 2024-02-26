/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'
  ],
  theme: {
    extend: {
      backgroundImage: {
        'local-bg': 'url(\'https://www.mibsas.com/wp-content/uploads/2017/05/CAMPOBRAVO-1200x900.jpg\')',
        'login': 'url(\'../../../public/src/assets/images/login.jpg\')',
      },
      maxWidth: {
        '8xl': '1366px'
      },
      screens: {},
      colors: {
        'stacc-red': '#fa1d37',
        'stacc-purple': '#941b7f'
      },
      fontFamily: {
        'quicksand': [ 'Quicksand' ],
        'raleway': [ 'Raleway' ]
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
  ]
};