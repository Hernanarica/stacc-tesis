<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Local $local */
/** @var \App\Models\Neighborhoods[] $neighborhoods */
?>
@extends('layout.layout-dashboard')@section('title', 'Panel de control | Editar local' . $local->name)
@section('dashboard')
	<x-wrapper>
		<div>
			<a href="{{route('dashboard.locals.view')}}"
			   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
				<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				     xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					      d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
				</svg>
				Volver
			</a>
		</div>
		<div class="flex justify-center py-5">
			<form action="{{ route('dashboard.locals.update', ['id' => $local->id]) }}" enctype="multipart/form-data" method="post" class="form-edit">
				@csrf
				@method('PATCH')
				<div class="text-center">
					<h2 class="text-4xl font-bold text-center text-gray-700">Actualizar local</h2>
				</div>
				<div class="grid grid-cols-1 gap-6 mt-2 md:grid-cols-2">
					<div class="">
						<label for="name" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-person" viewBox="0 0 16 16">
								<path
									d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
							</svg>
							Nombre *
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="name"
						       id="name"
						       class="block w-full px-4 py-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa el nombre del local"
						       value="{{ old('name', $local->name) }}"
						       @error('name')
						       aria-describedby="error-name"
									 @enderror
						>
						@error('name')
						<div class="text-red-700" id="error-name">{{ $errors->first('name') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
					<div class="">
						<label for="url_site" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-globe" viewBox="0 0 16 16">
								<path
									d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
							</svg>
							Sitio web
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="url_site"
						       id="url_site"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa el link a tu web"
						       @error('url_site')
						       aria-describedby="error-url_site"
						       @enderror
						       value="{{ old('url_site', $local->url_site) }}"
						>
						@error('url_site')
						<div class="text-red-700" id="error-url_site">{{ $errors->first('url_site') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
				</div>
				<div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
					<div class="">
						<label for="address" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-geo-alt" viewBox="0 0 16 16">
								<path
									d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
								<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
							</svg>
							Dirección
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="address"
						       id="address"
						       class="block w-full px-4 py-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa la dirección del local"
						       @error('address')
						       aria-describedby="error-address"
						       @enderror
						       value="{{ old('address', $local->address) }}"
						>
						@error('address')
						<div class="text-red-700" id="error-address">{{ $errors->first('address') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
					{{--					mostrar los neighborhoods--}}
					<div class="">
						<label for="neighborhood_id" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-geo-alt" viewBox="0 0 16 16">
								<path
									d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
								<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
							</svg>
							Barrio
						</label>
						{{--@formatter:off--}}
						<select name="neighborhood_id"
						        id="neighborhood_id"
						        class="block w-full px-4 py-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						        @error('neighborhood_id')
						        aria-describedby="error-neighborhood_id"
							@enderror
						>
							<option value="{{$local->neighborhood->id}}">{{$local->neighborhood->name}}</option>
							@foreach($neighborhoods as $neighborhood)
								<option value="{{ $neighborhood->id }}"
								        @if(old('neighborhood_id') == $neighborhood->id) selected @endif
								>{{ $neighborhood->name }}</option>
							@endforeach
						</select>
						@error('neighborhood_id')
						<div class="text-red-700" id="error-neighborhood_id">{{ $errors->first('neighborhood_id') }}</div>
						@enderror
					</div>
				</div>
				<div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
					<div class="">
						<label for="opening_time" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-clock" viewBox="0 0 16 16">
								<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
							</svg>
							Apertura
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="opening_time"
						       id="opening_time"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa el horario de apertura EJ: 7h"
						       @error('opening_time')
						       aria-describedby="error-opening_time"
						       @enderror
						       value="{{ old('opening_time', $local->opening_time) }}"
						>
						@error('opening_time')
						<div class="text-red-700" id="error-opening_time">{{ $errors->first('opening_time') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
					<div class="">
						<label for="closing_time" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-clock-history" viewBox="0 0 16 16">
								<path
									d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
								<path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
								<path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
							</svg>
							Cierre
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="closing_time"
						       id="closing_time"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa el horario de cierre EJ: 23h"
						       @error('closing_time')
						       aria-describedby="error-closing_time"
						       @enderror
						       value="{{ old('closing_time', $local->closing_time) }}"
						>
						@error('closing_time')
						<div class="text-red-700" id="error-closing_time">{{ $errors->first('closing_time') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
				</div>
				<div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
					<div class="">
						{{--						mostrar en un div la imagen actual --}}
						<div class="flex flex-col items-center justify-center w-full h-64 p-6 text-center bg-white border border-gray-200 rounded-md mb-4">
							<p class="mb-3">
								Imagen Actual:
							</p>
							@if($local->image != null)
								<img src="{{ url('uploads/images/local/' . $local->image)}}" alt="{{ $local->image_alt }}" class="object-cover w-full h-full">
							@endif
						</div>
						<label for="image" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-camera" viewBox="0 0 16 16">
								<path
									d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
								<path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
							</svg>
							Imagen del local (Opcional solo si quieres cambiar el actual)
						</label>
						{{--@formatter:off--}}
						<input type="file"
						       name="image"
						       id="image"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Imagen del local"
						       @error('image')
						       aria-describedby="error-image"
						       @enderror
						       value="{{ old('image') }}"
						>
						@error('image')
						<div class="text-red-700" id="error-opening_time">{{ $errors->first('image') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
					<div class="">
						<label for="image_alt" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-chat-square-dots" viewBox="0 0 16 16">
								<path
									d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
								<path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
							</svg>
							Descripción del la imagen (opcional)
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Escribí una descripción del local"
						       name="image_alt"
						       id="image_alt"
						       aria-placeholder="Escribí una descripción del local"
						       @error('image_alt')
						       aria-describedby="error-image_alt"
						       @enderror
						       value="{{ old('image_alt', $local->image_alt) }} "
						>
						@error('image_alt')
						<div class="text-red-700" id="error-image_alt">{{$errors->first('image_alt')}}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
				</div>
				<div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
					<div class="">
						<label for="url_map" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-geo" viewBox="0 0 16 16">
								<path fill-rule="evenodd"
								      d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
							</svg>
							Iframe de google maps
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="url_map"
						       id="url_map"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
											focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa tu url de google maps"
						       @error('url_map')
						       aria-describedby="error-url_map"
						       @enderror
						       value="{{ old('url_map', $local->url_map) }}"
						>
						@error('url_map')
						<div class="text-red-700" id="error-url_map">{{ $errors->first('url_map') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
					<div class="">
						<label for="phone" class="block form-label mb-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline-block bi bi-telephone" viewBox="0 0 16 16">
								<path
									d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
							</svg>
							Teléfono
						</label>
						{{--@formatter:off--}}
						<input type="text"
						       name="phone"
						       id="phone"
						       class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
											focus:outline-none focus:ring focus:ring-opacity-40"
						       placeholder="Ingresa el número de teléfono"
						       @error('phone')
						       aria-describedby="error-phone"
						       @enderror
						       value="{{ old('phone', $local->phone) }}"
						>
						@error('phone')
						<div class="text-red-700" id="error-phone">{{ $errors->first('phone') }}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
				</div>
				<div class="mx-auto col-12 col-md-11">
					<div>
						{{--@formatter:off--}}
						@error('terms')
						<div class="text-red-700" id="error-opening_time">{{$errors->first('terms')}}</div>
						@enderror
						{{--@formatter:on--}}
					</div>
				</div>
				<div class="mt-6">
					<button type="submit"
					        class="w-full px-4 py-2 tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red rounded-md focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
						Actualizar
					</button>
				</div>
			</form>
		</div>
	</x-wrapper>
@endsection
