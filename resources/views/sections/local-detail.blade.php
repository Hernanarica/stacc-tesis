<?php
/** @var \App\Models\Local[] $local */

$days = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo'];
?>
@extends('layout.layout')
@section('title', $local->name)
@section('content')
	<div class="relative flex h-40 bg-stone-900 px-2 pb-14 lg:hidden">
		<div class="self-end flex w-full justify-between">
			<h2 class="text-white font-medium text-2xl">{{ $local->name }}</h2>
			@auth()
				@if(!$local->isFavorited())
					<form action="{{ route('favorite.store', [ 'id' => $local->id ]) }}" method="post">
						@csrf
						<button class="group">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								stroke="currentColor"
								class="w-7 h-7 text-gray-400 group-hover:fill-white group-hover:text-white transition-colors duration-300"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
								/>
							</svg>
						</button>
					</form>
				@else
					<form action="{{ route('favorite.destroy', [ 'id' => $local->id ]) }}" method="post">
						@csrf
						@method('delete')
						<button class="group">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								stroke="currentColor"
								class="w-7 h-7 text-white fill-white transition-colors duration-300"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
								/>
							</svg>
						</button>
					</form>
				@endif
			@endauth
		</div>
		<div class="absolute top-32 left-0 w-full text-center px-2 lg:hidden">
			<img
				src="https://www.mibsas.com/wp-content/uploads/2017/05/CAMPOBRAVO-1200x900.jpg"
				alt="{{ $local->name }}"
				class="w-full max-w-lg inline-block aspect-video object-cover shadow-xl"
			>
		</div>
	</div>
	<x-wrapper>
	<div class="my-3">
		<a href="{{route('locals.index')}}"
		   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
			<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
			     xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
				      d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
			</svg>
			Volver
		</a>
	</div>
	</x-wrapper>
	<div class="hidden h-24 py-3 lg:block bg-stone-900">
		<x-wrapper>
			<div class="flex justify-between items-center">
				
				<h2 class="text-white font-medium text-2xl">{{ $local->name }}</h2>
				@auth()
					@if(!$local->isFavorited())
						<form action="{{ route('favorite.store', [ 'id' => $local->id ]) }}" method="post">
							@csrf
							<button class="group">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									fill="none"
									viewBox="0 0 24 24"
									stroke-width="1.5"
									stroke="currentColor"
									class="w-7 h-7 text-gray-400 group-hover:fill-white group-hover:text-white transition-colors duration-300"
								>
									<path
										stroke-linecap="round"
										stroke-linejoin="round"
										d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
									/>
								</svg>
							</button>
						</form>
					@else
						<form action="{{ route('favorite.destroy', [ 'id' => $local->id ]) }}" method="post">
							@csrf
							@method('delete')
							<button class="group">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									fill="none"
									viewBox="0 0 24 24"
									stroke-width="1.5"
									stroke="currentColor"
									class="w-7 h-7 text-white fill-white transition-colors duration-300"
								>
									<path
										stroke-linecap="round"
										stroke-linejoin="round"
										d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
									/>
								</svg>
							</button>
						</form>
					@endif
				@endauth
			</div>
		</x-wrapper>
	</div>
	<div class="lg:flex flex-col gap-10">
		<div class="hidden lg:block h-[500px] bg-stone-900">
			<x-wrapper>
				
				<div class="flex">
					<div class="relative w-1/2  bg-cover">
						<div class="absolute inset-0 bg-gradient-to-t from-stone-900">
{{--							la imagen del local va aqui--}}
							<img
								src="{{ url('/uploads/images/local/' . $local->image)}}"
								alt="{{ $local->image_alt }}"
								class=" max-w-lg inline-block aspect-video object-cover shadow-xl"
							>
						</div>
					</div>
					
					<div class="w-1/2 h-full">
						<div class="w-full">
							<div class="overflow-hidden sm:w-fit sm:mx-auto md:w-[450px] md:aspect-square md:rounded-full">
								{!! htmlspecialchars_decode($local->url_map) !!}
							</div>
						</div>
					</div>
				
				</div>
			
			</x-wrapper>
		</div>
		
		<x-wrapper>
			<div class="hidden lg:block">
				<div class="flex gap-12">
					<div class="overflow-hidden">
						<dl class="sm:divide-y sm:divide-gray-200">
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Dirección</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $local->address }}</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Barrio</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $local->neighborhood->name }}</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Teléfono</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $local->phone }}</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Email</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">local@gmail.com</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">$120,000</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Descripcion</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
							</div>
						</dl>
					</div>
					
					<div class="w-full md:max-w-xs">
						<h3 class="font-medium text-gray-900">Horarios</h3>
						<dl class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200">
							@foreach($days as $day)
								<div class="flex justify-between py-3 text-sm font-medium">
									<dt class="text-gray-500 capitalize">{{ $day }}</dt>
									<dd class="whitespace-nowrap text-gray-900 flex items-center gap-1">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											fill="none"
											viewBox="0 0 24 24"
											stroke-width="1.5"
											stroke="currentColor"
											class="w-3 h-3"
										>
											<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
										</svg>
										<span>{{ $local->opening_time }} a {{ $local->closing_time }}</span>
									</dd>
								</div>
							@endforeach
						</dl>
					</div>
				</div>
			</div>
			<div class="mt-[53%] sm:mt-64 lg:hidden">
				<div class="flex flex-col gap-6">
					<div class="overflow-hidden">
						<dl class="sm:divide-y sm:divide-gray-200">
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Direccion</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $local->address }}</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Teléfono</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $local->phone }}</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Email</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">local@gmail.com</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">$120,000</dd>
							</div>
							<div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">Descripcion</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
							</div>
						</dl>
					</div>
					
					<div class="sm:px-6 flex flex-col items-center gap-8 md:flex-row">
						<div class="w-full md:max-w-xs">
							<h3 class="font-medium text-gray-900">Horarios</h3>
							<dl class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200">
								@foreach($days as $day)
									<div class="flex justify-between py-3 text-sm font-medium">
										<dt class="text-gray-500 capitalize">{{ $day }}</dt>
										<dd class="whitespace-nowrap text-gray-900 flex items-center gap-1">
											<svg
												xmlns="http://www.w3.org/2000/svg"
												fill="none"
												viewBox="0 0 24 24"
												stroke-width="1.5"
												stroke="currentColor"
												class="w-3 h-3"
											>
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
											</svg>
											<span>{{ $local->opening_time }} a {{ $local->closing_time }}</span>
										</dd>
									</div>
								@endforeach
							</dl>
						</div>
						
						<div class="w-full">
							<div class="overflow-hidden sm:w-fit sm:mx-auto md:w-[350px] md:aspect-square md:rounded-full">
								{!! htmlspecialchars_decode($local->url_map) !!}
							</div>
						</div>
					
					</div>
				
				</div>
			</div>
		</x-wrapper>
	</div>
@endsection