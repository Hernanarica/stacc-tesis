<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Locales')
@section('content')
  <x-wrapper>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <form
          action="{{route('locals.index')}}"
          method="get"
          class="flex items-center"
      >
        @csrf
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
            </svg>
          </div>
          <input
              name="search"
              type="text"
              id="simple-search"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:border-stacc-purple focus:ring-stacc-purple focus:outline-none focus:ring
						focus:ring-opacity-40 block w-full pl-10 p-2.5"
              placeholder="Buscar local"
              value=" {{request()->search}}"
          >
        </div>
        <button type="submit"
                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border bg-gradient-to-r from-stacc-purple to-stacc-red">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </form>
      {{--				leyenda que indica al usuario que el input busca por nombre y por barrio abajo del buscador --}}
      <div class="col-span-3 md:col-span-2 lg:col-span-3">
        <p class="text-sm text-gray-500 dark:text-gray-400">Busca por nombre o por barrio</p>
      </div>
    </div>
    <div class="min-h-[calc(100vh-140px)] mx-auto max-w-2xl py-12 sm:py-14 lg:max-w-8xl">
      <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
        @foreach($locals as $local)
          <div>
            <div class="relative">
              <div class="relative h-72 w-full overflow-hidden rounded-lg">
                <img
                    src="{{ asset('./uploads/images/local/' . $local['cover-photo'])}}"
                    alt="{{ $local->name }}"
                    class=" max-w-lg inline-block aspect-video object-cover shadow-xl"
                />
              </div>
              <div class="relative mt-4">
                <h3 class="text-lg font-semibold text-gray-900 ">
                  {{ $local->name }}
                </h3>
                <h3 class="text-sm font-medium text-gray-900">{{ $local->address }}
                   {{ $local->neighborhood->name }}</h3>
              </div>
              <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                <div aria-hidden="true"
                     class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                <p class="relative text-lg font-semibold text-white">{{$local->neighborhood->name}}</p>
              </div>
            </div>
            <div class="mt-6">
              <a
                  href="{{ route('locals.show', ['local' => $local->id]) }}"
                  class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200"
              >
                Ver más
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    {{ $locals->links('pagination::tailwind') }}
  </x-wrapper>
@endsection
