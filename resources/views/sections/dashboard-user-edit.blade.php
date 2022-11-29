<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\User $user */
?>
@extends('layout.layout-dashboard')
@section('title', 'Panel de control | Usuarios')
@section('dashboard')
	<x-wrapper>
		<div>
			{{--		boton para volver  estilos de tailwindcss--}}
			<a href="{{route('dashboard.users.view')}}"
			   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
				<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
					 xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						  d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
				</svg>
				Volver
			</a>
		</div>
		<form action="{{ route('dashboard.user.update', $user->id) }}" enctype="multipart/form-data" method="post" class="form-edit">
			@csrf
			@method('PUT')
			<div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-4/5">
				<div class="w-full">
					<h2 class="text-4xl font-bold text-center text-gray-700">Actualizar usuario</h2>
					<div class="mb-3 pt-10">
{{--						<label class="block mb-2 text-sm text-gray-600 dark:text-gray-200" for="name">Nombre</label>--}}
						<label for="name" class="block form-label mb-2">
							Nombre *
						</label>
						<input
							type="text"
							name="name"
							id="name"
							placeholder="Nombre"
							value="{{ old('name', $user->name) }}"
							class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
						/>
						@error('name')
						<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							     stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
								      d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
							</svg>
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="lastname" class="block form-label mb-2">
							Apellido *
						</label>
						<input
							type="text"
							name="lastname"
							id="lastname"
							value="{{ old('lastname', $user->lastname) }}"
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
					<div class="mb-3">
						<label for="email" class="block form-label mb-2">
							Email
						</label>
						<input
							type="email"
							name="email"
							id="email"
							value="{{ old('email', $user->email) }}"
							placeholder="Email"
							class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
						/>
						@error('email')
						<div class="flex items-center gap-2 py-1 px-2 mt-2 bg-red-600 text-white rounded">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="password" class="block form-label mb-2">
							Contraseña
						</label>
						<input
							type="password"
							name="password"
							id="password"
							placeholder="Contraseña"
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
					<div class="mb-3">
						<label for="category" class="block form-label mb-2">
							Categoria
						</label>
						<select
							name="category"
							id="category"
							class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
								focus:outline-none focus:ring focus:ring-opacity-40"
						>
							<option value="owner" {{ old('category', $user->category) == 'owner' ? 'selected' : '' }}>Dueño de local</option>
							<option value="visitor" {{ old('category', $user->category) == 'visitor' ? 'selected' : '' }}>Visitante</option>
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
					<div class="mb-3">
{{--						palaras que digan foto perfil--}}
						<p class="block form-label mb-2">
							Foto de perfil
						</p>
						<img src="{{ url('uploads/images/profile/' . $user->image)}}" alt="{{$user->image_alt}}" class="w-32 h-32 rounded-full">
					</div>
					<div class="mb-3">
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
			</div>
			<button class="flex justify-center w-full max-w-2xl p-3 mx-auto lg:px-12 lg:w-3/5 tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
				Actualizar
			</button>
		</form>
	</x-wrapper>
@endsection