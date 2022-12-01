<?php
/** @var \App\Models\Local[] $local */

?>
@extends('layout.layout')
@section('title', 'Mis Locales | Pedir baja')
@section('content')
	<x-wrapper>
		<div class="text-center mb-6">
			<h2 class="text-4xl font-bold text-center text-gray-700">Pedido de Eliminar</h2>
		</div>
		<div class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl mx-auto">
			<img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ url('/uploads/images/local/' . $local->image)}}" alt="{{$local->image_alt}}">
			<div class="flex flex-col justify-between p-4 leading-normal">
				<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$local->name}}</h5>
				<p class="mb-3 font-normal text-gray-700 ">{{$local->address}}</p>
			</div>
		</div>
		<div class="flex flex-col items-center justify-center w-full mt-4">
			<form action="" method="POST">
				<div class="flex flex-col items-center justify-center w-full mt-4">
					<div class="flex flex-col items-center justify-center w-full mt-4">
						<label class="block mb-2 text-sm font-bold text-gray-700" for="name">
							¿Por qué quieres dar de baja tu local?
						</label>
						<textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" cols="58" rows="4" name="reason" required></textarea>
					</div>
					<div class="flex flex-col items-center justify-center w-full mt-4">
						<button class="px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline" type="submit">
							Pedir baja
						</button>
					</div>
				</div>
			</form>
		</div>
	</x-wrapper>
@endsection