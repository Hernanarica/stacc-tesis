<?php
/** @var \App\Models\User $users */
?>
@extends('layout.layout-dashboard')
@section('title', 'Panel de control | Usuarios')
@section('dashboard')
	<x-wrapper>
		<div class="p-2 ">
			<div class="text-right">
				<a href="" class="px-8 py-3 w-fit text-sm font-medium tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:opacity-90
					focus:outline-none">Agregar
				</a>
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
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Apellido</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
											<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Rol</th>
											<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
												<span class="sr-only">Edit</span>
											</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
										@foreach($users as $user)
											<tr>
												<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $user->name }}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->lastname }}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
												<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->category }}</td>
												<td class="whitespace-nowrap px-3 py-4 flex items-center gap-2 text-sm text-gray-500">
													<a href="{{ route('dashboard.user.edit', $user->id) }}" class="" aria-label="Editar el usuario {{$user->name}}">
														<button class="px-3 py-2 flex items-center gap-2 bg-blue-500 text-white rounded">
															<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
																<path stroke-linecap="round" stroke-linejoin="round"
																      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
															</svg>
															Editar
														</button>
													</a>
{{--													form para elimiinar usuario --}}
													<form action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Seguro deseas eliminar el usuario?')">
														@csrf
														@method('DELETE')
														<button type="submit" class="px-3 py-2 flex items-center gap-2 bg-red-500 text-white rounded" >
															<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
																<path stroke-linecap="round" stroke-linejoin="round"
																      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
															</svg>
															Eliminar
														</button>
													</form>
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