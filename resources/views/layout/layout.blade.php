<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
{{--    <link rel="stylesheet" href="{{ asset('build/assets/app.9ca12c93.css') }}">--}}
    <title>Stacc | @yield('title', 'Bienvenido')</title>
  </head>
  <body>
    <header class="bg-white">
      <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
          <a href="{{ route('home.index') }}" class="-m-1.5 p-1.5">
            <span class="sr-only">Stacc</span>
            <img class="h-8 w-auto" src="{{ asset('src/assets/images/logos/logo-red-stacc.png') }}" alt="logo de stacc">
          </a>
        </div>
        <div class="flex lg:hidden">
          <button type="button" id="btnMenuOpen" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Abrir menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ route('home.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Inicio</a>
            <a href="{{ route('locals.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Locales</a>
            <a href="{{ route('contact.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Contacto</a>
            @guest()
              <a href="{{ route('register.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Registrate</a>
            @endguest
            @auth()
              @role('owner')
                <a href="{{ route('store.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Mis locales</a>
              @endrole
              @role('visitor')
                <a href="{{ route('favorites.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Mis favoritos</a>
              @endrole
{{--              @role('admin|owner')--}}
{{--                <a href="{{ route('locals.create') }}" class="text-sm font-semibold leading-6 text-gray-900">Crear local</a>--}}
{{--              @endrole--}}
              @role('owner|visitor')
                <a href="{{ route('profile.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Mi perfil</a>
              @endrole
              @role('admin')
                <a href="{{ route('dashboard.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Panel de control</a>
              @endrole
            @endauth
        </div>
        @auth()
          <form action="{{ route('logout.index') }}" method="post" class="hidden m-0 lg:flex lg:flex-1 lg:justify-end">
            @csrf
            <button class="text-sm font-semibold leading-6 text-gray-900">({{ auth()->user()->name }}) Cerrar sesión <span aria-hidden="true">&rarr;</span></button>
          </form>
        @elseguest()
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="{{ route('login.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Iniciar sesión <span aria-hidden="true">&rarr;</span></a>
          </div>
        @endauth
      </nav>
      <!-- Mobile menu, show/hide based on menu open state. -->
      <div class="hidden lg:hidden" id="menuMob" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
          <div class="flex items-center justify-between">
            <a href="{{ route('home.index') }}" class="-m-1.5 p-1.5">
              <span class="sr-only">Stacc</span>
              <img class="h-8 w-auto" src="{{ asset('src/assets/images/logos/logo-red-stacc.png') }}" alt="Logo de stacc">
            </a>
            <button type="button" id="btnMenuClose" class="-m-2.5 rounded-md p-2.5 text-gray-700">
              <span class="sr-only">Close menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
              <div class="space-y-2 py-6">
                <a href="{{ route('home.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Inicio</a>
                <a href="{{ route('locals.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Locales</a>
                <a href="{{ route('contact.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contacto</a>
                @guest()
                  <a href="{{ route('register.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Registrate</a>
                @endguest
                @auth()
                  @role('owner')
                  <a href="{{ route('store.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Mis locales</a>
                  @endrole
                  @role('visitor')
                  <a href="{{ route('favorites.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Mis favoritos</a>
                  @endrole
                  {{--              @role('admin|owner')--}}
                  {{--                <a href="{{ route('locals.create') }}" class="text-sm font-semibold leading-6 text-gray-900">Crear local</a>--}}
                  {{--              @endrole--}}
                  @role('owner|visitor')
                  <a href="{{ route('profile.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Mi perfil</a>
                  @endrole
                  @role('admin')
                  <a href="{{ route('dashboard.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Panel de control</a>
                  @endrole
                @endauth
              </div>
              <div class="py-6">
                @auth()
                  <form action="{{ route('logout.index') }}" method="post" class="inline">
                    <button class="inline -mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Cerrar sesión <span aria-hidden="true">&rarr;</span></button>
                    @csrf
                  </form>
                @elseguest()
                  <a href="{{ route('login.index') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Iniciar sesión <span aria-hidden="true">&rarr;</span></a>
                @endauth
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    {{--	 mensajes globales de notificaciones con estilos en tailwindcss	--}}

    @if(session('success'))
      <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 message-session z-10">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
          <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="p-4">
              <div class="flex items-start">
                <div class="flex-shrink-0">
                  <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                  <p class="text-sm font-medium text-gray-900">¡Operación exitosa!</p>
                  <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
                </div>
                <div class="ml-4 flex flex-shrink-0">
                  <button type="button" id="close" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="sr-only">Cerrar</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @vite('resources/js/notification.js')
{{--      <script src="{{ asset('build/assets/notification.7de47a25.js') }}"></script>--}}
    @endif
    @if(session('error'))
      <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 message-session z-10">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
          <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="p-4">
              <div class="flex items-start">
                <div class="flex-shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-red-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                  </svg>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                  <p class="text-sm font-medium text-gray-900">¡Error!</p>
                  <p class="mt-1 text-sm text-gray-500">{{ session('error') }}</p>
                </div>
                <div class="ml-4 flex flex-shrink-0">
                  <button type="button" id="close" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="sr-only">Cerrar</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @vite('resources/js/notification.js')
{{--      <script src="{{ asset('build/assets/notification.7de47a25.js') }}"></script>--}}
    @endif
    <main>
      @yield('content')
    </main>
    <footer class="bg-white">
      <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
        <div class="flex justify-center space-x-6 md:order-2">
          <a href="https://www.facebook.com/profile.php?id=61556895635262" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Facebook</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://www.instagram.com/stacc.ok/" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="https://twitter.com/stacc_ok" target="_blank" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">X</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
            </svg>
          </a>
        </div>
        <div class="mt-8 md:order-1 md:mt-0">
          <p class="text-center text-xs leading-5 text-gray-500">2024 &copy;STACC Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>

    @vite('resources/js/menu.js')
{{--    <script src="{{ asset('build/assets/menu.e4bcc062.js') }}"></script>--}}
  </body>
</html>
