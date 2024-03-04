<?php
/** @var \App\Models\Local[] $neighborhoods */

//echo '<pre>';
//print_r($errors);
//echo '</pre>';
?>
@extends('layout.layout')
@section('title', 'Registra tu local')
@section('content')
  <section class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-2xl lg:px-8">
    <form action="{{ route('locals.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Datos de locación</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
              <div class="mt-2">
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('name') }}"
                >
                @if($errors->has('name'))<span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>@endif
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="street" class="block text-sm font-medium leading-6 text-gray-900">Calle</label>
              <div class="mt-2">
                <input
                  type="text"
                  name="street"
                  id="street"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('street') }}"
                >
                @if($errors->has('street'))<span class="text-red-500 text-xs">{{ $errors->first('street') }}</span>@endif
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="street-number" class="block text-sm font-medium leading-6 text-gray-900">Número</label>
              <div class="mt-2">
                <input
                  type="number"
                  name="street-number"
                  id="street-number"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('street-number') }}"
                >
                @if($errors->has('street-number'))<span class="text-red-500 text-xs">{{ $errors->first('street-number') }}</span>@endif
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
              <div class="mt-2">
                <input
                  type="tel"
                  name="phone"
                  id="phone"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('phone') }}"
                >
                @if($errors->has('phone'))<span class="text-red-500 text-xs">{{ $errors->first('phone') }}</span>@endif
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="neighborhood_id" class="block text-sm font-medium leading-6 text-gray-900">Barrio</label>
              <div class="mt-2">
                <select
                  id="neighborhood_id"
                  name="neighborhood_id"
                  class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:max-w-xs sm:text-sm sm:leading-6"
                >
                  <option>Seleccionar</option>
                  @foreach($neighborhoods as $neighborhood)
                    <option value="{{ $neighborhood->id }}" @if(old('neighborhood_id') == $neighborhood->id) selected @endif>{{ $neighborhood->name }}</option>
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
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('map') }}"
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
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('website') }}"
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
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                >{{ old('description') }}</textarea>
                @if($errors->has('description'))<span class="text-red-500 text-xs">{{ $errors->first('description') }}</span>@endif
              </div>
              <p class="mt-3 text-sm leading-6 text-gray-600">Descripción del local, podés incluir datos históricos del local</p>
            </div>
            <div class="col-span-full">
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
                    <label for="cover-photo" class="relative cursor-pointer rounded-md bg-white font-semibold text-stacc-red focus-within:outline-none focus-within:ring-2 focus-within:ring-stacc-red focus-within:ring-offset-2">
                      <span>Cargar un archivo</span>
                      <input id="cover-photo" name="cover-photo" type="file" class="sr-only">
                    </label>
                  </div>
                  <p class="text-xs leading-5 text-gray-600">PNG, JPG</p>
                </div>
              </div>
              @if($errors->has('cover-photo'))<span class="text-red-500 text-xs">{{ $errors->first('cover-photo') }}</span>@endif
            </div>
            <div class="col-span-full">
              <label for="certificate" class="block text-sm font-medium leading-6 text-gray-900">Certificado</label>
              <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                  </svg>
                  <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="certificate" class="relative cursor-pointer rounded-md bg-white font-semibold text-stacc-red focus-within:outline-none focus-within:ring-2 focus-within:ring-stacc-red focus-within:ring-offset-2">
                      <span>Cargar un archivo</span>
                      <input id="certificate" name="certificate" type="file" class="sr-only">
                    </label>
                  </div>
                  <p class="text-xs leading-5 text-gray-600">PDF, PNG, JPG</p>
                </div>
              </div>
              @if($errors->has('certificate'))<span class="text-red-500 text-xs">{{ $errors->first('certificate') }}</span>@endif
            </div>
          </div>
        </div>
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Redes sociales</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Agrega tus redes sociales</p>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-2 sm:col-start-1">
              <label for="social-facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
              <div class="mt-2">
                <input
                  type="url"
                  name="social-facebook"
                  id="social-facebook"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('social-facebook') }}"
                >
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="social-instagram" class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
              <div class="mt-2">
                <input
                  type="url"
                  name="social-instagram"
                  id="social-instagram"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('social-instagram') }}"
                >
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="social-tiktok" class="block text-sm font-medium leading-6 text-gray-900">TikTok</label>
              <div class="mt-2">
                <input
                  type="url"
                  name="social-tiktok"
                  id="social-tiktok"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('social-tiktok') }}"
                >
              </div>
            </div>
          </div>
          @if($errors->has('social-networks'))<span class="text-red-500 text-xs">{{ $errors->first('social-networks') }}</span>@endif
        </div>
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Horarios de atención</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Agrega tus dias y horarios de atención</p>
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
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('monday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="monday-closing-time" class="sr-only">Lunes</label>
                  <input
                    type="time"
                    name="monday-closing-time"
                    id="monday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('monday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="tuesday" class="block text-sm font-medium leading-6 text-gray-900">Martes</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="tuesday-opening-time" class="sr-only">Martes</label>
                  <input
                    type="time"
                    name="tuesday-opening-time"
                    id="tuesday-opening-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('tuesday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="tuesday-closing-time" class="sr-only">Martes</label>
                  <input
                    type="time"
                    name="tuesday-closing-time"
                    id="tuesday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('tuesday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="wednesday" class="block text-sm font-medium leading-6 text-gray-900">Miércoles</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="wednesday-opening-time" class="sr-only">Miércoles</label>
                  <input
                    type="time"
                    name="wednesday-opening-time"
                    id="wednesday-opening-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('wednesday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="wednesday-closing-time" class="sr-only">Miércoles</label>
                  <input
                    type="time"
                    name="wednesday-closing-time"
                    id="wednesday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('wednesday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="thursday" class="block text-sm font-medium leading-6 text-gray-900">Jueves</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="thursday-opening-time" class="sr-only">Jueves</label>
                  <input
                    type="time"
                    name="thursday-opening-time"
                    id="thursday-opening-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('thursday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="thursday-closing-time" class="sr-only">Jueves</label>
                  <input
                    type="time"
                    name="thursday-closing-time"
                    id="thursday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('thursday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="friday" class="block text-sm font-medium leading-6 text-gray-900">Viernes</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="friday-opening-time" class="sr-only">Viernes</label>
                  <input
                    type="time"
                    name="friday-opening-time"
                    id="friday-opening-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('friday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="friday-closing-time" class="sr-only">Viernes</label>
                  <input
                    type="time"
                    name="friday-closing-time"
                    id="friday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('friday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="saturday" class="block text-sm font-medium leading-6 text-gray-900">Sábado</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="saturday-opening-time" class="sr-only">Sábado</label>
                  <input
                    type="time"
                    name="saturday-opening-time"
                    id="saturday-opening-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('saturday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="saturday-closing-time" class="sr-only">Sábado</label>
                  <input
                    type="time"
                    name="saturday-closing-time"
                    id="saturday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('saturday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="sunday" class="block text-sm font-medium leading-6 text-gray-900">Domingo</label>
              <div class="flex items-center justify-between gap-4">
                <div class="mt-2 flex-1">
                  <label for="sunday-opening-time" class="sr-only">Domingo</label>
                  <input
                    type="time"
                    name="sunday-opening-time"
                    id="sunday-opening-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('sunday-opening-time') }}"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="sunday-closing-time" class="sr-only">Domingo</label>
                  <input
                    type="time"
                    name="sunday-closing-time"
                    id="sunday-closing-time"
                    class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                    value="{{ old('sunday-closing-time') }}"
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <fieldset>
          <legend class="sr-only">Términos y condiciones</legend>
          <div class="space-y-5">
            <div class="relative flex items-start">
              <div class="flex h-6 items-center">
                <input
                  id="terms"
                  aria-describedby="terms"
                  name="terms"
                  type="checkbox"
                  class="h-4 w-4 rounded border-gray-300 text-stacc-red focus:ring-stacc-red"
                  @checked(old('terms'))
                >
              </div>
              <div class="ml-3 text-sm leading-6">
                <label for="terms" class="font-medium text-gray-900">Acepto</label>
                <span id="terms" class="text-gray-500"><span class="sr-only">Acepto </span>los términos y condiciones</span>
              </div>
            </div>
            @if($errors->has('terms'))<span class="text-red-500 text-xs">{{ $errors->first('terms') }}</span>@endif
          </div>
        </fieldset>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
        <button
          type="submit"
          class="rounded-md bg-stacc-red px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red"
        >Registrar</button>
      </div>
    </form>
  </section>
@endsection
