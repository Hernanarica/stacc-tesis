@extends('layout.layout')
@section('title', 'Registrate')
@section('content')
	<section>
		<h2>Registrate</h2>
		<form
			action="{{ route('register.store') }}"
			method="post"
		>
			@csrf
			<div>
				<label for="name">Name</label>
				<input
					type="text"
					name="name"
					id="name"
					class="border"
					value="{{ old('name') }}"
				>
			</div>
			@error('name')
				<div class="bg-red-600 text-white">
					{{ $message }}
				</div>
			@enderror
			
			<div>
				<label for="lastname">Lastname</label>
				<input
					type="text"
					name="lastname"
					id="lastname"
					class="border"
					value="{{ old('lastname') }}"
				>
			</div>
			@error('lastname')
				<div class="bg-red-600 text-white">
					{{ $message }}
				</div>
			@enderror
			
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
			
			<div>
				<label for="role_id" class="sr-only">Role</label>
				<select name="role_id" id="role_id">
					<option value="">Selecciona un rol</option>
					<option value="1">Usuario</option>
					<option value="2">Dueno de local</option>
				</select>
			</div>
			@error('role_id')
				<div class="bg-red-600 text-white">
					{{ $message }}
				</div>
			@enderror
			
			<button class="bg-indigo-600 text-white px-4 py-2 rounded">Register</button>
		</form>
	</section>
@endsection