<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Locales')
@section('content')
	<section class="container xl: mx-auto">
		<h2>Locales</h2>
		<main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			@foreach($locals as $local)
				<a href="{{ route('locals.show', ['local' => $local->id]) }}" aria-label="ver información sobre {{ $local->nombre }}" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
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