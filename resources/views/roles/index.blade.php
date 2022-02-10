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


                    <div class="bg-white rounded-lg shadow-sm text-center flex flex-col"></div>
                    <h1 class="bg-gray-800 text-white">
                        <strong> {{ trans('Roles table') }}</strong>
                    </h1>
                    <table >
                        <thead class="bg-gray-800 text-white">
                        <th>Roles</th>
                        <th>{{ trans('Actions') }}</th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('editar.rol')
                                        <a class="inline-flex bg-green-400 text-white rounded-full h-6 px-3 justify-center items-center" class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">{{ trans('Edit') }}</a>
                                    @endcan

                                    @can('borrar-rol')
                                            <form action="{{ route('roles.destroy' ,$role->id) }}" method="POST" class="formDelete">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center" type="submit">{{ trans('Delete') }}</button>
                                            </form>
                                    @endcan
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>
                @can('crear-rol')
                <a class="inline-flex bg-green-400 text-white rounded-full h-6 px-3 justify-center items-center" href="{{ route('roles.create') }}"><strong>{{trans('New')}}</strong></a>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
