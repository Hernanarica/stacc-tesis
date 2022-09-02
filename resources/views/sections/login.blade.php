@extends('layout.layout')
@section('title', 'Inicia sesion')
@section('content')
	<section>
		<h2>Login</h2>
		<form
			action="{{ route('login.store') }}"
			method="post"
		>
			@csrf
			<div>
				<label for="email">Email</label>
				<input
					type="email"
					name="email"
					id="email"
					class="border"
					value="{{ old('email') }}"
				>
			</div>
			@error('email')
			<div class="bg-red-600 text-white">
				{{ $message }}
			</div>
			@enderror
			
			<div>
				<label for="password">Password</label>
				<input
					type="password"
					name="password"
					id="password"
					class="border"
					value="{{ old('password') }}"
				>
			</div>
			@error('password')
			<div class="bg-red-600 text-white">
				{{ $message }}
			</div>
			@enderror

			@if(Session::get('error'))
				<div class="bg-red-600 text-white">
					{{ Session::get('error') }}
				</div>
			@endif
			
			<button class="bg-indigo-600 text-white px-4 py-2 rounded">Iniciar sesion</button>
		</form>
	</section>
@endsection