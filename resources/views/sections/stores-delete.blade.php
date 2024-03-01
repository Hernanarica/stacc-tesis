<?php
/** @var \App\Models\Local[] $local */
?>
@extends('layout.layout')
@section('title', 'Mis Locales | Pedir baja')
@section('content')
  <section class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="bg-white px-6 py-24 sm:py-32 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <p class="text-base font-semibold leading-7 text-indigo-600">Te ayudamos</p>
        <h2 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Solicitud de baja</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">
          <b>Queremos ayudarte a gestionar la baja de tu local({{ $local->name }}).</b>
          <br>
          Tu opinión es muy importante para nosotros y nos ayudará a mejorar nuestros servicios en el futuro.
          Por favor, toma unos minutos para completar el siguiente formulario y cuéntanos en detalle las razones por las que deseas dar de baja tu local.
        </p>
      </div>
    </div>
    <form action="" method="post" class="max-w-lg mx-auto space-y-5">
      <div>
        <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Contanos más</label>
        <div class="mt-2">
          <textarea rows="4" name="comment" id="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
      </div>
      <div>
        <button type="button" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enviar</button>
      </div>
    </form>
  </section>
@endsection