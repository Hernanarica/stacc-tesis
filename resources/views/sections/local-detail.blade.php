<?php
  use \Illuminate\Support\Carbon;
/** @var \App\Models\Local $local */
/** @var \App\Models\Opinion $opinions */

$daysOfWeek = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo'];
$scores = ['1', '2', '3', '4', '5'];

//foreach ($daysOfWeek as $day) {
//  echo '<pre>';
//  print_r($local['schedules'][$day]['day']);
//  echo '</pre>';
//}
//dd($local['schedules']);
?>
@extends('layout.layout')
@section('title', $local->name)
@section('content')
  <section>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <nav class="flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
          <li>
            <div>
              <a href="{{ route('locals.index') }}" class="text-gray-400 hover:text-gray-500">
                <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                </svg>
                <span class="sr-only">Home</span>
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

    </div>
    <div class="bg-white">
      <div class="relative isolate overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-6 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
            <h1 class="max-w-2xl text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl lg:col-span-2 xl:col-auto">{{ $local->name }}</h1>
            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
              <div class="flex items-center gap-3">
                <span class="rounded-full bg-green-600/10 px-3 py-1 text-sm font-semibold leading-6 text-green-600 ring-1 ring-inset ring-indigo-600/10">Abierto</span>
                <span>
                  @auth()
                    @if(!$local->isFavorited())
                      <form action="{{ route('favorite.store', [ 'id' => $local->id ]) }}" method="post">
                        @csrf
                        <button class="group">
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke-width="1.5"
                              stroke="currentColor"
                              class="h-7 w-7 text-gray-300 transition-colors duration-300 group-hover:fill-red-500 group-hover:text-red-600"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                          </svg>
                        </button>
                      </form>
                    @else
                      <form action="{{ route('favorite.destroy', [ 'id' => $local->id ]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="group">
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke-width="1.5"
                              stroke="currentColor"
                              class="h-7 w-7 fill-red-500 text-red-500 transition-colors duration-300"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                          </svg>
                        </button>
                      </form>
                    @endif
                  @endauth
                </span>
              </div>
              <p class="text-lg leading-8 text-gray-600">{{ $local->description }}</p>
              <div class="mt-10 flex items-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 text-sm font-semibold text-white shadow-sm px-3.5 py-2.5 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="{{ $local->website }}" target="_blank" class="text-sm font-semibold leading-6 text-gray-900">Visitar web <span aria-hidden="true">→</span></a>
              </div>
            </div>
            <img src="{{ asset("uploads/images/" . $local['cover-photo'])}}" alt="" class="mt-10 w-full max-w-lg rounded-2xl object-cover aspect-[6/5] sm:mt-16 lg:mt-0 lg:max-w-none xl:row-span-2 xl:row-end-2 xl:mt-36">
          </div>
        </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
      </div>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
      <div class="mx-auto max-w-2xl px-4 py-6 sm:px-8 lg:max-w-7xl">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Applicant Information</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
      </div>
      <div class="border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Dirección</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->street }} {{ $local['street-number'] }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Barrio</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->neighborhood->name }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Teléfono</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->phone }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Descripción</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->description }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Certificado</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul role="list" class="rounded-md border border-gray-200 divide-y divide-gray-100">
                <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <span class="truncate font-medium">certificado_libre_de_gluten.pdf</span>
                    </div>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                    <a href="{{ asset('uploads/files/' . $local->certificate) }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                  </div>
                </li>
              </ul>
            </dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Redes sociales</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul role="list" class="rounded-md border border-gray-200 divide-y divide-gray-100">
                @foreach($local['social-networks'] as $red => $url )
                  <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                      </svg>
                      <div class="ml-4 flex min-w-0 flex-1 gap-2">
                        <span class="truncate font-medium">{{ $red }}</span>
                      </div>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <a href="{{ $url }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Visitar</a>
                    </div>
                  </li>
                @endforeach
              </ul>
            </dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Mapa</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              {!! htmlspecialchars_decode($local->map) !!}
            </dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Horarios</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul>
                @foreach($daysOfWeek as $day)
                  <li class="capitalize"><b>{{ $local['schedules'][$day]['day'] }}</b> - <span>{{ $local['schedules'][$day]['opening-time'] }} a {{ $local['schedules'][$day]['closing-time'] }}</span></li>
                @endforeach
              </ul>
            </dd>
          </div>
          @auth()
            <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-8 lg:max-w-7xl">
              <form
                  action="{{ route('opinions.store', ['user_id' => auth()->user()->id, 'local_id' => $local->id]) }}"
                  method="post"
                  class="space-y-6"
              >
                @csrf
                <div>
                  <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                  <div class="mt-2">
                    <input
                        id="title"
                        name="title"
                        type="text"
                        value="{{ old('title') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                    @if($errors->has('title'))
                      <span class="text-red-500 text-xs">{{ $errors->first('title') }}</span>
                    @endif
                  </div>
                </div>
                <div>
                  <div>
                    <label for="score" class="block text-sm font-medium leading-6 text-gray-900">Puntaje</label>
                    <select
                        id="score"
                        name="score"
                        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                      <option value="">Seleccionar</option>
                      @foreach($scores as $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('score'))
                      <span class="text-red-500 text-xs">{{ $errors->first('score') }}</span>
                    @endif
                  </div>
                </div>
                <div>
                  <div>
                    <label for="opinion" class="block text-sm font-medium leading-6 text-gray-900">Comentarios</label>
                    <div class="mt-2">
                    <textarea
                        rows="4"
                        name="opinion"
                        id="opinion"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                      @if($errors->has('opinion'))
                        <span class="text-red-500 text-xs">{{ $errors->first('opinion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div>
                  <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Comentar</button>
                </div>
              </form>
            </div>
          @endauth
        </dl>
      </div>
    </div>
    @if($opinions->count() > 0)
      <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <h2 class="text-lg font-medium text-gray-900">Reseñas</h2>
          <div class="mt-6 border-t border-b border-gray-200 pb-10 space-y-10 divide-y divide-gray-200">
            @foreach($opinions as $opinion)
              <div class="pt-10 lg:grid lg:grid-cols-12 lg:gap-x-8">
                <div class="lg:col-span-8 lg:col-start-5 xl:col-span-9 xl:col-start-4 xl:grid xl:grid-cols-3 xl:items-start xl:gap-x-8">
                  <div class="flex items-center xl:col-span-1">
                    <div class="flex items-center">
                      @for ($i = 1; $i <= $opinion->score; $i++)
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                      @endfor
                    </div>
                    <p class="ml-3 text-sm text-gray-700">{{ $opinion->score }}<span class="sr-only"> out of 5 stars</span></p>
                  </div>
                  <div class="mt-4 lg:mt-6 xl:col-span-2 xl:mt-0">
                    <h3 class="text-sm font-medium text-gray-900">{{ $opinion->title }}</h3>

                    <div class="mt-3 text-sm text-gray-500 space-y-6">
                      <p>{{ $opinion->opinion }}</p>
                    </div>
                  </div>
                </div>
                <div class="mt-6 flex items-center text-sm lg:col-span-4 lg:col-start-1 lg:row-start-1 lg:mt-0 lg:flex-col lg:items-start xl:col-span-3">
                  <p class="font-medium text-gray-900">{{ $opinion->user->name }} {{ $opinion->user->lastname }}</p>
                  <time datetime="2021-01-06" class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:mt-2 lg:ml-0 lg:border-0 lg:pl-0">{{ Carbon::parse($opinion->current_date)->diffForHumans() }}</time>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
  </section>
@endsection