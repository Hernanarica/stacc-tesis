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