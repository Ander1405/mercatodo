<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                    <table class="table table-striped mt-2">
                        <thead style="background-color: #6777ef">
                        <th style="">ID</th>
                        <th style="color: #fff">Nombre</th>
                        <th style="color: #fff">E-mail</th>
                        <th style="color: #fff">Rol</th>
                        <th style="color: #fff">Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td style="display: none;"{{$usuario->id}}></td>
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
                                    <a class="btn btn-info" href="{{route('usuarios.edit', $usuario->id) }}">Editar</a>

                                    <form action="/delete" method="POST"></form>

                                    {!! Form::open(['method'=>'DELETE','route'=> ['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                    {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                        {!! $usuarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
