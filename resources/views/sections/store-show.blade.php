<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Local $local */
/** @var \App\Models\Neighborhoods[] $neighborhoods */

$timeLunesOt = date('H:i', strtotime($local->schedules['monday']['opening-time']));
$timeLunesCt = date('H:i', strtotime($local->schedules['monday']['closing-time']));
$timeMartesOt = date('H:i', strtotime($local->schedules['tuesday']['opening-time']));
$timeMartesCt = date('H:i', strtotime($local->schedules['tuesday']['closing-time']));
$timeMiercolesOt = date('H:i', strtotime($local->schedules['wednesday']['opening-time']));
$timeMiercolesCt = date('H:i', strtotime($local->schedules['wednesday']['closing-time']));
$timeJuevesOt = date('H:i', strtotime($local->schedules['thursday']['opening-time']));
$timeJuevesCt = date('H:i', strtotime($local->schedules['thursday']['closing-time']));
$timeViernesOt = date('H:i', strtotime($local->schedules['friday']['opening-time']));
$timeViernesCt = date('H:i', strtotime($local->schedules['friday']['closing-time']));
$timeSabadoOt = date('H:i', strtotime($local->schedules['saturday']['opening-time']));
$timeSabadoCt = date('H:i', strtotime($local->schedules['saturday']['closing-time']));
$timeDomingoOt = date('H:i', strtotime($local->schedules['sunday']['opening-time']));
$timeDomingoCt = date('H:i', strtotime($local->schedules['sunday']['closing-time']));
?>
@extends('layout.layout')
@section('title', 'Editar local ' . $local->name)
@section('content')
  <section class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8 lg:pt-[20px]">
    <div class="mx-auto max-w-7xl space-y-5">
      <nav class="flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
          <li>
            <div>
              <a href="{{ route('store.index') }}" class="text-gray-400 hover:text-gray-500">
                <span>Mis locales</span>
              </a>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
              </svg>
              <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">{{$local->name}}</a>
            </div>
          </li>
        </ol>
      </nav>
      <div>
        <a href="{{ route('store.index') }}" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
          Volver
        </a>
      </div>
      <div class="pt-4">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Actualiza</h2>
        <p class="text-base leading-7 text-gray-900">Datos de {{$local->name}}</p>
      </div>
    </div>
    <div  class="w-full max-w-2xl mx-auto">

      <form action="{{ route('store.update', ['id' => $local->id]) }}" enctype="multipart/form-data" method="post" class="form-edit">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                <div class="mt-2">
                  <input
                      type="text"
                      name="name"
                      id="name"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('name', $local->name) }}"
                      @error('name')
                      aria-describedby="error-name"
                      @enderror
                  >
                  @error('name')
                  <span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>
                  @enderror
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="street" class="block text-sm font-medium leading-6 text-gray-900">Calle</label>
                <div class="mt-2">
                  <input
                      type="text"
                      name="street"
                      id="street"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('street', $local->street) }}"
                      @error('street')
                      aria-describedby="error-street"
                      @enderror
                  >
                  @error('street')
                  <span class="text-red-500 text-xs">{{ $errors->first('street') }}</span>
                  @enderror
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="street-number" class="block text-sm font-medium leading-6 text-gray-900">Número</label>
                <div class="mt-2">
                  <div class="mt-2">
                    <input
                        type="number"
                        name="street-number"
                        id="street-number"
                        class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        value="{{ old('street-number', $local['street-number']) }}"
                        @error('street-number')
                        aria-describedby="error-street-number"
                        @enderror
                    >
                    @error('street-number')
                    <span class="text-red-500 text-xs">{{ $errors->first('street-number') }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
                <div class="mt-2">
                  <input
                      type="number"
                      name="phone"
                      id="phone"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('phone', $local->phone) }}"
                      @error('phone')
                      aria-describedby="error-phone"
                      @enderror
                  >
                  @error('phone')
                  <span class="text-red-500 text-xs">{{ $errors->first('phone') }}</span>
                  @enderror
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="neighborhood_id" class="block text-sm font-medium leading-6 text-gray-900">Barrio</label>
                <div class="mt-2">
                  <select
                      id="neighborhood_id"
                      name="neighborhood_id"
                      class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                  >
                    <option value="{{$local->neighborhood->id}}">{{$local->neighborhood->name}}</option>
                    @foreach($neighborhoods as $neighborhood)
                      <option value="{{ $neighborhood->id }}"
                              @if(old('neighborhood_id') == $neighborhood->id) selected @endif>
                        {{ $neighborhood->name }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('neighborhood_id'))<span class="text-red-500 text-xs">{{ $errors->first('neighborhood_id') }}</span>@endif
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="map" class="flex items-center gap-1 text-sm font-medium leading-6 text-gray-900">Mapa
                  <span>
                        <a href="https://www.google.com/maps" target="_blank">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                          </svg>
                        </a>
                      </span>
                </label>
                <div class="mt-2">
                  <input
                      type="text"
                      name="map"
                      id="map"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('map', $local->map) }}"
                  >
                  @if($errors->has('map'))<span class="text-red-500 text-xs">{{ $errors->first('map') }}</span>@endif
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Web</label>
                <div class="mt-2">
                  <input
                      type="text"
                      name="website"
                      id="website"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('website', $local->website) }}"
                      @error('website')
                      aria-describedby="error-website"
                      @enderror
                  >
                  @if($errors->has('website'))<span class="text-red-500 text-xs">{{ $errors->first('website') }}</span>@endif
                </div>
              </div>
              <div class="col-span-full">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
                <div class="mt-2">
                  <textarea
                      id="description"
                      name="description"
                      rows="3"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >{{ old('description', $local->description) }}</textarea>
                  @if($errors->has('description'))<span class="text-red-500 text-xs">{{ $errors->first('description') }}</span>@endif
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Actualiza tu descripción del local, podés incluir datos históricos del local</p>
              </div>
              <div class="col-span-full">
                <div class="flex flex-col items-center justify-center w-full h-80 p-6 text-center bg-white border border-gray-200 rounded-md mb-4">
                  <p class="mb-3">
                    Imagen Actual:
                  </p>
                  @if($local['cover-photo'] != null)
                    <img src="{{ url('uploads/images/local/' . $local['cover-photo'])}}" alt="{{ $local->name }}" class="object-cover w-full h-full">
                  @endif
                </div>
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Imagen</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                  <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                         aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd"/>
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                      <label for="cover-photo" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Sube un archivo</span>
                        <input id="cover-photo" name="cover-photo" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">o arrastra y suelta</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF hasta 10MB</p>
                  </div>
                </div>
                @if($errors->has('cover-photo'))<span class="text-red-500 text-xs">{{ $errors->first('cover-photo') }}</span>@endif
              </div>
              <div class="col-span-full">
                {{--                  link que te mande a otra vista donde se muestre el pdf del CERTIFICADO --}}
                <a href="{{ asset('uploads/images/files/' . $local->certificate) }}" target="_blank" class="font-medium ">Click aquí para ver el <span class="font-bold uppercase text-indigo-600 hover:text-indigo-500">Certificado</span></a>

              </div>
              <div class="ml-4 flex-shrink-0">

              </div>
            </div>
          </div>
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Redes sociales</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Actualiza tus redes sociales</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              @if(!empty($local['social-networks']['facebook']))
                <div class="sm:col-span-2 sm:col-start-1">
                  <label for="social-facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                  <div class="mt-2">
                    <input
                        type="url"
                        name="social-facebook"
                        id="social-facebook"
                        class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        value="{{ old('social-facebook', $local['social-networks']['facebook']) }}"
                    >
                  </div>
                </div>
              @else
                <div class="sm:col-span-2 sm:col-start-1">
                  <label for="social-facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                  <div class="mt-2">
                    <input
                        type="url"
                        name="social-facebook"
                        id="social-facebook"
                        class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                  </div>
                </div>
              @endif
              @if(!empty($local['social-networks']['instagram']))
                <div class="sm:col-span-2">
                  <label for="social-instagram" class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
                  <div class="mt-2">
                    <input
                        type="url"
                        name="social-instagram"
                        id="social-instagram"
                        class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        value="{{ old('social-instagram', $local['social-networks']['instagram']) }}"
                    >
                  </div>
                </div>
              @else
                <div class="sm:col-span-2">
                  <label for="social-instagram" class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
                  <div class="mt-2">
                    <input
                        type="url"
                        name="social-instagram"
                        id="social-instagram"
                        class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                  </div>
                </div>
            </div>
            @endif
            @if(!empty($local['social-networks']['tiktok']))
              <div class="sm:col-span-2">
                <label for="social-tiktok" class="block text-sm font-medium leading-6 text-gray-900">TikTok</label>
                <div class="mt-2">
                  <input
                      type="url"
                      name="social-tiktok"
                      id="social-tiktok"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('social-tiktok', $local['social-networks']['tiktok']) }}"
                  >
                </div>
              </div>
            @else
              <div class="sm:col-span-2">
                <label for="social-tiktok" class="block text-sm font-medium leading-6 text-gray-900">Tiktok</label>
                <div class="mt-2">
                  <input
                      type="url"
                      name="social-tiktok"
                      id="social-tiktok"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            @endif
          </div>
          @if($errors->has('social-networks'))<span class="text-red-500 text-xs">{{ $errors->first('social-networks') }}</span>@endif
        </div>
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Horarios de atención</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Actualiza tus dias y horarios de atención</p>
          @if($errors->has('schedules'))<span class="text-red-500 text-xs">{{ $errors->first('schedules') }}</span>@endif
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3 sm:col-start-1">
              <label for="monday" class="block text-sm font-medium leading-6 text-gray-900">Lunes</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="monday-opening-time" class="sr-only">Lunes</label>
                  <input
                      type="time"
                      name="monday-opening-time"
                      id="monday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{old('monday-opening-time', $timeLunesOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="monday-closing-time" class="sr-only">Lunes</label>
                  <input
                      type="time"
                      name="monday-closing-time"
                      id="monday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('monday-closing-time', $timeLunesCt) }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="tuesday-opening-time" class="block text-sm font-medium leading-6 text-gray-900">Martes</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="tuesday-opening-time" class="sr-only">Martes</label>
                  <input
                      type="time"
                      name="tuesday-opening-time"
                      id="tuesday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('tuesday-opening-time', $timeMartesOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="tuesday-closing-time" class="sr-only">Martes</label>
                  <input
                      type="time"
                      name="tuesday-closing-time"
                      id="tuesday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('tuesday-closing-time', $timeMartesCt) }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="wednesday-opening-time" class="block text-sm font-medium leading-6 text-gray-900">Miércoles</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="wednesday-opening-time" class="sr-only">Miércoles</label>
                  <input
                      type="time"
                      name="wednesday-opening-time"
                      id="wednesday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('wednesday-opening-time', $timeMiercolesOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="wednesday-closing-time" class="sr-only">Miércoles</label>
                  <input
                      type="time"
                      name="wednesday-closing-time"
                      id="wednesday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('wednesday-closing-time', $timeMiercolesCt) }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="thursday-opening-time" class="block text-sm font-medium leading-6 text-gray-900">Jueves</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="thursday-opening-time" class="sr-only">Jueves</label>
                  <input
                      type="time"
                      name="thursday-opening-time"
                      id="thursday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('thursday-opening-time', $timeJuevesOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="thursday-closing-time" class="sr-only">Jueves</label>
                  <input
                      type="time"
                      name="thursday-closing-time"
                      id="thursday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('thursday-closing-time', $timeJuevesCt) }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="friday-opening-time" class="block text-sm font-medium leading-6 text-gray-900">Viernes</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="friday-opening-time" class="sr-only">Viernes</label>
                  <input
                      type="time"
                      name="friday-opening-time"
                      id="friday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('friday-opening-time', $timeViernesOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="friday-closing-time" class="sr-only">Viernes</label>
                  <input
                      type="time"
                      name="friday-closing-time"
                      id="friday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('friday-closing-time', $timeViernesCt) }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="saturday-opening-time" class="block text-sm font-medium leading-6 text-gray-900">Sábado</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="saturday-opening-time" class="sr-only">Sábado</label>
                  <input
                      type="time"
                      name="saturday-opening-time"
                      id="saturday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('saturday-opening-time', $timeSabadoOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="saturday-closing-time" class="sr-only">Sábado</label>
                  <input
                      type="time"
                      name="saturday-closing-time"
                      id="saturday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('saturday-closing-time', $timeSabadoCt) }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="sunday-opening-time" class="block text-sm font-medium leading-6 text-gray-900">Domingo</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="sunday-opening-time" class="sr-only">Domingo</label>
                  <input
                      type="time"
                      name="sunday-opening-time"
                      id="sunday-opening-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('sunday-opening-time', $timeDomingoOt) }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="sunday-closing-time" class="sr-only">Domingo</label>
                  <input
                      type="time"
                      name="sunday-closing-time"
                      id="sunday-closing-time"
                      class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      value="{{ old('sunday-closing-time', $timeDomingoCt) }}"
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button
              type="submit"
              class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
          >Actualizar</button>
        </div>
      </form>
    </div>
  </section>
@endsection
