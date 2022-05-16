<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-gray-800 leading-tight">
            {{ trans('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm ">
{{--                <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>--}}
                <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
                    <thead class="bg-gray-700 text-white">
                    <tr class="text-left border-b border-gray-300">
                        <th class="px-4 py-3">Id</th>
                        <th class="px-4 py-3">{{ trans('Name') }}</th>
                        <th class="px-4 py-3">{{ trans('Document') }}</th>
                        <th class="px-4 py-3">{{ trans('E-mail') }}</th>
                        <th class="px-4 py-3">{{ trans('Role') }}</th>
                        <th class="px-4 py-3">{{ trans('Actions') }}</th>
                        <th class="px-4 py-3">{{ trans('Status') }}</th>
                    </thead>
                    </tr>
                    </tr>
                    @foreach($usuarios as $usuario)
                    <tr class="bg-gray-600 border-b border-gray-600">
                        <td class="px-4 py-3">{{$usuario->id}}</td>
                        <td class="px-4 py-3">{{$usuario->name}}</td>
                        <td class="px-4 py-3">{{$usuario->document}}</td>
                        <td class="px-4 py-3">{{$usuario->email}}</td>
                        <td>
                            @if(!empty($usuario->getRoleNames()))
                                @foreach($usuario->getRoleNames() as $rolName)
                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <div class="flex flex-grow">
                                @can('editar-usuario')
                                    <div class="flex">
                                        <a  href="{{ route('usuarios.edit', $usuario) }}">
                                            <img src="https://cdn0.iconfinder.com/data/icons/ui-22/24/283-256.png" alt="" class="hover:bg-gray-400 transition duration-300 w-10 h-10 mr-2 rounded-lg"></a >
                                    </div>
                                @endcan
                                <div>
                                    <form action="/delete" method="POST"></form>
                                    @can('borrar-usuario')
                                        <form action="{{ route('usuarios.destroy' ,$usuario->id) }}" method="POST" class="formDelete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <img src="https://cdn3.iconfinder.com/data/icons/basicolor-essentials/24/007_remove_trash-512.png" alt="" class="hover:bg-red-400 transition duration-300 w-10 h-10 mr-2 rounded-full"></button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('statusChange', $usuario->id) }}"method="POST">
                                @method('PUT')
                                @csrf
                                <button class='relative bg-blue-500 text-white p-1 rounded text-1xl font-bold overflow-hidden' type="submit">{{$usuario->status}}</button></form>
                        </td>
                        @endforeach
                    </tr>
                        <div class="px-40">
                            <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center"  href="{{ route('usuarios.create') }}"><strong>Nuevo usuario</strong></a>
                        </div>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $usuarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
