<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Mis Locales')
@section('content')
	<x-wrapper>
		<h2 class="text-3xl font-bold text-gray-700">Mis Locales</h2>
		<section class="min-h-[calc(100vh-140px)]">
			<div class="mt-8 flex flex-col">
				<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
						@if(empty($locals))
						<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
							@foreach($locals as $local)
								{{--				listado de mis locales con su funcion de editar --}}
								<table class="min-w-full divide-y divide-gray-300">
									<thead class="bg-gray-50">
									<tr>
										<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">imagen</th>
										<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nombre</th>
										<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Direccion</th>
										<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Teléfono</th>
										<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
										<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Acciones</th>
									</tr>
									</thead>
									<tbody class="bg-white divide-y divide-gray-200">
									<tr>
										<td class="px-3 py-4 whitespace-nowrap">
											<div class="flex items-center">
												<div class="flex-shrink-0 h-10 w-10">
													<img class="h-10 w-10 rounded-full" src="{{ url('/uploads/images/local/' . $local->image)}}" alt="{{$local->image_alt}}">
												</div>
											</div>
										</td>
										<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$local->name}}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$local->address}}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$local->phone}}</td>
										{{--								poner si esta habilitado o no --}}
										@if($local->is_public === 1)
											<td>
									<span class="inline-flex leading-5 font-semibold rounded-full bg-emerald-300 text-emerald-700 p-1.5">
										Habilitado
									</span>
											</td>
										@else
											<td>
									<span class="inline-flex leading-5 font-semibold rounded-full bg-red-300 text-red-700 p-1.5">
										Deshabilitado
									</span>
											</td>
										@endif
										<td class="whitespace-nowrap px-3 py-4 flex items-center gap-2 text-sm text-gray-500">
											<a href="{{ route('store.show', $local->id) }}" class="" aria-label="Editar el usuario {{$local->name}}">
												<button class="px-3 py-2 flex items-center gap-2 bg-blue-500 text-white rounded">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
														<path stroke-linecap="round" stroke-linejoin="round"
														      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
													</svg>
													Editar
												</button>
											</a>
											{{--								a con un boton para eliminar, cuando hace el click abrir modal --}}
											<a href="{{ route('store.delete', $local->id) }}" class="" aria-label="Eliminar el local {{$local->name}}">
												<button class="px-3 py-2 flex items-center gap-2 bg-red-500 text-white rounded">
													<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														      d="M6 18L18 6M6 6l12 12" />
													</svg>
													Pedir baja
												</button>
											</a>
										</td>
								</table>
							@endforeach
						</div>
						@else
							<div class="pt-8">
								<h3 class="text-3xl font-bold text-gray-700 text-center mx-auto w-full">No tienes locales por ahora, agregue un local...</h3>
							</div>
						@endif
					</div>
				</div>
			</div>
		</section>
	</x-wrapper>
@endsection
