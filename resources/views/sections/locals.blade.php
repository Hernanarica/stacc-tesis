<?php
/** @var \App\Models\Local[] $locals */
?>
@extends('layout.layout')
@section('title', 'Locales')
@section('content')
  <section class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <form
          action="{{route('locals.index')}}"
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
{{--              list="locals"--}}
            >
{{--            <datalist id="locals">--}}
{{--              @foreach($locals as $local)--}}
{{--                <option value="{{ $local->name }} ({{ $local->neighborhood->name }})">--}}
{{--              @endforeach--}}
{{--            </datalist>--}}
          </div>
        </div>
      </form>
      {{--				leyenda que indica al usuario que el input busca por nombre y por barrio abajo del buscador --}}
      <div class="col-span-3 md:col-span-2 lg:col-span-3">
        <p class="text-sm text-gray-500 dark:text-gray-400">Busca por nombre o por barrio, recordá pulsar enter para buscar.</p>
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
                class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-50 py-2 px-8 text-sm font-medium text-gray-800 hover:bg-gray-100"
              >
                Ver más
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    {{ $locals->links('pagination::tailwind') }}
  </section>
@endsection
