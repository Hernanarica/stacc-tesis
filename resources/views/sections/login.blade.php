@extends('layout.layout')
@section('title', 'Inicia sesion')
@section('content')
  <section>
    <div class="bg-white">
      <div class="flex h-screen justify-center">
        <div class="relative hidden bg-cover bg-login lg:block lg:w-2/3">
          <div class="flex h-full items-center bg-gray-900 bg-opacity-40 px-20">
            <div>
              <h2 class="text-4xl font-bold text-white">Brand</h2>
              <p class="mt-3 max-w-xl text-gray-300">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. In
                autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus
                molestiae
              </p>
            </div>
          </div>
        </div>

        <div class="mx-auto flex w-full max-w-md items-center justify-center px-6 lg:w-2/6">
          <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
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
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                    @if($errors->has('password'))
                      <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>

                <div>
                  <button type="submit"
                          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Sign in
                  </button>
                </div>
              </form>

              <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="{{ route('register.create') }}"
                   class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection