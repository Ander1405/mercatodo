<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-6 font-semibold text-center text-4xl text-gray-800 leading-tight">
            {{ trans('Product information') }}
        </h2>
    </x-slot>
<!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- component -->
<div class=" 2xl:mx-auto md:py-12 lg:px-20 md:px-6 py-9 px-4 bg-gray-200">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->


    <!-- Container for demo purpose -->
    <div class="container my-24 px-6 mx-auto ">

        <!-- Section: Design Block -->
        <section class="mb-32 text-gray-800 text-center md:text-left ">
            <div class="block rounded-lg shadow-lg bg-gray-200 border-2 border-gray-400">
                <div class="flex flex-wrap items-center">
                    <div class="grow-0 shrink-0 basis-auto block lg:flex w-full lg:w-6/12 xl:w-4/12">
                        <img src="/image/{{ $producto->image }}" class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />

                    </div>
                    <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-8/12">
                        <div class="px-6 py-12 md:px-12">
                            <h2 class="text-3xl font-bold mb-6 pb-2">{{ $producto->name }}</h2>
                            <p class="text-gray-500 mb-6 pb-2 text-xl">
                                {{ $producto->description }}
                            </p>
                            <div class="flex flex-wrap mb-6">
                                <div class="w-full lg:w-6/12 xl:w-4/12 mb-4">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                            </path>
                                        </svg>{{ $producto->storage }} De almacenamiento
                                    </p>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-4/12 mb-4">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                            </path>
                                        </svg>{{ $producto->ram }} GB de ram
                                    </p>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-4/12 mb-4">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                            </path>
                                        </svg>Procesador {{ $producto->processor }}
                                    </p>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-4/12 mb-4">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                            </path>
                                        </svg>Tarjeta grafica {{ $producto->graph }}
                                    </p>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-4/12 mb-4">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                            </path>
                                        </svg>Marca {{ $producto->brand }}
                                    </p>
                                </div>
                                <div class="w-full lg:w-6/12 xl:w-4/12 mb-4">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <svg class="w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                            </path>
                                        </svg>Precio {{ $producto->price }} {{ $currency }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('clients') }}" type="button"
                                    class="inline-block px-7 py-3 bg-gray-800 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
                                Regresar
                            </a>
                            <button type="button"
                                    class="inline-block px-7 py-3 bg-gray-800 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out">
                                Buy now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->
</div>
</x-app-layout>
