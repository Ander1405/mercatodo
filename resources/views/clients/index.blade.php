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
                            <td class="mt-4 text-lg font-thin">{{$product->description}}</td>
                            <br>
                            <td>{{$product->price}} {{ $currency }}</td>
                            <span class="flex items-center justify-center mt-4 w-full bg-yellow-400 hover:bg-yellow-500 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <button class="font-semibold text-gray-800">Add to car</button>
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





