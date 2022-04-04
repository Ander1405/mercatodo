<!-- component -->
<div class="flex justify-center items-center">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- FUENTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</div>
<!-- Login y register -->
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ trans('Login') }}</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ trans('Resgister') }}</a>
            @endif
        @endauth
    </div>
@endif

<!-- Maquetacion de vista -->


</div>
<div class="min-h-screen min-w-screen">
    <h1 class="text-center text-4xl py-6 font-semibold flex flex-col" style="font-family: 'Lobster', cursive;">{{ trans('Welcome to') }}</h1>
    <div class="w-full px-60 flex flex-row justify-center">
        <div class="sm:w-1/2 relative mt-8">
            <div class="rounded hover:rounded-lg">
                <p class="p-6 text-xl font-semibold font-medium leading-3 text-white absolute top-0 right-0">Consolas</p>
                <div class="absolute bottom-0 left-0 p-6">
                    <h2 class="text-xl font-semibold 5 text-white py-6">Todo sobre consolas y video juegos</h2>
                    <button class="text-white">{{ trans('Read More') }}</button>
                </div>
            </div>
            <img src="https://m.media-amazon.com/images/I/61k6+cNM-mL._SL1500_.jpg" class="object-cover h-48 w-full"/>
        </div>
    </div>
    <div class="w-full px-60 flex flex-row justify-center">
        <div class="sm:w-1/2 relative mt-8 ">
            <div class="rounded hover:rounded-lg">
                <p class="p-6 text-xl font-semibold font-medium leading-3 text-white absolute top-0 right-0">Portatiles</p>
                <div class="absolute bottom-0 left-0 p-6">
                    <h2 class="text-xl font-semibold 5 text-white py-6">Todo sobre Portatiles</h2>
                    <button class="text-white">{{ trans('Read More') }}</button>
                </div>
            </div>
            <img src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2018/05/mejores-portatiles-trabajar_0.jpg?itok=1QivQLoz" class="object-cover h-48 w-full"/>
        </div>
    </div>
    <div class="w-full px-60 flex flex-row justify-center">
        <div class="sm:w-1/2 relative mt-8 ">
            <div class="rounded hover:rounded-lg">
                <p class="p-6 text-xl font-semibold font-medium leading-3 text-white absolute top-0 right-0">Ordenadores de mesa</p>
                <div class="absolute bottom-0 left-0 p-6">
                    <h2 class="text-xl font-semibold 5 text-white py-6">Todo sobre Pc's de mesa</h2>
                    <button class="text-white">{{ trans('Read More') }}</button>
                </div>
            </div>
            <img src="https://www.zonatech.es/wp-content/uploads/2020/04/jakob-owens-mQxttWjHFjA-unsplash-scaled.jpg" class="object-cover h-48 w-full"/>
        </div>
    </div>
    <div class="w-full px-60 flex flex-row justify-center">
        <div class="sm:w-1/2 relative mt-8 ">
            <div class="rounded hover:rounded-lg">
                <p class="p-6 text-xl font-semibold font-medium leading-3 text-white absolute top-0 right-0">Celulares</p>
                <div class="absolute bottom-0 left-0 p-6">
                    <h2 class="text-xl font-semibold 5 text-white py-6">Todo sobre celulares</h2>
                    <button class="text-white">{{ trans('Read More') }}</button>
                </div>
            </div>
            <img src="https://www.semana.com/resizer/dNzJWv_mn6oFPk68JhgQRFuIE_I=/1200x675/filters:format(jpg):quality(50)//cloudfront-us-east-1.images.arcpublishing.com/semana/P3PJSFUPJBARDACL4VDE3KPOMY.jpg" class="object-cover h-48 w-full"/>
        </div>
    </div>
    <div class="w-full px-60 flex flex-row justify-center pb-8">
        <div class="sm:w-1/2 relative mt-8">
            <div class="rounded hover:rounded-lg">
                <p class="p-6 text-xl font-semibold font-medium leading-3 text-white absolute top-0 right-0">Accesorios</p>
                <div class="absolute bottom-0 left-0 p-6">
                    <h2 class="text-xl font-semibold 5 text-white py-6">Todo sobre Accesorios tecnologicos</h2>
                    <button class="text-white">{{ trans('Read More') }}</button>
                </div>
            </div>
            <img src="https://www.avantel.co/blog/wp-content/uploads/2019/04/Echa-mano-de-10-gadgets-del-momento-y-haz-tu-vida-m%C3%A1s-f%C3%A1cil.jpg" class="object-cover h-48 w-full"/>
        </div>
    </div>





















