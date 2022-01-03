<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @can('crear-rol')
                        <a class="btn btn-warning" href="{{ route('roles.create') }}">Crear</a>
                    @endcan
                    <table class="table table-striped mt-2">
                        <thead style="background-color: #6777ef">
                        <th style="color: #fff">Rol</th>
                        <th style="color: #fff">Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('editar.rol')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                    @endcan

                                    @can('borrar-rol')
                                        {!! Form::open(['method'=>'DELETE','route'=> ['roles.destroy', $role->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
