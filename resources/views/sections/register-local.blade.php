<?php
/** @var \App\Models\Local[] $neighborhoods */
?>
@extends('layout.layout')
@section('title', 'Registra tu local')
@section('content')
  <section class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-2xl lg:px-8">
    <form action="{{ route('locals.create')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Datos de locación</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="street" class="block text-sm font-medium leading-6 text-gray-900">Calle</label>
              <div class="mt-2">
                <input
                  type="text"
                  name="street"
                  id="street"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="street-number" class="block text-sm font-medium leading-6 text-gray-900">Número</label>
              <div class="mt-2">
                <input
                  type="number"
                  name="street-number"
                  id="street-number"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
              <div class="mt-2">
                <input
                  type="tel"
                  name="phone"
                  id="phone"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="neighborhood" class="block text-sm font-medium leading-6 text-gray-900">Barrio</label>
              <div class="mt-2">
                <select
                  id="neighborhood"
                  name="neighborhood"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                >
                  <option>Seleccionar</option>
                  @foreach($neighborhoods as $neighborhood)
                    <option value="{{ $neighborhood->id }}" @if(old('neighborhood_id') == $neighborhood->id) selected @endif>{{ $neighborhood->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="map" class="text-sm font-medium leading-6 text-gray-900 flex items-center gap-1">Mapa
                <span>
                  <a href="https://www.google.com/maps" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
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
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Web</label>
              <div class="mt-2">
                <input
                  type="text"
                  name="website"
                  id="website"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
              </div>
            </div>
            <div class="col-span-full">
              <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
              <div class="mt-2">
                <textarea
                  id="description"
                  name="description"
                  rows="3"
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                ></textarea>
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
                    <label for="cover-photo" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                      <span>Upload a file</span>
                      <input id="cover-photo" name="cover-photo" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                </div>
              </div>
            </div>
            <div class="col-span-full">
              <label for="certificate" class="block text-sm font-medium leading-6 text-gray-900">Certificado</label>
              <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                  </svg>
                  <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="certificate" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                      <span>Upload a file</span>
                      <input id="certificate" name="certificate" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs leading-5 text-gray-600">PDF, PNG, JPG up to 10MB</p>
                </div>
              </div>
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
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
              </div>
            </div>
          </div>
        </div>
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base font-semibold leading-7 text-gray-900">Horarios de atención</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Agrega tus dias y horarios de atención</p>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3 sm:col-start-1">
              <label for="monday" class="block text-sm font-medium leading-6 text-gray-900">Lunes</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="monday-opening-time" class="sr-only">Lunes</label>
                  <input
                    type="time"
                    name="monday-opening-time"
                    id="monday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="monday-closing-time" class="sr-only">Lunes</label>
                  <input
                    type="time"
                    name="monday-closing-time"
                    id="monday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="tuesday" class="block text-sm font-medium leading-6 text-gray-900">Martes</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="tuesday-opening-time" class="sr-only">Martes</label>
                  <input
                    type="time"
                    name="tuesday-opening-time"
                    id="tuesday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="tuesday-closing-time" class="sr-only">Martes</label>
                  <input
                    type="time"
                    name="tuesday-closing-time"
                    id="tuesday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="wednesday" class="block text-sm font-medium leading-6 text-gray-900">Miércoles</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="wednesday-opening-time" class="sr-only">Miércoles</label>
                  <input
                    type="time"
                    name="wednesday-opening-time"
                    id="wednesday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="wednesday-closing-time" class="sr-only">Miércoles</label>
                  <input
                    type="time"
                    name="wednesday-closing-time"
                    id="wednesday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="thursday" class="block text-sm font-medium leading-6 text-gray-900">Jueves</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="thursday-opening-time" class="sr-only">Jueves</label>
                  <input
                    type="time"
                    name="thursday-opening-time"
                    id="thursday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="thursday-closing-time" class="sr-only">Jueves</label>
                  <input
                    type="time"
                    name="thursday-closing-time"
                    id="thursday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="friday" class="block text-sm font-medium leading-6 text-gray-900">Viernes</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="friday-opening-time" class="sr-only">Viernes</label>
                  <input
                    type="time"
                    name="friday-opening-time"
                    id="friday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="friday-closing-time" class="sr-only">Viernes</label>
                  <input
                    type="time"
                    name="friday-closing-time"
                    id="friday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="saturday" class="block text-sm font-medium leading-6 text-gray-900">Sábado</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="saturday-opening-time" class="sr-only">Sábado</label>
                  <input
                    type="time"
                    name="saturday-opening-time"
                    id="saturday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="saturday-closing-time" class="sr-only">Sábado</label>
                  <input
                    type="time"
                    name="saturday-closing-time"
                    id="saturday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
            <div class="sm:col-span-3">
              <label for="sunday" class="block text-sm font-medium leading-6 text-gray-900">Domingo</label>
              <div class="flex justify-between gap-4 items-center">
                <div class="mt-2 flex-1">
                  <label for="sunday-opening-time" class="sr-only">Domingo</label>
                  <input
                    type="time"
                    name="sunday-opening-time"
                    id="sunday-opening-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
                <span>a</span>
                <div class="mt-2 flex-1">
                  <label for="sunday-closing-time" class="sr-only">Domingo</label>
                  <input
                    type="time"
                    name="sunday-closing-time"
                    id="sunday-closing-time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
        <button
          type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >Registrar</button>
      </div>
    </form>
  </section>
@endsection
