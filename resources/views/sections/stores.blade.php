<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Mis Locales')
@section('content')
  <div class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Mis locales</h1>
        <p class="mt-2 text-sm text-gray-700">Una lista de todos tus locales</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="{{ route('locals.create') }}" class="block rounded-md bg-stacc-red px-3 py-2 text-center text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">Crear nuevo</a>
      </div>
    </div>

    @if($locals->isEmpty())
      <h1>No hay locales</h1>
    @else
      <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-300">
              <thead>
              <tr>
                <th scope="col" class="pr-3 pl-4 text-left text-sm font-semibold text-gray-900 py-3.5 sm:pl-0">Dirección</th>
                <th scope="col" class="px-3 text-left text-sm font-semibold text-gray-900 py-3.5">Contacto</th>
                <th scope="col" class="px-3 text-left text-sm font-semibold text-gray-900 py-3.5">Status</th>
                <th scope="col" class="relative pr-4 pl-3 py-3.5 sm:pr-0">
                  <span class="sr-only">Editar</span>
                  <span class="sr-only">Pedir baja</span>
                </th>
              </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
              @foreach($locals as $local)
                <tr>
                  <td class="whitespace-nowrap py-5 pr-3 pl-4 text-sm sm:pl-0">
                    <div class="flex items-center">
                      <div class="h-11 w-11 flex-shrink-0">
                        <img class="h-11 w-11 rounded-full" src="uploads/images/local/{{ $local['cover-photo'] }}" alt="{{ $local->name }}">
                      </div>
                      <div class="ml-4">
                        <div class="font-medium text-gray-900">{{ $local->name }}</div>
                        <div class="mt-1 text-gray-500">{{ $local->street }} {{ $local['street-number'] }} ({{ $local->neighborhood->name }})</div>
                      </div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    <a href="tel:{{ $local->phone }}" class="block text-gray-900">{{ $local->phone }}</a>
                    <a href="{{ $local->website }}" target="_blank" class="block mt-1 text-gray-500">{{ $local->website }}</a>
                  </td>
                  <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    @if($local->is_public)
                      <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Habilitado</span>
                    @else
                      <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Inhabilitado</span>
                    @endif
                  </td>
                  <td class="relative whitespace-nowrap py-5 pr-4 pl-3 text-right space-x-4 text-sm font-medium sm:pr-0">
                    <a href="{{ route('store.show', $local->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar<span class="sr-only">, {{ $local->name }}</span></a>
                    <a href="{{ route('store.delete', $local->id) }}" class="text-red-600 hover:text-red-900">Solicitar baja<span class="sr-only">, {{ $local->name }}</span></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection
