<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Mis Locales')
@section('content')
	<x-wrapper>
{{--		titulo de mis locales --}}
		<h2 class="text-3xl font-bold text-gray-700">Mis Locales</h2>
		<div class="min-h-[calc(100vh-140px)] mx-auto max-w-2xl py-12 sm:py-14 lg:max-w-8xl">
			<div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
			@foreach($locals as $local)
				<div>
					<div class="relative">
						<div class="relative h-72 w-full overflow-hidden rounded-lg">
							<img
								src="{{ url('/uploads/images/local/' . $local->image)}}"
								alt="{{ $local->image_alt }}"
								class=" max-w-lg inline-block aspect-video object-cover shadow-xl"
							/>
						</div>
						<div class="relative mt-4">
							<h3 class="text-lg font-semibold text-gray-900 ">
								{{ $local->name }}
							</h3>
							<h3 class="text-sm font-medium text-gray-900">{{ $local->address }}, {{ $local->neighborhood->name }}</h3>
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
							<p class="relative text-lg font-semibold text-white">{{$local->neighborhood->name}}</p>
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
		
	</x-wrapper>
@endsection
