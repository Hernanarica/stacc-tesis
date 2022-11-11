<?php
/** @var \App\Models\Local[] $local */
?>
@extends('layout.layout')
@section('title', 'Detalle de local')
@section('content')
	<section class="container xl: mx-auto">
		{{--			boton para volver a la home dentro de un div --}}
		<div class="flex justify-end pb-4">
			<a href="{{ route('locals.index') }}"
			   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver</a>
		</div>
		@auth()
			@if(!$local->isFavorited())
				<div class="flex justify-end pb-4">
					<form action="{{ route('favorite.store', [ 'id' => $local->id ]) }}" method="post">
						@csrf
						<button class="group flex items-center gap-2 border border-gray-400 text-gray-400 hover:border-stacc-red hover:text-stacc-red font-bold py-2 px-4 rounded transition-colors
				duration-300">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								stroke="currentColor"
								class="w-6 h-6 group-hover:fill-red-500 transition-colors duration-300"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
								/>
							</svg>
							<span>Agregar</span>
						</button>
					</form>
				</div>
			@endif
		@endauth
		{{--		etiqueta main con stilos tailwind siendo el contenedor de produsctos show --}}
		<main class="grid grid-flow-col justify-center gap-10">
			<div class="col-span-2">
				<div>
					<h2 class="font-bold text-4xl text-rose-600">{{ $local->name }}</h2>
					<p>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 14C14.206 14 16 12.206 16 10C16 7.794 14.206 6 12 6C9.794 6 8 7.794 8 10C8 12.206 9.794 14 12 14ZM12 8C13.103 8 14 8.897 14 10C14 11.103 13.103 12 12 12C10.897 12 10 11.103 10 10C10 8.897 10.897 8 12 8Z"
								fill="#484848"/>
							<path
								d="M11.42 21.814C11.594 21.938 11.797 22 12 22C12.203 22 12.406 21.938 12.58 21.814C12.884 21.599 20.029 16.44 20 10C20 5.589 16.411 2 12 2C7.58897 2 3.99997 5.589 3.99997 9.995C3.97097 16.44 11.116 21.599 11.42 21.814ZM12 4C15.309 4 18 6.691 18 10.005C18.021 14.443 13.612 18.428 12 19.735C10.389 18.427 5.97897 14.441 5.99997 10C5.99997 6.691 8.69097 4 12 4Z"
								fill="#484848"/>
						</svg>{{$local->address}}</p>
				</div>
				<div class="img-show mb-4">
					<img src="{{ url('uploads/images/local/' . $local->image) }}" alt="{{ $local->image_alt }}">
				</div>
				<div class="cont-horario mb-4">
					<h3 class="horario__h3">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z"
								fill="#484848"/>
							<path d="M13 7H11V12.414L14.293 15.707L15.707 14.293L13 11.586V7Z" fill="#484848"/>
						</svg>
						Horario de atención
					</h3>
					<ul>
						<li>Lunes
							<span>{{$local->opening_time}} - {{$local->closing_time}}</span>
						</li>
						<li>Martes
							<span>{{$local->opening_time}} - {{$local->closing_time}}</span>
						</li>
						<li>Miércoles
							<span>{{$local->opening_time}} - {{$local->closing_time}}</span>
						</li>
						<li>Jueves
							<span>{{$local->opening_time}} - {{$local->closing_time}}</span>
						</li>
						<li>Viernes
							<span>{{$local->opening_time}} - {{$local->closing_time}}</span>
						</li>
						<li>Sábado
							<span>{{$local->opening_time}} - {{$local->closing_time}}</span>
						</li>
						<li>Domingo
							<span>Cerrado</span>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-span-3">
				<div class="cont-iframe">
					{!! htmlspecialchars_decode($local->url_map) !!}
				</div>
				
				<div class="contactos-show">
					<ul class="row">
						<li class="col-12 col-md-3">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.707 12.293C17.316 11.902 16.684 11.902 16.293 12.293L14.699 13.887C13.96 13.667 12.581 13.167 11.707 12.293C10.833 11.419 10.333 10.04 10.113 9.30101L11.707 7.70701C12.098 7.31601 12.098 6.68401 11.707 6.29301L7.70697 2.29301C7.31597 1.90201 6.68397 1.90201 6.29297 2.29301L3.58097 5.00501C3.20097 5.38501 2.98697 5.90701 2.99497 6.44001C3.01797 7.86401 3.39497 12.81 7.29297 16.708C11.191 20.606 16.137 20.982 17.562 21.006C17.567 21.006 17.585 21.006 17.59 21.006C18.118 21.006 18.617 20.798 18.995 20.42L21.707 17.708C22.098 17.317 22.098 16.685 21.707 16.294L17.707 12.293ZM17.58 19.005C16.332 18.984 12.062 18.649 8.70697 15.293C5.34097 11.927 5.01497 7.64201 4.99497 6.41901L6.99997 4.41401L9.58597 7.00001L8.29297 8.29301C8.05397 8.53101 7.95197 8.87501 8.02097 9.20501C8.04497 9.32001 8.63197 12.047 10.292 13.707C11.952 15.367 14.679 15.954 14.794 15.978C15.127 16.049 15.468 15.946 15.706 15.707L17 14.414L19.586 17L17.58 19.005Z"
									fill="#484848"/>
							</svg>{{ $local->phone }}
						</li>
						<li class="col-12 col-md-8">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM4 12C4 11.101 4.156 10.238 4.431 9.431L6 11L8 13V15L10 17L11 18V19.931C7.061 19.436 4 16.072 4 12ZM18.33 16.873C17.677 16.347 16.687 16 16 16V15C16 13.896 15.104 13 14 13H10V11V10C11.104 10 12 9.104 12 8V7H13C14.104 7 15 6.104 15 5V4.589C17.928 5.778 20 8.65 20 12C20 13.835 19.373 15.522 18.33 16.873Z"
									fill="#484848"/>
							</svg>
							<a href="{{ $local->url_site }}" target="_blank">Visitar</a>
						</li>
					</ul>
				</div>
			</div>
		</main>
	</section>
@endsection