<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
{{--                <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>--}}
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                    <h1 class="bg-gray-800 text-white">
                        <strong>{{ trans('Users table') }}</strong>
                    </h1>
                    <table>
                        <thead class="bg-gray-800 text-white">
                        <th>id</th>
                        <th>{{ trans('Name') }}</th>
                        <th>{{ trans('E-mail') }}</th>
                        <th>Rol</th>
                        <th>{{ trans('Actions') }}</th>
                        <th>{{ trans('Status') }}</th>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>

                                <td>
                                    @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('editar-usuario')
                                    <a class="inline-flex bg-green-400 text-white rounded-full h-6 px-3 justify-center items-center" href="{{route('usuarios.edit', $usuario->id) }}">{{ trans('Edit') }}</a>
                                    @endcan
                                    <form action="/delete" method="POST"></form>

                                    <div>
                                        @can('borrar-usuario')
                                            <form action="{{ route('usuarios.destroy' ,$usuario->id) }}" method="POST" class="formDelete">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center" type="submit">{{ trans('Delete') }}</button>
                                            </form>
                                        @endcan
                                    </div>

                                </td>
                                <td>
                                    <form action="{{route('statusChange', $usuario->id) }}"method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class='relative bg-blue-500 text-white p-1 rounded text-1xl font-bold overflow-hidden' type="submit">{{$usuario->status}}</button></form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $usuarios->links() !!}
                    </div>
                </div>

                <a class="inline-flex bg-green-400 text-white rounded-full h-6 px-3 justify-center items-center"  href="{{ route('usuarios.create') }}"><strong>{{ trans('New') }}</strong></a>

            </div>
        </div>
    </div>
</x-app-layout>
