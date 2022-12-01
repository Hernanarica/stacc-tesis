<?php
/** @var \App\Models\User $user */
?>
@extends('layout.layout')
@section('title', 'Mi perfil')
@section('content')
	<section>
{{--		Mostrar datos del perfil de usuario --}}
		<div class=" bg-gray-200 flex flex-wrap items-center justify-center">
			<div class="container max-w-lg bg-white rounded  shadow-lg transform duration-200 easy-in-out m-12">
				<div class="h-2/4 sm:h-64 overflow-hidden">
					<img class="w-full rounded-t"
					     src="{{ url('/uploads/images/profile/' . $user->image)}}"
					     alt="{{$user->image_alt}}" />
				</div>
				<div class="flex justify-start px-5 -mt-12 mb-5">
      <span clspanss="block relative h-32 w-32">
        <img alt="{{$user->image_alt}}"
             src="{{ url('/uploads/images/profile/' . $user->image)}}"
             class="mx-auto object-cover rounded-full h-24 w-24 bg-white p-1" />
      </span>
				</div>
				<div class="">
					<div class="px-7 mb-8">
{{--						h2 con nombre y apellido casteandolo en mayuscula --}}
						<h2 class="text-3xl font-bold text-gray-700 capitalize">{{$user->name}} {{$user->lastname}}</h2>
{{--						mostrando la category que tiene traducirlo al español --}}
						<p class="text-gray-600 mt-2">Categoria: {{$user->category}}</p>
						<p class="text-gray-600 mt-2">Correo: {{$user->email}}</p>
						<p class="mt-2 text-gray-600 dark:text-gray-500">Creado el : {{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</p>
						<p class="mt-2 text-gray-600 dark:text-gray-500">Actualizado el : {{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}</p>
						<div
							class="justify-center px-4 cursor-pointer max-w-min mx-auto mt-5 rounded-lg">
							<a href="{{ route('profile.edit') }}">
								<button type="submit" class="px-8 py-3 w-fit text-sm font-medium tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red
				rounded-md focus:opacity-90 focus:outline-none">Editar</button>
							</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

		body {
			font-family: 'Poppins', sans-serif;
		}
		</style>
	</section>
@endsection