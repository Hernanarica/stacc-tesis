/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./resources/views/**/*.blade.php',
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'
	],
	theme: {
		extend: {
			maxWidth: {
				'8xl': '1366px'
			},
			screens: {
				// 'wrapper': '1364px'
			},
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
	plugins: []
};
