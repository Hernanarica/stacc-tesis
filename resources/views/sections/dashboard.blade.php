@extends('layout.layout-dashboard')
@section('dashboard')
  <section class="mx-auto min-h-[calc(100vh-80px)] max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="bg-white py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"> Panel de Control de Locales y Usuarios</h2>
          <p class="mt-6 text-base leading-7 text-gray-600">Gestiona eficientemente tus locales y usuarios desde un solo lugar.</p>
        </div>
        <div class="mx-auto mt-16 flex max-w-2xl flex-col gap-8 lg:mx-0 lg:mt-20 lg:max-w-none lg:flex-row lg:items-end">
          <div class="flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-gray-50 p-8 sm:w-3/4 sm:max-w-md sm:flex-row-reverse sm:items-end lg:w-72 lg:max-w-none lg:flex-none lg:flex-col lg:items-start">
            <p class="flex-none text-3xl font-bold tracking-tight text-gray-900">{{ $localsCant }}</p>
            <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
              <p class="text-lg font-semibold tracking-tight text-gray-900">Locales registrados</p>
{{--              <p class="mt-2 text-base leading-7 text-gray-600">Vel labore deleniti veniam consequuntur sunt nobis.</p>--}}
            </div>
          </div>
          <div class="flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-gray-900 p-8 sm:flex-row-reverse sm:items-end lg:w-full lg:max-w-sm lg:flex-auto lg:flex-col lg:items-start lg:gap-y-44">
            <p class="flex-none text-3xl font-bold tracking-tight text-white">{{ $usersCant }}</p>
            <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
              <p class="text-lg font-semibold tracking-tight text-white">Usuarios registrados y activos</p>
{{--              <p class="mt-2 text-base leading-7 text-gray-400">Eu duis porta aliquam ornare. Elementum eget magna egestas.</p>--}}
            </div>
          </div>
          <div class="flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-indigo-600 p-8 sm:w-11/12 sm:max-w-xl sm:flex-row-reverse sm:items-end lg:w-full lg:max-w-none lg:flex-auto lg:flex-col lg:items-start lg:gap-y-28">
            <p class="flex-none text-3xl font-bold tracking-tight text-white">{{ $opinionsCant }}</p>
            <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
              <p class="text-lg font-semibold tracking-tight text-white">Opiniones de nuestros usuarios</p>
{{--              <p class="mt-2 text-base leading-7 text-indigo-200">Eu duis porta aliquam ornare. Elementum eget magna egestas. Eu duis porta aliquam ornare.</p>--}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
