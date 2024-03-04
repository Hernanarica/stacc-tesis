<?php
/** @var \App\Models\Local $locals */
?>
@extends('layout.layout-dashboard')
@section('title', 'Panel de control | Locales')
@section('dashboard')
  <section>
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold leading-6 text-gray-900">Locales</h1>
          <p class="mt-2 text-sm text-gray-700">Lista de todos locales</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
          <form
            action="{{route('dashboard.locals.view')}}"
            method="get"
            class="flex items-center"
          >
            @csrf
            <div class="w-full">
              <label for="search" class="sr-only">Buscar</label>
              <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                  </svg>
                </div>
                <input
                  type="search"
                  name="search"
                  id="search"
                  class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  placeholder="Buscar local"
                  value="{{ request()->search }}"
                  list="locals-list"
                >
                <datalist id="locals-list">
                  @foreach($locals as $local)
                    <option value="{{ $local->name }}">
                  @endforeach
                </datalist>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-300">
              <thead>
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Nombre</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Teléfono</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Web</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                  <span class="sr-only">Actions</span>
                </th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
              @foreach($locals as $local)
                <tr>
                  <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                    <div class="flex items-center">
                      <div class="h-11 w-11 flex-shrink-0">
                        <img class="h-11 w-11 rounded-full" src="{{ asset('uploads/images/local/' . $local['cover-photo']) }}" alt="{{ $local->name }}">
                      </div>
                      <div class="ml-4">
                        <div class="font-medium text-gray-900">{{ $local->name }}</div>
                        <div class="mt-1 text-gray-500">{{ $local->street }} {{ $local['street-number'] }} ({{ $local->neighborhood->name }})</div>
                      </div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    <a href="tel:phone" target="_blank">{{ $local->phone }}</a>
                  </td>
                  <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    <a href="{{ $local->website }}" target="_blank">{{ $local->website }}</a>
                  </td>
                  <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                    @if($local->is_public)
                      <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Habilitado</span>
                    @else
                      <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Deshabilitado</span>
                    @endif
                  </td>
                  <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0 space-x-2">
                    @if($local->is_public)
                      <form action="{{ route('dashboard.locals.disable', $local->id)}}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="inline text-yellow-600 hover:text-yellow-900">Deshabilitar<span class="sr-only">, {{ $local->name }}</span></button>
                      </form>
                    @else
                      <form action="{{ route('dashboard.locals.enable', $local->id)}}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="inline text-green-600 hover:text-green-900">Habilitar<span class="sr-only">, {{ $local->name }}</span></button>
                      </form>
                    @endif
{{--                    <a href="{{ route('dashboard.local.edit', $local->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar<span class="sr-only">, {{ $local->name }}</span></a>--}}
                    <form
                      action="{{ route('local.delete', $local->id) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('¿Seguro deseas eliminar el local?')"
                    >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="inline text-red-600 hover:text-red-900">Eliminar<span class="sr-only">, {{ $local->name }}</span></button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div>
        {{ $locals->links() }}
      </div>
    </div>
  </section>
@endsection
