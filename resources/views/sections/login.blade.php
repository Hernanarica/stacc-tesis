@extends('layout.layout')
@section('title', 'Inicia sesion')
@section('content')
  <section class="flex min-h-[calc(100vh-80px)] flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Inicia sesión</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          <div class="mt-2">
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
            >
            @if($errors->has('email'))
              <span class="text-red-500 text-xs">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
          </div>
          <div class="mt-2">
            <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-stacc-red sm:text-sm sm:leading-6"
            >
            @if($errors->has('password'))
              <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
            @endif
          </div>
        </div>

        <div>
          <button type="submit"
                  class="flex w-full justify-center rounded-md bg-stacc-red px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">
           Iniciar sesión
          </button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
       ¿No tienes una cuenta?
        <a href="{{ route('register.index') }}"
           class="font-semibold leading-6 text-stacc-red">Creala aquí</a>
      </p>
    </div>
  </section>
@endsection
