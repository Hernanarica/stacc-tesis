@extends('layout.layout')
@section('title', 'Panel de control')
@section('content')
	<x-wrapper>
		<div class="min-h-[calc(100vh-84px)] w-full flex">
			<nav class="w-1/4">
				<ul class="space-y-1">
					<li>
						<a href="{{ route('dashboard.users.view') }}" class="p-2 block hover:bg-gray-100 rounded-md">Usuarios</a>
					</li>
					<li>
						<a href="{{ route('dashboard.locals.view') }}" class="p-2 block hover:bg-gray-100 rounded-md">Locales</a>
					</li>
				</ul>
			</nav>
			
			<div class="w-3/4">
				@yield('dashboard')
			</div>
		</div>
	</x-wrapper>
@endsection