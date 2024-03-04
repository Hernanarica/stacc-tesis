@extends('layout.layout')
@section('title', 'Home')
@section('content')
  <section>
    <div class="relative isolate">
      <div class="overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
          <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
            <div class="relative w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
              <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Descubre la deliciosa libertad sin gluten.</h1>
              <p class="mt-6 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none">Explora una amplia selección de restaurantes especializados en comida sin gluten para saborear sin preocupaciones</p>
              <div class="mt-10 flex items-center gap-x-6">
                <a href="{{ route('locals.index') }}" class="rounded-md bg-stacc-red px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">Buscar</a>
              </div>
            </div>
            <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
              <div class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                <div class="relative">
                  <img src="{{ asset("./src/assets/images/sg-06.jpg") }}" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
              </div>
              <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                <div class="relative">
                  <img src="{{ asset("./src/assets/images/sg-02.jpg") }}" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
                <div class="relative">
                  <img src="{{ asset("./src/assets/images/sg-03.jpg") }}" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
              </div>
              <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                <div class="relative">
                  <img src="{{ asset("./src/assets/images/sg-04.jpg") }}" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
                <div class="relative">
                  <img src="{{ asset("./src/assets/images/sg-01.jpg") }}" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="relative bg-gray-900">
      <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8 lg:py-48">
        <div class="mx-auto max-w-2xl text-center">
          <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Encuentra tu próxima comida sin gluten</h2>
          <p class="mt-4 text-lg leading-8 text-gray-400">Explora una amplia selección de restaurantes especializados en comida sin gluten para saborear sin preocupaciones.</p>
          <div class="mt-10">
            <a href="{{ route('locals.index')  }}" class="ml-4 rounded-md bg-stacc-red px-3 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">Buscar</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="bg-white py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
          <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Beneficios de STACC</h2>
          <p class="mt-6 text-lg leading-8 text-gray-600">Nuestros valores.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
          <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
            <div class="relative pl-16">
              <dt class="text-base font-semibold leading-7 text-gray-900">
                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-stacc-red">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                  </svg>

                </div>
                Acceso a una amplia variedad de restaurantes sin gluten
              </dt>
              <dd class="mt-2 text-base leading-7 text-gray-600">Sumérgete en nuestra selección exclusiva de restaurantes sin gluten. Una experiencia gastronómica variada y segura te espera.</dd>
            </div>
            <div class="relative pl-16">
              <dt class="text-base font-semibold leading-7 text-gray-900">
                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-stacc-red">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                  </svg>
                </div>
                Descubre sugerencias a tu medida
              </dt>
              <dd class="mt-2 text-base leading-7 text-gray-600">¡Encuentra exactamente lo que buscas de manera rápida y fácil con nuestras sugerencias a tu medida!.</dd>
            </div>
            <div class="relative pl-16">
              <dt class="text-base font-semibold leading-7 text-gray-900">
                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-stacc-red">
                  <svg width="29" height="29" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1328_40)">
                      <path d="M45.452 46.542C45.4549 47.5893 44.7571 48.5096 43.7381 48.8023C42.6928 49.1026 41.681 48.6917 41.1002 47.7255C37.9257 42.4441 34.6273 37.2419 31.1573 32.1492C30.6934 31.4684 30.2176 30.7958 29.7582 30.112C29.2028 29.2852 28.4357 28.711 27.4466 28.7569C26.1261 28.8181 25.3735 28.0707 24.6813 27.1536C23.0453 24.9862 21.6117 22.6851 20.2844 20.3208C19.3618 18.6774 18.4957 17.001 17.6521 15.3154C17.3786 14.7689 17.2474 14.1493 17.0714 13.5571C17.0293 13.4154 17.0574 13.2484 17.0725 13.0949C17.1186 12.6253 17.3468 12.3309 17.7393 12.2166C18.1461 12.0982 18.5166 12.23 18.8049 12.6123C19.265 13.2226 19.7169 13.8391 20.1743 14.4514C23.5686 18.9961 26.9115 23.5805 30.3763 28.0707C32.6441 31.0096 35.0501 33.8451 37.4649 36.6663C39.8644 39.4697 42.3517 42.198 44.8024 44.9576C45.2453 45.4563 45.4503 45.9413 45.452 46.542Z" fill="white"/>
                      <path d="M29.5051 30.5008C29.8553 31.0053 30.1662 31.472 30.4983 31.9231C30.642 32.1183 30.5101 32.2247 30.4179 32.3559C28.8189 34.631 27.1887 36.8848 25.6287 39.1863C23.6867 42.0513 21.8025 44.9555 19.8938 47.8431C19.2467 48.822 18.0493 49.1689 16.9997 48.6796C15.9356 48.1836 15.3719 47.0079 15.7298 45.9097C15.8473 45.5492 16.0706 45.1931 16.3303 44.9137C19.07 41.9665 21.8456 39.0525 24.5718 36.093C26.1407 34.3898 27.6373 32.62 29.1667 30.8803C29.268 30.7651 29.3708 30.6514 29.5051 30.5008Z" fill="white"/>
                      <path d="M32.2766 29.8029C31.9139 29.3523 31.5775 28.9346 31.2153 28.4846C31.6261 27.9863 32.0331 27.4922 32.4406 26.9985C32.7903 26.5748 33.136 26.1478 33.4917 25.7292C34.0135 25.1152 34.1536 24.4211 33.9439 23.6517C33.6783 22.6772 33.8763 21.8223 34.5404 21.0518C36.8645 18.3556 39.1767 15.6491 41.493 12.9461C41.6322 12.7837 41.7727 12.5479 42.0105 12.7511C42.2503 12.9559 42.0236 13.1425 41.9 13.3028C40.0544 15.6949 38.2048 18.084 36.356 20.4737C36.283 20.5681 36.2078 20.6609 36.1366 20.7566C36.0111 20.9253 35.9931 21.1221 36.1824 21.2175C36.2908 21.2721 36.5288 21.2389 36.6082 21.1527C36.9638 20.7671 37.2852 20.3498 37.6156 19.9413C39.2454 17.9264 40.8741 15.9105 42.5035 13.8952C42.5561 13.8302 42.6141 13.7695 42.6655 13.7037C42.7882 13.5466 42.9267 13.4455 43.1189 13.5926C43.3314 13.7553 43.2414 13.9224 43.1148 14.0865C42.8887 14.3796 42.6639 14.6737 42.4373 14.9665C40.7488 17.1481 39.06 19.3295 37.3713 21.5109C37.3494 21.5392 37.3269 21.5671 37.305 21.5956C37.1677 21.7745 37.0926 21.9678 37.3125 22.1245C37.506 22.2624 37.6739 22.1601 37.807 21.996C38.1756 21.5414 38.5434 21.0861 38.9113 20.6309C40.5254 18.6337 42.1401 16.637 43.7521 14.6381C43.8918 14.4649 44.0381 14.3205 44.2566 14.4946C44.4855 14.6771 44.3389 14.8504 44.2112 15.0155C42.3627 17.4053 40.5144 19.7954 38.6661 22.1854C38.5784 22.2988 38.4506 22.4016 38.4154 22.5296C38.3747 22.6777 38.3555 22.8941 38.435 22.9989C38.571 23.1782 38.762 23.0819 38.8887 22.9286C39.3301 22.3947 39.7673 21.8573 40.203 21.3187C41.7351 19.4246 43.266 17.5295 44.7974 15.6348C44.8124 15.6162 44.8281 15.5982 44.8441 15.5804C44.9767 15.4333 45.1007 15.2027 45.3351 15.3788C45.5694 15.5547 45.3927 15.7398 45.2755 15.902C44.7437 16.6373 44.2106 17.3717 43.6756 18.1047C42.0986 20.2652 40.5158 22.4215 38.9452 24.5867C38.3639 25.388 37.5943 25.7661 36.6101 25.7304C35.8169 25.7016 35.1707 25.9848 34.6859 26.6301C33.898 27.6787 33.1001 28.7199 32.2766 29.8029Z" fill="white"/>
                      <path d="M30.5372 60.0744C46.8501 60.0744 60.0744 46.8501 60.0744 30.5372C60.0744 14.2243 46.8501 1 30.5372 1C14.2243 1 1 14.2243 1 30.5372C1 46.8501 14.2243 60.0744 30.5372 60.0744Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1328_40">
                        <rect width="61.0744" height="61.0744" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                Variedad Sin Límites
              </dt>
              <dd class="mt-2 text-base leading-7 text-gray-600">Explora una amplia gama de restaurantes sin gluten, desde platos caseros reconfortantes hasta exquisiteces culinarias, todo en un solo lugar.</dd>
            </div>
            <div class="relative pl-16">
              <dt class="text-base font-semibold leading-7 text-gray-900">
                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-stacc-red">
                  <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                  </svg>
                </div>
                Seguridad Alimentaria Garantizada
              </dt>
              <dd class="mt-2 text-base leading-7 text-gray-600">Encuentra opciones deliciosas y seguras que satisfagan tus antojos sin comprometer tu salud ni preocuparte por la contaminación cruzada de gluten.</dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="bg-white py-32">
      <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
        <div class="mx-auto max-w-2xl">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Nuestro equipo</h2>
          <p class="mt-4 text-lg leading-8 text-gray-600">Somos un grupo dinámico de personas apasionadas por lo que hacemos.</p>
        </div>
        <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-2">
          <li>
            <img class="mx-auto h-56 w-56 rounded-full" src="{{ asset('src/assets/images/team/hernan.jpg') }}" alt="">
            <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Hernán Arica</h3>
            <p class="text-sm leading-6 text-gray-600">Tech lead</p>
            <ul role="list" class="mt-6 flex justify-center gap-x-6">
              <li>
                <a href="https://twitter.com/Hernan__Arica" target="_blank" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">X</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M11.4678 8.77491L17.2961 2H15.915L10.8543 7.88256L6.81232 2H2.15039L8.26263 10.8955L2.15039 18H3.53159L8.87581 11.7878L13.1444 18H17.8063L11.4675 8.77491H11.4678ZM9.57608 10.9738L8.95678 10.0881L4.02925 3.03974H6.15068L10.1273 8.72795L10.7466 9.61374L15.9156 17.0075H13.7942L9.57608 10.9742V10.9738Z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/hern%C3%A1n-arica-64ab7b149/" target="_blank" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">LinkedIn</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                  </svg>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <img class="mx-auto h-56 w-56 rounded-full" src="{{ asset('src/assets/images/team/albert.jpg') }}" alt="">
            <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Albert Villarroel</h3>
            <p class="text-sm leading-6 text-gray-600">Full stack</p>
            <ul role="list" class="mt-6 flex justify-center gap-x-6">
              <li>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">X</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M11.4678 8.77491L17.2961 2H15.915L10.8543 7.88256L6.81232 2H2.15039L8.26263 10.8955L2.15039 18H3.53159L8.87581 11.7878L13.1444 18H17.8063L11.4675 8.77491H11.4678ZM9.57608 10.9738L8.95678 10.0881L4.02925 3.03974H6.15068L10.1273 8.72795L10.7466 9.61374L15.9156 17.0075H13.7942L9.57608 10.9742V10.9738Z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">LinkedIn</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                  </svg>
                </a>
              </li>
            </ul>
          </li>

          <!-- More people... -->
        </ul>
      </div>
    </div>
  </section>
{{--  Sección de Búsqueda:

    Barra de búsqueda prominente donde los usuarios puedan ingresar la ubicación o el tipo de cocina que desean y hacer clic en "Buscar".
    Breve texto que anime a los usuarios a explorar las opciones de comida sin gluten disponibles en su área.

    --}}
  <section>
    <div class="bg-white">
      <div class="mx-auto max-w-7xl divide-y divide-gray-900/10 px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
        <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Preguntas frecuentes</h2>
        <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
          <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">¿Qué es el gluten y por qué es importante para las personas con sensibilidad al gluten?</dt>
            <dd class="mt-4 lg:col-span-7 lg:mt-0">
              <p class="text-base leading-7 text-gray-600">El gluten es una proteína que se encuentra en el trigo, la cebada, la avena y el centeno. Para las personas con sensibilidad al gluten, consumir alimentos que lo contienen puede causar molestias digestivas y otros síntomas.</p>
            </dd>
          </div>
          <!-- More questions... -->
        </dl>
        <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
          <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">¿Cómo garantizan que los platos sean libres de gluten en su restaurante?</dt>
            <dd class="mt-4 lg:col-span-7 lg:mt-0">
              <p class="text-base leading-7 text-gray-600">En nuestro restaurante, nos comprometemos a garantizar que todos nuestros platos sean completamente libres de gluten. Utilizamos ingredientes frescos y certificados sin gluten en todas nuestras preparaciones, y tomamos precauciones especiales para evitar la contaminación cruzada en la cocina.</p>
            </dd>
          </div>
        </dl>
        <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
          <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">¿Tienen un menú específico sin TACC o modificaciones disponibles en su menú regular?</dt>
            <dd class="mt-4 lg:col-span-7 lg:mt-0">
              <p class="text-base leading-7 text-gray-600">Sí, contamos con un menú específico sin TACC que ofrece una amplia variedad de opciones deliciosas y seguras para quienes siguen una dieta libre de gluten. Además, también podemos adaptar muchos de nuestros platos regulares para que sean sin gluten según las necesidades del cliente.</p>
            </dd>
          </div>
        </dl>
        <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
          <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">¿Tienen opciones sin gluten para personas con otras alergias alimentarias o restricciones dietéticas?</dt>
            <dd class="mt-4 lg:col-span-7 lg:mt-0">
              <p class="text-base leading-7 text-gray-600">Sí, además de ofrecer opciones sin gluten, también tenemos platos adaptados para personas con otras alergias alimentarias o restricciones dietéticas, como opciones vegetarianas, veganas y sin lácteos.</p>
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </section>
@endsection
