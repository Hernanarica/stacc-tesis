@extends('layout.layout')
@section('title', 'Registrate')
@section('content')
<section class="bg-white">
	<div class="flex justify-center min-h-screen">
		<div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url('https://images.pexels.com/photos/9228613/pexels-photo-9228613.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
		</div>
		
		<div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
			<div class="w-full">
				<h2 class="text-4xl font-bold text-center text-gray-700">Registrate</h2>
				<p class="mt-4 text-gray-500 dark:text-gray-400">
					Al registrarte podras realizar comentarios en nuestro blog y calificar restaurantes.
				</p>
				
				<form
					action="{{ route('user.store') }}"
					method="POST"
					class="flex flex-col gap-6"
					enctype="multipart/form-data"
				>
					@csrf
					<div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="name">Nombre</label>
							<input
								type="text"
								name="name"
								id="name"
								placeholder="Nombre"
								value="{{ old('name') }}"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
							/>
							@error('name')
							<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
								</svg>
								{{ $message }}
							</div>
							@enderror
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="lastname">Apellido</label>
							<input
								type="text"
								name="lastname"
								id="lastname"
								value="{{ old('lastname') }}"
								placeholder="Apellido"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
							/>
							@error('lastname')
							<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
								</svg>
								{{ $message }}
							</div>
							@enderror
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="email">Email</label>
							<input
								type="email"
								name="email"
								id="email"
								value="{{ old('email') }}"
								placeholder="Email"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
							/>
							@error('email')
							<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
								</svg>
								{{ $message }}
							</div>
							@enderror
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="password">Contrasena</label>
							<input
								type="password"
								name="password"
								id="password"
								placeholder="Contrasena"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
							/>
							@error('password')
							<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
								</svg>
								{{ $message }}
							</div>
							@enderror
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="category">Categoria</label>
							<select
								name="category"
								id="category"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40">
								<option value="">Selecciona una categoria</option>
								<option value="2">Dueno de local</option>
								<option value="3">Usuario</option>
							</select>
							@error('category')
							<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
								</svg>
								{{ $message }}
							</div>
							@enderror
						</div>
						
						<div>
							<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="image">Imagen</label>
							<input
								type="file"
								name="image"
								id="image"
								placeholder="Enter your password"
								class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:boring-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
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