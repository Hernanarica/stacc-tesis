<?php
/** @var \App\Models\Local $locals */
?>
@extends('layout.layout-dashboard')
@section('title', 'Panel de control | Locales')
@section('dashboard')
	<x-wrapper>
		<div class="p-2 ">
			<div class="text-right">
				<a href="" class="px-8 py-3 w-fit text-sm font-medium tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:opacity-90
					focus:outline-none">Agregar
				</a>
			</div>
			<div class="">
				<form action="{{route('locals.index')}}" method="get" class="flex items-center max-w-sm">
					@csrf
					<label for="simple-search" class="sr-only">Search</label>
					<div class="relative w-full">
						<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
							<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								      clip-rule="evenodd"></path>
							</svg>
						</div>
						<input name="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:border-stacc-purple focus:ring-stacc-purple focus:outline-none focus:ring
						focus:ring-opacity-40 block w-full pl-10 p-2.5" placeholder="Buscar local" value=" {{request()->search}}">
					</div>
					<button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border bg-gradient-to-r from-stacc-purple to-stacc-red">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
						</svg>
						<span class="sr-only">Search</span>
					</button>
				</form>
			</div>
			<div>
				<div class="mt-8 flex flex-col">
					<div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
								<table class="min-w-full divide-y divide-gray-300">
									<thead class="bg-gray-50">
										<tr>
											<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nombre</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Direccion</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Teléfono</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Acciones</th>
											<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										@foreach($locals as $local)
											<tr>
												<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$local->name}}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$local->address}}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$local->phone}}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
													@if($local->is_public == 1)
														<form action="{{ route('dashboard.locals.disable', $local->id)}}" method="POST">
															@csrf
															@method('PATCH')
															<button class="px-3 py-2 flex items-center gap-2 bg-green-600 text-green-100 rounded">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
																	<path fill-rule="evenodd"
																	      d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
																</svg>
																Deshabilitar
															</button>
														</form>
													@else
														<form action="{{ route('dashboard.locals.enable', $local->id)}}" method="POST">
															@csrf
															@method('PATCH')
															<button class="px-3 py-2 flex items-center gap-2 bg-amber-500 text-white rounded">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
																	<path fill-rule="evenodd"
																	      d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
																</svg>
																Habilitar
															</button>
														</form>
													@endif
												</td>
												<td class="whitespace-nowrap px-3 py-4 flex items-center gap-2 text-sm text-gray-500">
													<a href="{{ route('dashboard.local.edit', ['id' => $local->id]) }}" class="" aria-label="Editar el local {{$local->name}}">
														<button class="px-3 py-2 flex items-center gap-2 bg-blue-500 text-white rounded">
															<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
																<path stroke-linecap="round" stroke-linejoin="round"
																      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
															</svg>
															Editar
														</button>
													</a>
													<button class="px-3 py-2 flex items-center gap-2 bg-red-500 text-white rounded">
														<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
															<path stroke-linecap="round" stroke-linejoin="round"
															      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
														</svg>
														Eliminar
													</button>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</x-wrapper>
@endsection