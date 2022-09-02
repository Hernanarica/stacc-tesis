<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		@vite('resources/css/app.css')
		<title>Stacc | @yield('title', 'Bienvenido')</title>
	</head>
	<body>
		<header>
			<ul class="flex justify-between">
				<li>
					<a href="{{ route('home.index') }}">Home</a>
				</li>
				<li>
					<a href="{{ route('locals.index') }}">Locales</a>
				</li>
				<li>
					<a href="{{ route('login.index') }}">Inicias sesion</a>
				</li>
				<li>
					<a href="{{ route('register.create') }}">Registrate</a>
				</li>
				@auth()
					<li>
						<a href="{{ route('logout.index') }}">Logout</a>
					</li>
				@endauth
			</ul>
		</header>
		<main>
			@yield('content')
		</main>
		<footer>FOOTER</footer>
	</body>
</html>