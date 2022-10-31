@extends('layout.layout')
@section('title', 'Inicia sesion')
@section('content')
{{--	<section>--}}
{{--		<h2>Login</h2>--}}
{{--		<form--}}
{{--			action="{{ route('login.store') }}"--}}
{{--			method="post"--}}
{{--		>--}}
{{--			@csrf--}}
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
{{--			<div class="bg-red-600 text-white">--}}
{{--				{{ $message }}--}}
{{--			</div>--}}
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
{{--			<div class="bg-red-600 text-white">--}}
{{--				{{ $message }}--}}
{{--			</div>--}}
{{--			@enderror--}}

{{--			@if(Session::get('error'))--}}
{{--				<div class="bg-red-600 text-white">--}}
{{--					{{ Session::get('error') }}--}}
{{--				</div>--}}
{{--			@endif--}}
{{--			--}}
{{--			<button class="bg-indigo-600 text-white px-4 py-2 rounded">Iniciar sesion</button>--}}
{{--		</form>--}}
{{--	</section>--}}
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
							<p class="mt-3 text-gray-500">Inicia sesion con tu cuenta</p>
						</div>
						<div class="mt-8">
							<form action="{{ route('login.store') }}" method="post">
								<div>
									<label
										for="email"
										class="block mb-2 text-sm text-gray-600"
									>Email</label>
									<input
										type="email"
										class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
										name="email"
										id="email"
										placeholder="example@example.com"
									/>
								</div>
								<div class="mt-6">
									<div class="flex justify-between mb-2">
										<label for="password" class="text-sm text-gray-600">Contrasena</label>
										<a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Olvidaste tu contrasena?</a>
									</div>
									<input
										type="password"
										class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
										name="password"
										id="password"
										placeholder="Tu contrasena"
									/>
								</div>
								<div class="mt-6">
									<button class="w-full px-4 py-2 tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
										Iniciar sesion
									</button>
								</div>
							</form>
							<p class="mt-6 text-sm text-center text-gray-400">
								No tenes una cuenta?
								<a href="#" class="text-blue-500 focus:outline-none focus:underline hover:underline">Registrate</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection