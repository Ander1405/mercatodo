<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ trans('Products') }}
        </h2>
    </x-slot>

    <div class="pb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('clients')}}" method="GET">
                <div class="form-group d-inline-flex">
                    <input type="text" class="form-control" name="search" placeholder="Buscar" value="{{ request()->input('search') }}">
                    <span class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                    <button type="submit" class="bg-gray-500 rounded-full font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-600 mr-6">{{trans('Search')}}</button>
                </div>
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                    <div class="px-10 py-20 bg-gray-100 grid gap-10 lg:grid-cols-3">
                    @foreach($products as $product)
                    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer">
{{--                        <td>{{$product->id}}</td>--}}
                        <div>
                            <img  src="/image/{{ $product->image }}"/>
                        </div>
                        <div class="py-4 px-4 bg-white">
                            <td>{{$product->name}}</td>
                            <h3 class="text-md font-semibold text-gray-600"></h3>
                            <br>
                            <td>{{$product->price}} {{ $currency }}</td>
                            <div class="mt-5"><a class="border-2 border-blue-500 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-500 transition duration-300" href="{{ route('productos.show',$product->id) }}">{{ trans('Read More') }}</a></div>
                            </svg>
                        <form action="{{ route('shoppingCars.items.store',['shoppingCar'=>$shoppingCart, 'product'=>$product]) }}" method="POST">
                            @csrf
                            <button
                                class="mt-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                {{trans('Add to cart')}}
                            </button>
                            <input width="" id="quantity" name="quantity" type="number" min="1"
                                   class="w-28 my-2 border-2 border-black-300 rounded "
                                   placeholder="quantity">
                        </form>
                            </span>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="pagination justify-content-end">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





