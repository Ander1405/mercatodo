<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-gray-800 leading-tight">
            {{ trans('Product Management') }}
        </h2>
    </x-slot>
    <div>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <thead class="bg-gray-700 text-white">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">Id</th>
                <th class="px-4 py-3">{{ trans('Name') }}</th>
                <th class="px-4 py-3">{{ trans('Image') }}</th>
                <th class="px-4 py-3">{{ trans('Price') }}</th>
                <th class="px-4 py-3">{{ trans('Stock') }}</th>
                <th class="px-4 py-3">{{ trans('Category') }}</th>
                <th class="px-4 py-3">{{ trans('Actions') }}</th>
                <th class="px-4 py-3">{{ trans('Status') }}</th>
            </tr>
            @foreach($products as $product)
                <tr class="bg-gray-600 border-b border-gray-600">
                    <td class="px-4 py-3">{{ $product->id }}</td>
                    <td class="px-4 py-3">{{ $product->name }}</td>
                    <td class="px-4 py-3">
                        <img src="/image/{{ $product->image }}" class="w-24">
                    </td>
                    <td class="px-4 py-3">{{$product->price}} {{ $currency }}</td>
                    <td class="px-10 py-3">{{$product->stock}}</td>
                    <td class="px-4 py-3"> {{$product->category->name}}</td>
                    <td class="px-4 py-3">
                        <div class="flex flex-grow">
                            <div>
                                {{-- boton editar--}}
                                <a href="{{ route('productos.edit', $product->id) }}">
                                    <img src="https://cdn0.iconfinder.com/data/icons/ui-22/24/283-256.png" alt=""
                                         class="hover:bg-gray-400 transition duration-300 w-10 h-10 mr-2 rounded-lg">
                                </a>
                            </div>
                            <div>
                                {{-- boton borrar--}}
                                <form action="{{ route('productos.destroy',$product->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img
                                            src="https://cdn3.iconfinder.com/data/icons/basicolor-essentials/24/007_remove_trash-512.png"
                                            alt=""
                                            class="hover:bg-red-400 transition duration-300 w-10 h-10 mr-2 rounded-full">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py">
                        <form action="{{ route('productStatus', $product->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button
                                class='relative bg-blue-500 text-white p-1 rounded text-1xl font-bold overflow-hidden'
                                type="submit">{{$product->status}}</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
            </thead>
            @can('crear-usuario')
                <div class="px-40  flex flex-grow">
                    <div class="mt-4 mr-4">
                        <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center"
                           type="button" href="{{ route('productos.create') }}"><strong>{{ trans('New') }}</strong></a>
                    </div>
                    <div class="mt-4 mr-4">
                        <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center"
                           href="{{ route('importsView') }}">{{ trans('Imports') }}</a>
                    </div>
                    <div class="mt-4 mr-4">
                        <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center"
                           href="{{ route('exportsView') }}">{{ trans('Exports') }}</a>
                    </div>
                    <div class="mt-4">
                        <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center"
                           href="{{ route('category.index') }}">{{ trans('Gestionar categoria') }}</a>
                    </div>
                </div>
            @endcan
        </table>
        <div class="pagination justify-content-end">
            {!! $products->links() !!}
        </div>
    </div>
</x-app-layout>

