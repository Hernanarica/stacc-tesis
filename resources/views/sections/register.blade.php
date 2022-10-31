@extends('layout.layout')
@section('title', 'Registrate')
@section('content')
{{--	<section>--}}
{{--		<h2>Registrate</h2>--}}
{{--		<form--}}
{{--			action="{{ route('register.store') }}"--}}
{{--			method="post"--}}
{{--		>--}}
{{--			@csrf--}}
{{--			<div>--}}
{{--				<label for="name">Name</label>--}}
{{--				<input--}}
{{--					type="text"--}}
{{--					name="name"--}}
{{--					id="name"--}}
{{--					class="border"--}}
{{--					value="{{ old('name') }}"--}}
{{--				>--}}
{{--			</div>--}}
{{--			@error('name')--}}
{{--				<div class="bg-red-600 text-white">--}}
{{--					{{ $message }}--}}
{{--				</div>--}}
{{--			@enderror--}}
{{--			--}}
{{--			<div>--}}
{{--				<label for="lastname">Lastname</label>--}}
{{--				<input--}}
{{--					type="text"--}}
{{--					name="lastname"--}}
{{--					id="lastname"--}}
{{--					class="border"--}}
{{--					value="{{ old('lastname') }}"--}}
{{--				>--}}
{{--			</div>--}}
{{--			@error('lastname')--}}
{{--				<div class="bg-red-600 text-white">--}}
{{--					{{ $message }}--}}
{{--				</div>--}}
{{--			@enderror--}}
{{--			--}}
{{--			<div>--}}
{{--				<label for="email">Email</label>--}}
{{--				<input--}}
{{--					type="email"--}}
{{--					name="email"--}}
{{--					id="email"--}}
{{--					class="border"--}}
{{--					value="{{ old('email') }}"--}}
{{--				>--}}
{{--			</div>--}}
{{--			@error('email')--}}
{{--				<div class="bg-red-600 text-white">--}}
{{--					{{ $message }}--}}
{{--				</div>--}}
{{--			@enderror--}}
{{--			--}}
{{--			<div>--}}
{{--				<label for="password">Password</label>--}}
{{--				<input--}}
{{--					type="password"--}}
{{--					name="password"--}}
{{--					id="password"--}}
{{--					class="border"--}}
{{--					value="{{ old('password') }}"--}}
{{--				>--}}
{{--			</div>--}}
{{--			@error('password')--}}
{{--				<div class="bg-red-600 text-white">--}}
{{--					{{ $message }}--}}
{{--				</div>--}}
{{--			@enderror--}}
{{--			--}}
{{--			<div>--}}
{{--				<label for="role_id" class="sr-only">Role</label>--}}
{{--				<select name="role_id" id="role_id">--}}
{{--					<option value="">Selecciona un rol</option>--}}
{{--					<option value="1">Usuario</option>--}}
{{--					<option value="2">Dueno de local</option>--}}
{{--				</select>--}}
{{--			</div>--}}
{{--			@error('role_id')--}}
{{--				<div class="bg-red-600 text-white">--}}
{{--					{{ $message }}--}}
{{--				</div>--}}
{{--			@enderror--}}
{{--			--}}
{{--			<button class="bg-indigo-600 text-white px-4 py-2 rounded">Register</button>--}}
{{--		</form>--}}
{{--	</section>--}}
<section class="bg-white">
	<div class="flex justify-center min-h-screen">
		<div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url('https://images.pexels.com/photos/9228613/pexels-photo-9228613.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
		</div>
		
		<div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
			<div class="w-full">
				<h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize">
					Ingresa tus datos
				</h1>
				
				<p class="mt-4 text-gray-500 dark:text-gray-400">
					Al registrarte podras realizar comentarios en nuestro blog y calificar restaurantes.
				</p>
				
				<form
					action="{{ route('register.store') }}"
					method="post"
					class="flex flex-col gap-6"
				>
					<div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="name">Nombre</label>
							<input
								type="text"
								name="name"
								id="name"
								placeholder="Nombre"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
							/>
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="lastname">Apellido</label>
							<input
								type="text"
								name="lastname"
								id="lastname"
								placeholder="Snow"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
							/>
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="password">Contrasena</label>
							<input
								type="password"
								name="password"
								id="password"
								placeholder="Contrasena"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
							/>
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="category">Categoria</label>
							<input
								type="email"
								name="category"
								id="category"
								placeholder="johnsnow@example.com"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
							/>
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="image">Imagen</label>
							<input
								type="file"
								name="image"
								id="image"
								placeholder="Enter your password"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
							/>
						</div>
					</div>
					<button class="w-full px-4 py-2 tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
						Registrarme
					</button>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection