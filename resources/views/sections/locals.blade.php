<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Locales')
@section('content')
	<x-wrapper>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			<form
				action="{{route('locals.index')}}"
				method="get"
				class="flex items-center"
			>
				@csrf
				<label for="simple-search" class="sr-only">Search</label>
				<div class="relative w-full">
					<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
						<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
					</div>
					<input
						name="search"
						type="text"
						id="simple-search"
						class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:border-stacc-purple focus:ring-stacc-purple focus:outline-none focus:ring
						focus:ring-opacity-40 block w-full pl-10 p-2.5"
						placeholder="Buscar local"
						value=" {{request()->search}}"
					>
				</div>
				<button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border bg-gradient-to-r from-stacc-purple to-stacc-red">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					<span class="sr-only">Search</span>
				</button>
			</form>
		</div>
		
		<div class="min-h-[calc(100vh-140px)] mx-auto max-w-2xl py-12 sm:py-14 lg:max-w-8xl">
			<div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
				@foreach($locals as $local)
					<div>
						<div class="relative">
							<div class="relative h-72 w-full overflow-hidden rounded-lg">
								<img src="https://www.mibsas.com/wp-content/uploads/2017/05/CAMPOBRAVO-1200x900.jpg" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="h-full w-full object-cover object-center">
							</div>
							<div class="relative mt-4">
								<h3 class="text-sm font-medium text-gray-900">{{ $local->address }}</h3>
								<p class="flex items-center gap-1 mt-1 text-sm text-gray-500">
									<svg
										class="w-4 h-4"
										xmlns="http://www.w3.org/2000/svg"
										fill="none"
										viewBox="0 0 24 24"
										stroke-width="1.5"
										stroke="currentColor"
									>
										<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
									</svg>
									{{ $local->opening_time }} a {{ $local->closing_time }}
								</p>
							</div>
							<div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
								<div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
								<p class="relative text-lg font-semibold text-white">Palermo</p>
							</div>
						</div>
						<div class="mt-6">
							<a
								href="{{ route('locals.show', ['local' => $local->id]) }}"
								class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200"
							>
								Ver más
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		{{ $locals->links('pagination::tailwind') }}
	</x-wrapper>
@endsection