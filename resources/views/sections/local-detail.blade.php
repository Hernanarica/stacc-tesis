@php
    use \Illuminate\Support\Carbon;
    /** @var \App\Models\Local $local */
    /** @var \App\Models\Opinion $opinions */

    $scores = ['1', '2', '3', '4', '5'];
    $currentDay = Str::lower(now()->dayName);
    $currentTime = now()->setTimezone('America/Argentina/Buenos_Aires')->format('H:i');

    Carbon::setLocale('es');
@endphp
@extends('layout.layout')
@section('title', $local->name)
@section('content')
  <section>
    <div class="mx-auto max-w-7xl px-6 space-y-5 lg:px-8">
      <nav class="flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
          <li>
            <div>
              <a href="{{ route('locals.index') }}" class="text-gray-400 hover:text-gray-500">
                <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                </svg>
                <span class="sr-only">Home</span>
              </a>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
              </svg>
              <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">{{$local->name}}</a>
            </div>
          </li>
        </ol>
      </nav>
      <div>
        <a href="{{ route('locals.index') }}" class="inline-flex items-center gap-x-1.5 rounded-md bg-stacc-red px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stacc-red">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>
          Volver
        </a>
      </div>
    </div>
    <div class="bg-white">
      <div class="relative isolate overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-6 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
            <h1 class="max-w-2xl text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl lg:col-span-2 xl:col-auto">{{ $local->name }}</h1>
            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
              <div class="flex items-center gap-3 mb-5">
                @if($local->schedules[$currentDay]['closing-time'] > $currentTime)
                  <span class="rounded-full bg-green-600/10 px-3 py-1 text-sm font-semibold leading-6 text-green-600 ring-1 ring-inset ring-green-600/10">Abierto</span>
                @else
                  <span class="rounded-full bg-red-600/10 px-3 py-1 text-sm font-semibold leading-6 text-red-600 ring-1 ring-inset ring-red-600/10">Cerrado</span>
                @endif
                <span>
                  @auth()
                    @if(!$local->isFavorited())
                      <form action="{{ route('favorites.store', [ 'id' => $local->id ]) }}" method="post">
                        @csrf
                        <button class="group">
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke-width="1.5"
                              stroke="currentColor"
                              class="h-7 w-7 text-gray-300 transition-colors duration-300 group-hover:fill-red-500 group-hover:text-red-600"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                          </svg>
                        </button>
                      </form>
                    @else
                      <form action="{{ route('favorites.destroy', [ 'id' => $local->id ]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="group">
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke-width="1.5"
                              stroke="currentColor"
                              class="h-7 w-7 fill-red-500 text-red-500 transition-colors duration-300"
                          >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                          </svg>
                        </button>
                      </form>
                    @endif
                  @endauth
                </span>
              </div>
              <p class="text-lg leading-8 text-gray-600">{{ $local->description }}</p>
              <div class="mt-10 flex items-center gap-x-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
                </svg>
                <a href="{{ $local->website }}" target="_blank" class="text-sm font-semibold leading-6 text-gray-900">Visitar web <span aria-hidden="true">→</span></a>
              </div>
            </div>
            <img src="{{ asset("uploads/images/local/" . $local['cover-photo'])}}" alt="" class="mt-10 w-full max-w-lg rounded-2xl object-cover aspect-[6/5] sm:mt-16 lg:mt-0 lg:max-w-none xl:row-span-2 xl:row-end-2 xl:mt-36">
          </div>
        </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
      </div>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
      <div class="mx-auto max-w-2xl px-4 py-6 sm:px-8 lg:max-w-7xl">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Información del restaurant</h3>
{{--        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Horario, fotos y dirección</p>--}}
      </div>
      <div class="border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Dirección</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->street }} {{ $local['street-number'] }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Barrio</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->neighborhood->name }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Teléfono</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->phone }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium text-gray-900">Descripción</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $local->description }}</dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Certificado</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul role="list" class="rounded-md border border-gray-200 divide-y divide-gray-100">
                <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <span class="truncate font-medium">certificado_libre_de_gluten.pdf</span>
                    </div>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                    <a href="{{ asset('uploads/images/files/' . $local->certificate) }}" target="_blank" class="font-medium text-stacc-purple">Descargar</a>
                  </div>
                </li>
              </ul>
            </dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Redes sociales</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul role="list" class="rounded-md border border-gray-200 divide-y divide-gray-100">
                @foreach($local['social-networks'] as $red => $url )
                  @if($red === 'facebook' && $url !== null)
                  <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                        <path class="cls-1" d="M14.164037,13.484648c0,.299105.000005.524451-.000002.749799-.000089,2.844209.001256,5.688419-.001142,8.532626-.000726.8613-.090041.948793-.953298.951587-1.030943.003336-2.061913.002895-3.09286.000031-.834086-.002318-.926402-.090238-.927227-.91303-.002859-2.844211-.001383-5.688418-.001553-8.532626-.000014-.226338,0-.452674,0-.765354-.901281,0-1.753154.001588-2.605018-.000448-.853223-.002039-.900853-.050259-.902521-.918419-.001946-1.011694-.003854-2.02341.000911-3.035088.003471-.737128.079882-.810614.83463-.814321.856428-.004207,1.712894-.000972,2.633968-.000972.014245-.262321.027847-.481062.037722-.699968.051521-1.14185-.017019-2.304445.177172-3.421418.437846-2.518448,2.262004-4.116881,4.807005-4.292854,1.178371-.081477,2.366143-.026139,3.549642-.034857.44439-.003273.602011.240058.599587.653842-.006264,1.068925-.008321,2.137961.000556,3.206849.003858.463815-.216169.648882-.666242.649663-.782509.00136-1.565869.007543-2.347218.045635-.81929.03994-1.122154.357711-1.139916,1.185055-.018355.854868-.004083,1.710433-.004083,2.638977,1.051419,0,2.056753-.001374,3.062084.000411.894739.001591.976063.083852.977042.984783.00114,1.049859-.010262,2.099858.003984,3.149523.006656.490334-.210234.689165-.690224.684145-1.085684-.011356-2.171568-.003572-3.352997-.003572Z"/>
                      </svg>
                      <div class="ml-4 flex min-w-0 flex-1 gap-2">
                        <span class="truncate font-medium">{{ $red }}</span>
                      </div>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                      <a href="{{ $url }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Visitar</a>
                    </div>
                  </li>
                  @elseif($red === 'instagram' && $url !== null)
                    <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm leading-6">
                      <div class="flex w-0 flex-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                          <path class="cls-1" d="M6.082612,23.553626c-3.228308-.334264-5.488924-2.618507-5.653831-5.853716-.168601-3.307688-.129178-6.628359-.096855-9.942528.010289-1.054862.149845-2.152223.473031-3.151627C1.603465,2.136491,3.452236.841498,5.967214.457512c.677527-.103444,1.369493-.15839,2.054718-.157406,3.040555.004369,6.081986-.000524,9.121256.073563,1.879786.045822,3.563515.665888,4.863836,2.111267,1.142489,1.269933,1.626377,2.814075,1.64529,4.463882.040265,3.513211.100843,7.033329-.069132,10.539842-.176692,3.645099-2.661193,5.971337-6.325544,6.14827-1.752726.084631-9.219437.119179-11.175026-.083304ZM2.353779,11.991032c.051991,1.801778.066568,3.605668.168155,5.404643.077236,1.367754.600087,2.553018,1.780574,3.35816.754819.514815,1.617959.763343,2.509437.770776,3.44131.02869,6.885118.085139,10.32391-.011455,2.321866-.065221,4.229976-1.904536,4.356223-4.223884.1344-2.469115.105407-4.947925.115985-7.42261.004699-1.098899-.026768-2.201718-.117542-3.296478-.192484-2.321346-1.584687-3.891414-3.901653-3.98627-3.613568-.147938-7.242019-.188338-10.85402-.035154-2.737036.116076-4.072318,1.619363-4.22797,4.355598-.096136,1.689991-.108005,5.086238-.1531,5.086675Z"/>
                          <path class="cls-1" d="M17.872306,13.400979c-.493932,2.21656-2.28408,4.004237-4.50185,4.492706-4.195944.924166-7.858711-2.528597-7.345478-6.66818.331493-2.67372,2.511999-4.862256,5.184643-5.202306,4.14786-.527747,7.600389,3.169758,6.662684,7.37778ZM8.140022,11.416577c-.381315,2.627641,1.835766,4.848954,4.466763,4.462462,1.645306-.241695,2.992124-1.580489,3.250701-3.223226.420204-2.669559-1.848683-4.942662-4.509022-4.505067-1.639671.269707-2.969801,1.621352-3.208442,3.265832Z"/>
                          <path class="cls-1" d="M19.673385,5.741891c-.000451.774637-.620783,1.400227-1.392904,1.404708-.773077.004487-1.403424-.613042-1.414353-1.385591-.01114-.787432.63674-1.441683,1.41869-1.432641.769056.008893,1.389017.639997,1.388567,1.413523Z"/>
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <span class="truncate font-medium">{{ $red }}</span>
                        </div>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="{{ $url }}" target="_blank" class="font-medium text-stacc-purple">Visitar</a>
                      </div>
                    </li>
                  @elseif($red === 'tiktok' && $url !== null)
                    <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm leading-6">
                      <div class="flex w-0 flex-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                          <path class="cls-1" d="M10.109563,12.876281c-1.777369-.236757-3.130199.247428-3.969233,1.755636-.697455,1.253711-.51396,2.767308.396039,3.83676.937343,1.101589,2.44436,1.51626,3.786511,1.041898,1.38799-.490566,2.314015-1.713997,2.333147-3.232961.032902-2.612158.011741-5.225004.012288-7.837561.000511-2.441657-.000255-4.883314-.000454-7.32497-.000021-.260941-.000003-.521883-.000003-.818763h3.956239c.052073.463857.069676.879334.148785,1.282749.461901,2.355463,2.354657,3.989511,4.845125,4.131276.544323.030985.723887.187423.700799.725344-.036611.852985-.045179,1.710822.003752,2.562621.036108.628618-.24082.801277-.80625.819065-1.587518.049943-2.979485-.424287-4.176989-1.467589-.174177-.151749-.345288-.307016-.654577-.58244,0,.428082.000054.684915-.000009.941748-.000604,2.49049.008291,4.981025-.004025,7.471456-.019585,3.960254-2.915086,7.139145-6.806889,7.491059-3.902186.352851-7.320525-2.239432-8.072776-6.121958-.88795-4.582898,3.019865-9.041011,7.666728-8.747861.324528.020472.649232.007304.645093.484589-.010117,1.166719-.003301,2.333585-.003301,3.589901Z"/>
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <span class="truncate font-medium">{{ $red }}</span>
                        </div>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="{{ $url }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Visitar</a>
                      </div>
                    </li>
                  @endif
                @endforeach
              </ul>
            </dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Mapa</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              {!! htmlspecialchars_decode($local->map) !!}
            </dd>
          </div>
          <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8 lg:max-w-7xl">
            <dt class="text-sm font-medium leading-6 text-gray-900">Horarios</dt>
            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
              <ul>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>
                      <span class="truncate font-medium capitalize">Lunes</span>
                      <span class="truncate font-medium">{{ $local['schedules']['monday']['opening-time'] }} a {{ $local['schedules']['monday']['closing-time'] }}</span>
                    </div>
                  </div>
                </li>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>
                      <span class="truncate font-medium capitalize">Martes</span>
                      <span class="truncate font-medium">{{ $local['schedules']['tuesday']['opening-time'] }} a {{ $local['schedules']['tuesday']['closing-time'] }}</span>
                    </div>
                  </div>
                </li>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>
                      <span class="truncate font-medium capitalize">Miércoles</span>
                      <span class="truncate font-medium">{{ $local['schedules']['wednesday']['opening-time'] }} a {{ $local['schedules']['wednesday']['closing-time'] }}</span>
                    </div>
                  </div>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>
                      <span class="truncate font-medium capitalize">Jueves</span>
                      <span class="truncate font-medium">{{ $local['schedules']['thursday']['opening-time'] }} a {{ $local['schedules']['thursday']['closing-time'] }}</span>
                    </div>
                  </div>
                </li>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>

                      <span class="truncate font-medium capitalize">Viernes</span>
                      <span class="truncate font-medium">{{ $local['schedules']['friday']['opening-time'] }} a {{ $local['schedules']['friday']['closing-time'] }}</span>
                    </div>
                  </div>
                </li>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>
                      <span class="truncate font-medium capitalize">Sábado</span>
                      <span class="truncate font-medium">{{ $local['schedules']['saturday']['opening-time'] }} a {{ $local['schedules']['saturday']['closing-time'] }}</span>
                    </div>
                  </div>
                </li>
                <li class="flex items-center justify-between py-2 pr-5 pl-4 text-sm leading-6">
                  <div class="flex w-0 flex-1 items-center">
                    <div class="ml-4 flex items-center min-w-0 flex-1 gap-2">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                      </span>
                      <span class="truncate font-medium capitalize">Domingo</span>
                      <span class="truncate font-medium">{{ $local['schedules']['sunday']['opening-time'] }} a {{ $local['schedules']['sunday']['closing-time'] }}</span>
                    </div>
                  </div>
                </li>
              </ul>
            </dd>
          </div>
          @auth()
            @role('visitor')
              <div class="mx-auto max-w-2xl px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-8 lg:max-w-7xl">
              <form
                  action="{{ route('opinions.store', ['user_id' => auth()->user()->id, 'local_id' => $local->id]) }}"
                  method="post"
                  class="space-y-6"
              >
                @csrf
                <div>
                  <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                  <div class="mt-2">
                    <input
                        id="title"
                        name="title"
                        type="text"
                        value="{{ old('title') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                    @if($errors->has('title'))
                      <span class="text-red-500 text-xs">{{ $errors->first('title') }}</span>
                    @endif
                  </div>
                </div>
                <div>
                  <div>
                    <label for="score" class="block text-sm font-medium leading-6 text-gray-900">Puntaje</label>
                    <select
                        id="score"
                        name="score"
                        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >
                      <option value="">Seleccionar</option>
                      @foreach($scores as $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('score'))
                      <span class="text-red-500 text-xs">{{ $errors->first('score') }}</span>
                    @endif
                  </div>
                </div>
                <div>
                  <div>
                    <label for="opinion" class="block text-sm font-medium leading-6 text-gray-900">Comentarios</label>
                    <div class="mt-2">
                    <textarea
                        rows="4"
                        name="opinion"
                        id="opinion"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                      @if($errors->has('opinion'))
                        <span class="text-red-500 text-xs">{{ $errors->first('opinion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div>
                  <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publicar</button>
                </div>
              </form>
            </div>
            @endrole
          @endauth
        </dl>
      </div>
    </div>
    @if($opinions->count() > 0)
      <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <h2 class="text-lg font-medium text-gray-900">Reseñas</h2>
          <div class="mt-6 border-t border-b border-gray-200 pb-10 space-y-10 divide-y divide-gray-200">
            @foreach($opinions as $opinion)
              <div class="pt-10 lg:grid lg:grid-cols-12 lg:gap-x-8">
                <div class="lg:col-span-8 lg:col-start-5 xl:col-span-9 xl:col-start-4 xl:grid xl:grid-cols-3 xl:items-start xl:gap-x-8">
                  <div class="flex items-center xl:col-span-1">
                    <div class="flex items-center">
                      @for ($i = 1; $i <= $opinion->score; $i++)
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                      @endfor
                    </div>
                    <p class="ml-3 text-sm text-gray-700">{{ $opinion->score }}<span class="sr-only"> out of 5 stars</span></p>
                  </div>
                  <div class="mt-4 lg:mt-6 xl:col-span-2 xl:mt-0">
                    <h3 class="text-sm font-medium text-gray-900">{{ $opinion->title }}</h3>
                    <div class="mt-3 text-sm text-gray-500 space-y-6">
                      <p>{{ $opinion->opinion }}</p>
                    </div>
                  </div>
                </div>
                <div class="mt-6 flex items-center text-sm lg:col-span-4 lg:col-start-1 lg:row-start-1 lg:mt-0 lg:flex-col lg:items-start xl:col-span-3">
                  <p class="font-medium text-gray-900">{{ $opinion->user->name }} {{ $opinion->user->lastname }}</p>
                  <time datetime="2021-01-06" class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:mt-2 lg:ml-0 lg:border-0 lg:pl-0">{{ Carbon::parse($opinion->created_at)->diffForHumans() }}</time>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
  </section>
@endsection
