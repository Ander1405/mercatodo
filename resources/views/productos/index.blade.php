<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ trans('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('productos.index')}}" method="GET">
                <div class="form-group d-inline-flex">
                    <input type="text" class="form-control" name="search" placeholder="Search here....." value="{{ request()->input('search') }}">
                    <span class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                    <button type="submit" class="bg-gray-500 rounded-full font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-600 mr-6">{{trans('Search')}}</button>
                </div>
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">

                    <h1 class="bg-gray-800 text-white">
                        <strong>{{ trans('Products table') }}</strong>
                    </h1>
                    <table>
                        <thead class="bg-gray-800 text-white">
                        <tr class="bg-gray-800 text-white">
                            <th>ID</th>
                            <th>{{ trans('Name') }}</th>
                            <th>{{ trans('Image') }}</th>
                            <th>{{ trans('Description') }}</th>
                            <th>{{ trans('Price') }}</th>
                            <th>{{ trans('Actions') }}</th>
                            <th>{{ trans('Status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <img src="/image/{{ $product->image }}"  class="w-24">
                                </td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}} {{ $currency }}</td>
                                <td>
                                    <div>
                                        {{-- boton editar--}}
                                        <a  class="inline-flex bg-green-400 text-white rounded-full h-6 px-3 py-2 justify-center items-center" href="{{ route('productos.edit', $product->id) }}">Editar</a>
                                    </div>
                                    <div>
                                        {{-- boton borrar--}}
                                        <form class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 py-2 justify-center items-center" action="{{ route('productos.destroy',$product->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('productStatus', $product->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class='relative bg-blue-500 text-white p-1 rounded text-1xl font-bold overflow-hidden' type="submit">{{$product->status}}</button></form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $products->links() !!}
                    </div>
                </div>
                <a class="inline-flex bg-green-400 text-white rounded-full h-6 px-3 justify-center items-center" type="button" href="{{ route('productos.create') }}"><strong>{{ trans('New') }}</strong></a>
            </div>
        </div>
    </div>
</x-app-layout>

