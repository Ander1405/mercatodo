<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class=" bg-gray-200 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 bg-gray-200">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg border-2 border-gray-400 bg-gray-200">
                    <h1 class="bg-gray-800 text-3xl text-white text-center font-bold">{{trans('ShoppingCar')}}</h1>
                    <table class="table-fixed w-full ">
                        <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="w-40 py-4 ...">{{ trans('Name') }}</th>
                            <th class="w-1/16 py-4 ...">{{ trans('Price') }}</th>
                            <th class="w-1/16 py-4 ...">{{trans('N° Productos')}}</th>
                            <th class="w-1/16 py-4 ...">{{ trans('Image') }}</th>
                            <th class="w-1/4 py-4 ...">{{trans('Actions')}}</th>
                            <th class="w-1/4 py-4 ...">{{trans('Total')}}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                        @foreach($shoppingCar as $product)

                            <tr>
                                <td class="py-3 px-6 pb-16">{{$product->product->name}}</td>
                                <td class="p-3 pb-16 text-center">{{$product->product->price}} {{$currency}}</td>

                                <td>
                                    <form method="POST" action="{{ route('shoppingCars.items.update',['product'=>$product->product,]) }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="py-5 px-20">
                                            <input width="" id="quantity" name="quantity" type="number" min="1"
                                                   class="w-28 my-2 border-2 border-black-300 rounded "
                                                   value="{{ $product->quantity }}">
                                        </div>
                                        <div>
                                            <button class="px-24">
                                                <i class="fas fa-trash"></i><img src="https://cdn3.iconfinder.com/data/icons/network-and-communications-8/32/network_system_update-256.png" alt="" class="w-12 h-12 mr-2 rounded-full hover:bg-blue-200 transition duration-300">
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                <td class="p-3 text-center px-28">
                                    <img src="{{ asset("/image/$product->$product->image") }}" class="w=24">
                                </td>
                                <td class="p-3 flex justify-center">

                                    <form action="{{route('productos.show', $product->product->id)}}" method="POST">
                                        @csrf
                                        @method('get')
                                        <button>
                                            <i class="fas fa-eye-slash"></i><img src="https://cdn2.iconfinder.com/data/icons/online-marketing-7/48/JD-40-512.png" alt=""class="hover:bg-gray-400 transition duration-300 w-16 h-16 mr-2 rounded-full">
                                        </button>
                                    </form>
                                    <form action="{{route('shoppingCarProduct.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="">
                                            <i class="fas fa-trash"></i><img src="https://cdn3.iconfinder.com/data/icons/basicolor-essentials/24/007_remove_trash-512.png" alt="" class="hover:bg-red-400 transition duration-300 w-14 h-14 mr-2 rounded-full">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 pb-6">
                        <form class="mt-6" action="{{ route('api.store') }}" method="POST">
                            @csrf
                            <h1 class="px-6 pr-44 text-right ... font-bold"> Total: {{ $totalPrice }} </h1>
                            <button class="border-2 border-green-600 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-green-600 transition duration-300">Proceder con el pago</button>
                            <a class="border-2 border-blue-500 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300" href="{{ route('clients') }}"> Seguir comprando</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
