<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



{{--                <form method="POST" action="{{route('sale.store')}}">--}}


{{--                <form>--}}
{{--                <form class="py-2" action="{{route('sale.index')}}">--}}
{{--                   --}}
{{--                    <button class="bg-blue-400 text-white px-3 py-1 rounded-sm mx-2">--}}
{{--                        <i class="fas fa-trash"></i>Your orders--}}
{{--                    </button>--}}
{{--                </form>--}}

{{--                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-2">--}}
                    <h1 class="bg-indigo-500 text-3xl text-white text-center font-bold">{{trans('ShoppingCar')}}</h1>
                    <table class="table-fixed w-full ">
                        <thead>
                        <tr class="bg-indigo-500 text-white">
                            <th class="w-40 py-4 ...">{{ trans('Name') }}</th>
                            <th class="w-1/16 py-4 ...">{{ trans('Price') }}</th>
                            <th class="w-1/16 py-4 ...">{{trans('N° Productos')}}</th>
                            <th class="w-1/16 py-4 ...">{{ trans('Image') }}</th>
                            <th class="w-1/4 py-4 ...">{{trans('Actions')}}</th>
                            <th class="w-1/4 py-4 ...">{{trans('Total')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shoppingCar as $product)

                            <tr>
                                <td class="py-3 px-6">{{$product->product->name}}</td>
                                <td class="p-3 text-center">{{$product->product->price}} {{$currency}}</td>

                                <td>
                                    <form method="POST" action="{{ route('shoppingCars.items.update',['product'=>$product->product,]) }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="py-5">
                                            <input width="" id="quantity" name="quantity" type="number" min="1"
                                                   class="w-28 my-2 border-2 border-black-300 rounded "
                                                   value="{{ $product->quantity }}">
                                        </div>
                                        <div>
                                            <button class="bg-blue-400 text-white px-3 py-1 rounded-sm mx-2 rounded-md hover:bg-blue-800 transition duration-300">
                                                <i class="fas fa-trash"></i>{{ trans('Update') }}
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                <td class="p-3 text-center">
                                    <img src="{{asset('images/'.$product->product->image)}}" alt="">
                                </td>
                                <td class="p-3 flex justify-center">

                                    <form action="{{route('productos.show', $product->product->id)}}" method="POST">
                                        @csrf
                                        @method('get')
                                        <button class="bg-purple-600 text-white px-6 py-1 rounded-md text-1xl font-medium hover:bg-purple-500 transition duration-300 mx-2">
                                            <i class="fas fa-eye-slash"></i>{{ trans('Details') }}
                                        </button>
                                    </form>

{{--                                    @can('admin.index')--}}
{{--                                        <form action="{{route('productos.edit',$product->product->id)}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('get')--}}
{{--                                            <button class="bg-yellow-600 text-white px-3 py-1 rounded-sm mx-1">--}}
{{--                                                <i class="fas fa-trash"></i>Edit--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    @endcan--}}
                                    <form action="{{route('shoppingCarItem.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="bg-red-600 text-white px-6 py-1 rounded-md text-1xl font-medium hover:bg-red-700 transition duration-300 mx-2">
                                            <i class="fas fa-trash"></i>{{trans('Delete')}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        <form class="mt-6" action="{{ route('api.store') }}" method="POST">
                            @csrf
                            <h1 class="px-6 text-right ... font-bold"> Total: {{ $totalPrice }} </h1>
                            <button class="border-2 border-green-600 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-green-600 transition duration-300">Proceder con el pago</button>
                            <a class="border-2 border-blue-500 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300" href="{{ route('clients') }}"> Seguir comprando</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
