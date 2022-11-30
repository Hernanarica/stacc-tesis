<?php
	/** @var \ChristianKuri\LaravelFavorite\Models\Favorite $favorites */
?>
@extends('layout.layout')
@section('title', 'Mis favoritos')
@section('content')
	<div class="min-h-[calc(100vh-140px)] mx-auto max-w-2xl py-12 sm:py-14 lg:max-w-8xl">
		<div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
			@if(empty($favorites))
				<div>
					<h2 class="text-3xl font-bold text-gray-700 text-center mx-auto w-full">No tienes favoritos</h2>
				</div>
			@endif
			@foreach($favorites as $favorite)
				<a
					href="{{ route('locals.show', ['local' => $favorite->id]) }}"
					aria-label="ver información sobre {{ $favorite->name }}"
					class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
				>
					<img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ url('uploads/images/local/' . $favorite->image) }}" alt="">
					<div class="flex flex-col justify-between p-4 leading-normal">
						<h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $favorite->name }}</h3>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Abierto de {{ $favorite->opening_time }} a {{ $favorite->closing_time }}</p>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dirección:{{ $favorite->address }}</p>
					</div>
				</a>
			@endforeach
		</div>
	</div>
@endsection