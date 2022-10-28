/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./resources/views/**/*.blade.php'
	],
	theme: {
		extend: {
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
