<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-gray-800 leading-tight">
            {{ trans('Edit users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-300 border-b border-gray-200">

                    @if($errors->any())
                        <div class="alert alert-dark alert-dimissible fade show" role="alert">
                            <strong>Revise los campos!</strong>
                            @foreach($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dimiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                            @csrf
                            @method('PATCH')
                        <div class="grid grid-cols-1 md:grid-cols2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Name') }}:</label>
                                <input name="name" value="{{$usuario->name}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Surname') }}:</label>
                                <input name="surname" value="{{$usuario->surname}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Document') }}:</label>
                                <input name="document" value="{{$usuario->document}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Phone number') }}:</label>
                                <input name="phone_number" value="{{$usuario->phone_number}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Email Address') }}:</label>
                                <input name="email" value="{{$usuario->email}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Password') }}:</label>
                                <input name="password" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="password" required/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{ trans('Confirm Password') }}:</label>
                                <input name="confirm-password" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="password" required/>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>{{ trans('Role') }}</label>
                                    {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button class="border-2 border-purple-500 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-purple-500 transition duration-300" type="submit" class="btn btn-primary">{{ trans('Save') }}</button>
                                <a class="border-2 border-gray-600 text-black px-4 py-2 rounded-md text-1xl font-medium hover:bg-gray-500 transition duration-300" href="{{ route('usuarios.index') }}">{{ trans('Cancel') }}</a>
                            </div>
                            <div>

                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
