<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">

                    @can('crear-rol')
                        <a class="btn btn-warning" href="{{ route('roles.create') }}"><strong>{{trans('Create')}}</strong></a>
                    @endcan
                    <div class="bg-white rounded-lg shadow-sm text-center flex flex-col"></div>
                    <h1 style="background-color: chartreuse">
                        <strong> {{ trans('Roles table') }}</strong>
                    </h1>
                    <table class="table table-striped mt-2">
                        <thead style="background-color: chartreuse">
                        <th>Roles</th>
                        <th>{{ trans('Actions') }}</th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('editar.rol')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">{{ trans('Edit') }}</a>
                                    @endcan

                                    @can('borrar-rol')
                                        {!! Form::open(['method'=>'DELETE','route'=> ['roles.destroy', $role->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit(trans('Delete'), ['class' => 'btn btn-danger']) !!}
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
