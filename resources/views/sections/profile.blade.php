<?php
  use \Illuminate\Support\Carbon;
/** @var \App\Models\User $user */
?>
@extends('layout.layout')
@section('title', 'Mi perfil')
@section('content')
  <section class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="px-4 sm:px-0">
      <h3 class="text-base font-semibold leading-7 text-gray-900">Información de tu perfil</h3>
{{--      <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>--}}
    </div>
    <div class="mt-6 border-t border-gray-100">
      <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Nombre completo</dt>
          <dd class="mt-1 flex text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
            <span class="flex-grow">{{ $user->name }} {{ $user->lastname }}</span>
            <span class="ml-4 flex-shrink-0">
              <button type="button" class="rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500">Actualizar</button>
            </span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Categoría for</dt>
          <dd class="mt-1 flex text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
            <span class="flex-grow">{{ $user->category }}</span>
            <span class="ml-4 flex-shrink-0">
              <button type="button" class="rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500">Actualizar</button>
            </span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
          <dd class="mt-1 flex text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
            <span class="flex-grow">{{ $user->email }}</span>
            <span class="ml-4 flex-shrink-0">
              <button type="button" class="rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500">Actualizar</button>
            </span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Fecha de alta en stacc</dt>
          <dd class="mt-1 flex text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
            <span class="flex-grow">{{ Carbon::parse($user->created_at)->format('Y-m-d') }}</span>
          </dd>
        </div>
      </dl>
    </div>
  </section>
@endsection
