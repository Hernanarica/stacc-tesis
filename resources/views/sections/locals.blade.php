<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Locales')
@section('content')
	<section class="container xl: mx-auto">
{{--		ver que parame
		<h2 class="text-4xl font-bold text-center text-gray-700">Locales</h2>
{{--		formulario con input y boton para buscar locales por nombre--}}
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pb-4">
			<form action="{{route('locals.index')}}" method="get" class="flex items-center">
				@csrf
				<label for="simple-search" class="sr-only">Search</label>
				<div class="relative w-full">
					<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
						<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
					</div>
					<input
						type="text"
						id="simple-search"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40 block w-full pl-10 p-2.5"
						placeholder="Search"
						value="{{$texto}}"
						required>
				</div>
				<button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border bg-gradient-to-r from-stacc-purple to-stacc-red">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					<span class="sr-only">Search</span>
				</button>
			</form>
		</div>
		<main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			@foreach($locals as $local)
				<a href="{{ route('locals.show', ['local' => $local->id]) }}" aria-label="ver información sobre {{ $local->name }}" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
					<img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ url('uploads/images/local/' . $local->image) }}" alt="">
					<div class="flex flex-col justify-between p-4 leading-normal">
						<h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $local->name }}</h3>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Abierto de {{ $local->opening_time }} a {{ $local->closing_time }}</p>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dirección:{{ $local->address }}</p>
					</div>
				</a>
			@endforeach
		</main>
	</section>
@endsection