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
			<ul>
				<li>
					<a href="{{ route('home.index') }}">Home</a>
				</li>
				<li>
					<a href="{{ route('locals.index') }}">Locales</a>
				</li>
				<li>
					<a href="{{ route('login.create') }}">Inicias sesion</a>
				</li>
				<li>
					<a href="{{ route('register.create') }}">Registrate</a>
				</li>
			</ul>
		</header>
		<main>
			@yield('content')
		</main>
		<footer>FOOTER</footer>
	</body>
</html>