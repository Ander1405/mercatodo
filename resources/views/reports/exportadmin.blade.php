<x-app-layout>
    <x-slot name="header">
        <div class="min-w-screen min-h-screen">
            <h1 class="py-14 text-center font-semibold text-4xl">Hisotrial de Reportes</h1>
            <table
                class="border-separate border border-slate-500 rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
                <thead class="bg-gray-700 text-white">
                <tr class="border-b border-gray-300">
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('ID del usuario') }}</th>
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('tipo de arhivo') }}</th>
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('fecha de creacion') }}</th>
                    <th class="text-center border border-slate-600 px-4 py-3">{{ trans('Actions') }}</th>
                </tr>
                @foreach($exports as $export)
                    <tr class="bg-gray-600 text-left border-b border border-slate-600">
                        <td class="text-center border border-slate-600 px-4 py-3">{{ $export->user_id }}</td>
                        <td class="border border-slate-600 px-12 py-3">{{ $export->type }}</td>
                        <td class="border border-slate-600 px-16 py-3">{{ $export->created_at }}</td>
                        <td class="border border-slate-600 px-16 py-3">
                            <a href="{{ $export->filename }}" class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-12 py-6 justify-center items-center font-semibold">
                                Descargar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
        </div>
        </div>
    </x-slot>
</x-app-layout>
