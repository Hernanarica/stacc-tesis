@extends('layout.layout')
@section('title', 'Inicia sesion')
@section('content')
	<section>
		<div class="bg-white">
			<div class="flex justify-center h-screen">
				<div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url('https://images.pexels.com/photos/13670950/pexels-photo-13670950.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
					<div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
						<div>
							<h2 class="text-4xl font-bold text-white">Brand</h2>
							
							<p class="max-w-xl mt-3 text-gray-300">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. In
								autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus
								molestiae
							</p>
						</div>
					</div>
				</div>
				
				<div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
					<div class="flex-1">
						<div class="text-center">
							<h2 class="text-4xl font-bold text-center text-gray-700">Inicia sesion</h2>
						</div>
						<div class="mt-8">
							<form
								action="{{ route('login.store') }}"
								method="post"
								class="flex flex-col gap-4"
							>
								<div class="flex flex-col gap-2">
									<label
										for="email"
										class="block text-sm text-gray-600"
									>Email</label>
									<input
										type="email"
										class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
										name="email"
										id="email"
										placeholder="example@example.com"
									/>
									@error('email')
									<div class="py-1 px-2 bg-red-600 text-white rounded">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="flex flex-col gap-2">
									<label for="password" class="text-sm text-gray-600">Contrasena</label>
									<input
										type="password"
										class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
										name="password"
										id="password"
										placeholder="Tu contrasena"
									/>
									@error('password')
									<div class="py-1 px-2 bg-red-600 text-white rounded">
										{{ $message }}
									</div>
									@enderror
								</div>
								@if(Session::get('error'))
								<div class="py-1 px-2 bg-red-600 text-white rounded">
									{{ Session::get('error') }}
								</div>
								@endif
								<div class="mt-6">
									<button class="w-full px-4 py-2 tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
										Iniciar sesion
									</button>
								</div>
							</form>
							<p class="mt-6 text-sm text-center text-gray-400">
								No tenes una cuenta?
								<a href="{{ route('register.create') }}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Registrate</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection