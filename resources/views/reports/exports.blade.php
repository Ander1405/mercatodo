<x-app-layout>
    <x-slot name="header">

        <div class="min-w-screen min-h-screen">
            <div class="mt-2 text-center font-bold text-white text-4xl">
                <h1 class="text-4xl text-black">Exporte de Productos</h1>
            </div>
            <div class="py-40">
                <div class=" container mx-auto bg-gray-400 p-14">
                    <form action="{{ route('exports') }}" method="GET">
                        @csrf

                        <div class="flex">
                            <div>
                                <label class="font-semibold text-white">Fecha inicial</label>
                                <input class=" border-b border-gray-600 rounded-lg" name="date" type="date">
                            </div>

                            <div>
                                <label class="font-semibold text-white">Fecha final</label>
                                <input class="rounded-lg" name="endDate" type="date">
                            </div>

                            <div>
                                <label class="font-semibold text-white">Precio inicial</label>
                                <input class="rounded-lg" name="price" type="number">
                            </div>

                            <div>
                                <label class="font-semibold text-white">Precio final</label>
                                <input class="rounded-lg" name="endPrice" type="number">
                            </div>

                            <div class="font-semibold text-black">Por categoria
                                <select class="form-control rounded-lg m-2" name="category_id" id="category_id">
                                    <option disabled selected>Seleccione categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="mt-4 sm:flex items-center bg-gray-400 rounded-lg overflow-hidden px-2 py-1 justify-between">
                            <div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto ">
                                <button class="font-semibold px-60 bg-white text-black text-base rounded-lg px-4 py-2 font-thin">Descargar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="min-w-screen min-h-screen">
                <div class="mt-2 text-center font-bold text-white text-4xl">
                    <h1 class="text-4xl text-black">Exporte de Products más vendidos por categoria</h1>
                </div>
                <div id="chart" class="py-8 px-8">

                </div>
                <div class="px-8">
                        <form  action="{{ route('export/bestseller') }}" method="GET">
                            @csrf
                            <h1 class="text-4xl font-semibold text-center py-6">Reporte de productos más vendidos por categoria</h1>
                            <div class="flex justify-center">
                                <button class="font-semibold px-60 bg-white text-black text-base rounded-lg px-4 py-2 font-thin">Descargar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </x-slot>
</x-app-layout>
