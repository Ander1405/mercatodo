<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm ">
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <thead class="bg-gray-700 text-white">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">Id</th>
                <th class="px-4 py-3">Rol name</th>
                <th class="px-4 py-3">Description</th>
                <th class="px-4 py-3">Acciones</th>
            </tr>
            @foreach($roles as $role)
            <tr class="bg-gray-600 border-b border-gray-600">
                <td class="px-4 py-3">{{ $role->id }}</td>
                <td class="px-4 py-3">{{ $role->name }}</td>
                <td class="px-4 py-3">Description</td>
                    <td>
                        <div class="flex flex-grow">
                            @can('editar.rol')
                                <div>
                                    <a href="{{ route('roles.edit', $role->id) }}">
                                        <img src="https://cdn0.iconfinder.com/data/icons/ui-22/24/283-256.png" alt="" class="hover:bg-gray-400 transition duration-300 w-10 h-10 mr-2 rounded-lg">
                                    </a>
                                </div>
                            @endcan

                            @can('borrar-rol')
                                <div>
                                    <form action="{{ route('roles.destroy' ,$role->id) }}" method="POST" class="formDelete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src="https://cdn3.iconfinder.com/data/icons/basicolor-essentials/24/007_remove_trash-512.png" alt="" class="hover:bg-red-400 transition duration-300 w-10 h-10 mr-2 rounded-full"> </button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </td>
                @endforeach
            </tr>
            </thead>
            @can('crear-rol')
                <div class="px-40">
                    <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center" href="{{ route('roles.create') }}"><strong>{{trans('Nuevo Rol')}}</strong></a>
                </div>
            @endcan
        </table>
    </div>
        </div>
    </div>
</x-app-layout>

