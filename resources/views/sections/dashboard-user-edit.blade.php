@php
    /** @var \Illuminate\Support\ViewErrorBag $errors */
    /** @var \App\Models\User $user */

    $categories = [
        'admin' => [
            'name' => 'Administrador',
            'value' => '1',
        ],
        'owner' => [
            'name' => 'Dueño de local',
            'value' => '2',
        ],
        'visitor' => [
            'name' => 'Usuario normal',
            'value' => '3',
        ]
    ];
@endphp
@extends('layout.layout-dashboard')
@section('title', 'Panel de control | Usuarios')
@section('dashboard')
  <section class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div>
      <a href="{{ route('dashboard.locals.view') }}" class="inline-flex items-center gap-x-1.5 rounded-md bg-stacc-red px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 h-5 w-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
        Volver
      </a>
    </div>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Editar usuario</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form
        action="{{ route('dashboard.user.update', $user->id) }}"
        method="POST"
        class="flex flex-col gap-6"
        enctype="multipart/form-data"
      >
        @csrf
        @method('PATCH')
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
            <div class="mt-2">
              <input
                  type="text"
                  name="name"
                  id="name"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('name', $user->name) }}"
              >
              @if($errors->has('name'))
                <span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
            <div class="mt-2">
              <input
                  type="text"
                  name="lastname"
                  id="lastname"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('lastname', $user->lastname) }}"
              >
              @if($errors->has('lastname'))
                <span class="text-red-500 text-xs">{{ $errors->first('lastname') }}</span>
              @endif
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input
                  type="text"
                  name="email"
                  id="email"
                  class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
                  value="{{ old('email', $user->email) }}"
              >
              @if($errors->has('name'))
                <span class="text-red-500 text-xs">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Categoría</label>
            <div class="mt-2">
              <select
                id="category"
                name="category"
                class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:max-w-xs sm:text-sm sm:leading-6"
              >
                <option value="">Seleccionar</option>
                @foreach($categories as $categoryName => $categoryInfo)
                  <option value="{{ $categoryInfo['value']}}" @if(old('category', $user->category) == $categoryName) selected @endif>{{ $categoryInfo['name'] }}</option>
                @endforeach
              </select>
              @if($errors->has('category'))
                <span class="text-red-500 text-xs">{{ $errors->first('category') }}</span>
              @endif
            </div>
          </div>
          <div class="sm:col-span-full">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
            <div class="mt-2">
              <input
                type="password"
                name="password"
                id="password"
                class="block w-full rounded-md border-0 placeholder:text-gray-400 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 py-1.5 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
              >
              @if($errors->has('password'))
                <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
              @endif
            </div>
          </div>
          <div class="col-span-full">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Imagen</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                     aria-hidden="true">
                  <path fill-rule="evenodd"
                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                        clip-rule="evenodd"/>
                </svg>
                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                  <label for="image"
                         class="relative cursor-pointer rounded-md bg-white font-semibold text-stacc-red focus-within:outline-none focus-within:ring-2 focus-within:ring-stacc-red focus-within:ring-offset-2">
                    <span>Cargar un archivo</span>
                    <input id="image" name="image" type="file" class="sr-only">
                  </label>
                </div>
              </div>
            </div>
            @if($errors->has('image'))
              <span class="text-red-500 text-xs">{{ $errors->first('image') }}</span>
            @endif
          </div>
        </div>
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-stacc-red px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">Actualizar datos</button>
        </div>
      </form>
    </div>
  </section>
@endsection
