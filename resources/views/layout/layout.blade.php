<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		@vite('resources/css/app.css')
		<title>Stacc | @yield('title', 'Bienvenido')</title>
	</head>
	<body>
		<div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
			<div class="relative flex items-center justify-between">
				<div class="flex items-center">
					<a href="/" aria-label="Company" title="Company" class="inline-flex items-center mr-8">
						<img
							src="{{ asset('src/assets/images/logos/logo_red.png') }}"
							alt="stacc logo"
							width="80"
						>
					</a>
					<ul class="flex items-center hidden space-x-8 lg:flex">
						<li>
							<a
								href="{{ route('home.index') }}"
								aria-label="Our product"
								title="Home"
								class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400"
							>Home</a>
						</li>
						<li>
							<a
								href="{{ route('locals.index') }}"
								aria-label="Our product"
								title="Locales"
								class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400"
							>Locales</a>
						</li>
						<li>
							<a
								href="{{ route('contact.index') }}"
								aria-label="Product pricing"
								title="Contacto"
								class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400"
							>Contacto</a>
						</li>
						@auth()
						<li>
							<a href="{{ route('logout.index') }}">Logout</a>
						</li>
						@endauth
					</ul>
				</div>
				<ul class="flex items-center hidden space-x-8 lg:flex">
					<li>
						<a
							href="{{ route('login.index') }}"
							aria-label="Iniciar sesion"
							title="Iniciar sesion"
							class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400"
						>Iniciar sesion</a>
					</li>
					<li>
						<a
							href="{{ route('register.create') }}"
							class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-gradient-to-r from-stacc-purple to-stacc-red focus:shadow-outline focus:outline-none"
							aria-label="Register"
							title="Register"
						>
							Registrate
						</a>
					</li>
				</ul>
				<!-- Mobile menu -->
				<div class="lg:hidden">
					<button aria-label="Open Menu" title="Open Menu" class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50">
						<svg class="w-5 text-gray-600" viewBox="0 0 24 24">
							<path fill="currentColor" d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
							<path fill="currentColor" d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
							<path fill="currentColor" d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
						</svg>
					</button>
					<!-- Mobile menu dropdown
					<div class="absolute top-0 left-0 w-full">
						<div class="p-5 bg-white border rounded shadow-sm">
							<div class="flex items-center justify-between mb-4">
								<div>
									<a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
										<svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
											<rect x="3" y="1" width="7" height="12"></rect>
											<rect x="3" y="17" width="7" height="6"></rect>
											<rect x="14" y="1" width="7" height="6"></rect>
											<rect x="14" y="11" width="7" height="12"></rect>
										</svg>
										<span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Company</span>
									</a>
								</div>
								<div>
									<button aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
										<svg class="w-5 text-gray-600" viewBox="0 0 24 24">
											<path
												fill="currentColor"
												d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
											></path>
										</svg>
									</button>
								</div>
							</div>
							<nav>
								<ul class="space-y-4">
									<li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Product</a></li>
									<li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Features</a></li>
									<li><a href="/" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pricing</a></li>
									<li><a href="/" aria-label="About us" title="About us" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">About us</a></li>
									<li><a href="/" aria-label="Sign in" title="Sign in" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Sign in</a></li>
									<li>
										<a
											href="/"
											class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
											aria-label="Sign up"
											title="Sign up"
										>
											Sign up
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
{{--		<header>--}}
{{--			<ul class="flex justify-between">--}}
{{--				<li>--}}
{{--					<a href="{{ route('home.index') }}">Home</a>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<a href="{{ route('locals.index') }}">Locales</a>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<a href="{{ route('login.index') }}">Inicias sesion</a>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<a href="{{ route('register.create') }}">Registrate</a>--}}
{{--				</li>--}}
{{--				@auth()--}}
{{--					<li>--}}
{{--						<a href="{{ route('logout.index') }}">Logout</a>--}}
{{--					</li>--}}
{{--				@endauth--}}
{{--			</ul>--}}
{{--		</header>--}}
		<main>
			@yield('content')
		</main>
		
		<footer class="bg-gradient-to-r from-stacc-purple to-stacc-red">
			<div class="px-4 pt-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
				<div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
					<div class="md:max-w-md lg:col-span-2">
						<a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
							<img src="{{ asset('src/assets/images/logos/logo_white.png') }}" alt="stacc" width="100">
						</a>
						<div class="mt-4 lg:max-w-sm">
							<p class="text-sm text-deep-purple-50">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
							</p>
							<p class="mt-4 text-sm text-deep-purple-50">
								Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
							</p>
						</div>
					</div>
					<div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-4">
						<div>
							<p class="font-semibold tracking-wide text-teal-accent-400">
								Category
							</p>
							<ul class="mt-2 space-y-2">
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">News</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">World</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Games</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">References</a>
								</li>
							</ul>
						</div>
						<div>
							<p class="font-semibold tracking-wide text-teal-accent-400">Cherry</p>
							<ul class="mt-2 space-y-2">
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Web</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">eCommerce</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Business</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Entertainment</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Portfolio</a>
								</li>
							</ul>
						</div>
						<div>
							<p class="font-semibold tracking-wide text-teal-accent-400">Apples</p>
							<ul class="mt-2 space-y-2">
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Media</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Brochure</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Nonprofit</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Educational</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Projects</a>
								</li>
							</ul>
						</div>
						<div>
							<p class="font-semibold tracking-wide text-teal-accent-400">
								Business
							</p>
							<ul class="mt-2 space-y-2">
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Infopreneur</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Personal</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Wiki</a>
								</li>
								<li>
									<a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Forum</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="flex flex-col justify-between pt-5 pb-10 border-t border-deep-purple-accent-200 sm:flex-row">
					<p class="text-sm text-gray-100">
						© Copyright 2022 Stacc Inc. All rights reserved.
					</p>
					<div class="flex items-center mt-4 space-x-4 sm:mt-0">
						<a href="/" class="text-white">
							<svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
								<path
									d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
								></path>
							</svg>
						</a>
						<a href="/" class="text-white">
							<svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
								<circle cx="15" cy="15" r="4"></circle>
								<path
									d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
								></path>
							</svg>
						</a>
						<a href="/" class="text-white">
							<svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
								<path
									d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
								></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</footer>
		
	</body>
</html>