<x-app-layout>
    <x-slot name="header">

        <div class="min-w-screen min-h-screen">
            <h1 class="text-center font-semibold text-4xl">Gestión de categorias</h1>
                <div>
                    <div class="px-28 flex flex-grow">
                        <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center"
                           type="button" href="{{ route('category.create') }}"> Nueva categoria
                        </a>
                    </div>
                </div>
            <table class="border-separate border border-slate-500 rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
                <thead class="bg-gray-700 text-white">
                    <tr class="border-b border-gray-300">
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('ID') }}</th>
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('Name') }}</th>
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('Description') }}</th>
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('Actions') }}</th>
                </tr>
                    @foreach($categories as $category)
                <tr class="border-b border-gray-300">
                    <td class="text-center border border-slate-600 px-4 py-3">{{ $category->id }}</td>
                    <td class="text-center border border-slate-600 px-4 py-3">{{ $category->name }}</td>
                    <td class="text-center border border-slate-600 px-4 py-3">{{ $category->description }}</td>
                    <td class="text-center border border-slate-600 px-4 py-3">
                        <div class="flex flex-grow justify-center">
                            <div>
                                {{-- boton editar--}}
                                <a href="{{ route('category.edit', $category->id) }}">
                                    <img src="https://cdn0.iconfinder.com/data/icons/ui-22/24/283-256.png" alt=""
                                         class="hover:bg-gray-400 transition duration-300 w-10 h-10 mr-2 rounded-lg">
                                </a>
                            </div>
                            <div>
                                {{-- boton borrar--}}
                                <form action="{{ route('category.destroy',$category->id ) }}" method="POST">
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
                </tr>
                    @endforeach
                </thead>
            </table>

        </div>

    </x-slot>
</x-app-layout>
