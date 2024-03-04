<?php
  use \Illuminate\Support\Carbon;
/** @var \App\Models\User $user */

if($user->category === 'admin') {
  $user->category = 'Administrador';
} elseif($user->category === 'owner') {
  $user->category = 'Dueño de local';
} elseif($user->category === 'visitor') {
  $user->category = 'Usuario normal';
}

?>
@extends('layout.layout')
@section('title', 'Mi perfil')
@section('content')
  <section class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8 lg:pt-[20px]">
    <div class="px-4 sm:px-0">
      <h3 class="text-base font-semibold leading-7 text-gray-900">Perfíl</h3>
      <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Todos la información de tu usuario</p>
    </div>
    <div class="mt-6 border-t border-gray-100">
      <dl class="divide-y divide-gray-100 ">
        <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Nombre completo</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-600 sm:mt-0">
            <span>{{ $user->name }} {{ $user->lastname }}</span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Categoría</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-600 sm:mt-0">
            <span class="flex-grow">{{ $user->category }}</span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-600 sm:mt-0">
            <span class="flex-grow">{{ $user->email }}</span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Fecha de alta en stacc</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-600 sm:mt-0">
            <span class="flex-grow">{{ Carbon::parse($user->created_at)->format('Y-m-d') }}</span>
          </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Imagen</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-600 sm:mt-0">
            <img
              class="h-24 w-24 rounded-full"
              src="{{ asset('uploads/images/profile/' . $user->image)   }}"
              alt="{{ $user->name }}"
            >
          </dd>
        </div>
      </dl>
    </div>
{{--    boton para mandarte a editar tu perfil, alinear a la derecha --}}
    <div class="flex justify-end mt-6">
      <a
        href="{{ route('profile.edit') }}"
        class="rounded-md bg-stacc-red px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red"
      >Editar perfil</a>
    </div>
  </section>
@endsection
