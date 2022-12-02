@extends('layout.layout')
@section('title', 'Contacto')
@section('content')
		<x-wrapper>
			<div class="min-h-[calc(100vh-84px)] relative bg-white">
				<div class="absolute inset-0">
					<div class="absolute inset-y-0 left-0 w-1/2"></div>
				</div>
				<div class="relative mx-auto max-w-7xl lg:grid lg:grid-cols-5">
					<div class="py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
						<div class="mx-auto max-w-lg">
							<h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Contactanos</h2>
							<p class="mt-3 text-lg leading-6 text-gray-500">Envianos un email con tu consulta y nuestro equipo te responderá a la brevedad, saludos!</p>
						</div>
					</div>
					<div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
						<div class="mx-auto max-w-lg lg:max-w-none">
							<form
								action="#"
								method="POST"
								class="grid grid-cols-1 gap-y-6"
								id="form"
							>
								<div>
									<label for="name" class="sr-only">Nombre</label>
									<input type="text" name="name" id="name" autocomplete="name" class="block w-full bg-white border py-3 px-4 border-gray-300 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Nombre">
								</div>
								<div>
									<label for="email" class="sr-only">Email</label>
									<input id="email" name="email" type="email" autocomplete="email" class="block w-full bg-white border py-3 px-4 border-gray-300 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Email">
								</div>
								<div>
									<label for="phone" class="sr-only">Teléfono</label>
									<input type="text" name="phone" id="phone" autocomplete="tel" class="block w-full bg-white border py-3 px-4 border-gray-300 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Teléfono">
								</div>
								<div>
									<label for="message" class="sr-only">Mensaje</label>
									<textarea id="message" name="message" rows="4" class="block w-full bg-white border py-3 px-4 border-gray-300 rounded-md focus:border-stacc-purple focus:ring-stacc-purple
										focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Mensaje"></textarea>
								</div>
								<div>
									<button type="submit" class="px-8 py-3 w-fit text-sm font-medium tracking-wide text-white bg-gradient-to-r from-stacc-purple to-stacc-red
				rounded-md focus:opacity-90 focus:outline-none">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</x-wrapper>
@endsection
@vite('./resources/js/emailContact.js')