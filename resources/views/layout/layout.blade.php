<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Stacc | @yield('title', 'Bienvenido')</title>
  </head>
  <body>
    <header>
      <x-wrapper>
        <div class="flex justify-between items-center">
          <div>
            <a href="{{ route('home.index') }}">
              <img
                  src="{{ asset('src/assets/images/logos/logo_red.png') }}"
                  alt="stacc logo"
                  width="70"
                  class="align-middle"
              >
            </a>
          </div>

          <nav class="py-3 hidden lg:block">
            <ul class="flex items-center gap-6">
              <li>
                <a
                    href="{{ route('home.index') }}"
                    class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                >inicio</a>
              </li>
              <li>
                <a
                    href="{{ route('locals.index') }}"
                    class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                >Locales</a>
              </li>
              <li>
                <a
                    href="{{ route('contact.index') }}"
                    class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                >Contacto</a>
              </li>
              @auth()
                <li>
                  <a
                      href="{{ route('favorite.index') }}"
                      class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                  >Mis favoritos</a>
                </li>
                @role('owner')
                <li>
                  <a
                      href="{{ route('store.index') }}"
                      class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                  >Mis Locales</a>
                </li>
                @endrole
                @role('admin|owner')
                <li>
                  <a
                      href="{{ route('locals.create') }}"
                      class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                  >Crear local</a>
                </li>
                @endrole
                @role('owner|visitor')
                <li>
                  <a
                      href="{{ route('profile.index') }}"
                      class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                  >Mi perfil</a>
                </li>
                @endrole
                @role('admin')
                <li>
                  <a
                      href="{{ route('dashboard.index') }}"
                      class="inline-block w-full py-1 font-medium text-gray-600 text-md lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded"
                  >Panel de control</a>
                </li>
                @endrole
              @endauth
            </ul>
          </nav>

          <nav class="hidden lg:block">
            <ul class="flex items-center gap-3">
              @guest()
                <li>
                  <a
                      href="{{ route('login.index') }}"
                      class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400"
                  >Inicia sesion</a>
                </li>
                <li>
                  <a
                      href="{{ route('register.create') }}"
                      class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-gradient-to-r from-stacc-purple to-stacc-red focus:shadow-outline focus:outline-none"
                  >Registrate</a>
                </li>
              @endguest
              @auth()
                <form
                    action="{{ route('logout.index') }}"
                    method="post"
                    class="hidden lg:block"
                >
                  @csrf
                  <button type="submit"
                          class="flex items-center gap-2 py-1 lg:text-lg hover:bg-gray-100 lg:px-3 lg:py-2 rounded font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                    </svg>
                    Logout
                  </button>
                </form>
              @endauth
            </ul>
          </nav>

          <button class="lg:hidden" id="menuBtn">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-10 h-10 text-gray-500"
                id="iconOpen"
            >
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
              />
            </svg>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-10 h-10 text-gray-500 hidden"
                id="iconClose"
            >
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
        <nav class="py-3 hidden" id="navbar">
          <ul class="w-full h-fit space-y-2">
            <li>
              <a href="{{ route('home.index') }}" class="inline-block w-full py-1 font-medium text-gray-600 text-md">inicio</a>
            </li>
            <li>
              <a href="{{ route('locals.index') }}" class="inline-block w-full py-1 font-medium text-gray-600 text-md">Locales</a>
            </li>
            <li>
              <a href="{{ route('contact.index') }}" class="inline-block w-full py-1 font-medium text-gray-600 text-md">Contacto</a>
            </li>
            <li>
              <a href="{{ route('favorite.index') }}"
                 class="inline-block w-full py-1 font-medium text-gray-600 text-md">Mis favoritos</a>
            </li>
            @role('owner')
            <li>
              <a href="{{ route('store.index') }}" class="inline-block w-full py-1 font-medium text-gray-600 text-md">Mis
                locales</a>
            </li>
            @endrole
            @role('admin')
            <li>
              <a href="{{ route('locals.create') }}" class="inline-block w-full py-1 font-medium text-gray-600 text-md">Crear
                local</a>
            </li>
            @endrole
            @guest()
              <li>
                <a href="{{ route('login.index') }}" class="inline-block w-full py-1 font-medium text-gray-600 text-md">Inicia
                  sesion</a>
              </li>
              <li>
                <a href="{{ route('register.create') }}"
                   class="inline-block w-full py-1 font-medium text-gray-600 text-md">Registrate</a>
              </li>
            @endguest
            @auth()
              <form action="{{ route('logout.index') }}" method="post">
                @csrf
                <button type="submit" class="flex items-center gap-2 py-1 font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                  </svg>
                  Logout
                </button>
              </form>
            @endauth
          </ul>
        </nav>
      </x-wrapper>
    </header>
    {{--	 mensajes globales de notificaciones con estilos en tailwindcss	--}}

    @if(session('success'))
      <div
          class="fixed top-0 right-0 z-50 w-full max-w-xs mx-4 mt-4 overflow-hidden bg-green-500 rounded-lg shadow-lg pointer-events-auto md:max-w-xs message-session">
        <div class="overflow-hidden bg-green-500 rounded-lg shadow-xs">
          <div class="p-4">
            <div class="flex items-center">
              <div class="p-2 text-green-100 bg-green-600 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     stroke="currentColor" viewBox="0 0 24 24">
                  <path d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <div class="mx-3">
                <p class="text-sm font-medium text-white">
                  {{ session('success') }}
                </p>
              </div>
              <button
                  class="p-1 transition duration-150 ease-in-out rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor" id="close">
                  <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414l-4.293 4.293 4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414l4.293-4.293-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      @vite('resources/js/notification.js')
    @endif
    @if(session('error'))
      <div
          class="fixed top-0 right-0 z-50 w-full max-w-sm mx-4 mt-4 overflow-hidden bg-red-500 rounded-lg shadow-lg pointer-events-auto md:max-w-md message-session">
        <div class="overflow-hidden bg-red-500 rounded-lg shadow-xs">
          <div class="p-4">
            <div class="flex items center">
              <div class="p-2 text-red-100 bg-red-600 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     stroke="currentColor" viewBox="0 0 24 24">
                  <path d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <div class="mx-3">
                <p class="text-sm font-medium text-white">
                  {{ session('error') }}
                </p>
              </div>
              <button
                  class="p-1 transition duration-150 ease-in-out rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor" id="close">
                  <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414l-4.293 4.293 4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414l4.293-4.293-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      @vite('resources/js/notification.js')
    @endif
    <main>
      @yield('content')
    </main>
    <footer class="bg-white">
      <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
        <div class="flex justify-center space-x-6 md:order-2">
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Facebook</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">X</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">GitHub</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">YouTube</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
        <div class="mt-8 md:order-1 md:mt-0">
          <p class="text-center text-xs leading-5 text-gray-500">&copy; 2020 Your Company, Inc. All rights reserved.</p>
        </div>
      </div>
    </footer>

    @vite('resources/js/menu.js')
  </body>
</html>