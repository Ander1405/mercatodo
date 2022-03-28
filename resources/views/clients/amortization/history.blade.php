<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('History pay') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">

                    <table>
                        <thead class="bg-gray-800 text-white">
                        <tr class="bg-indigo-500 text-white">
                            <th>{{ trans('Request') }}</th>
                            <th>{{ trans('Monto') }}</th>
                            <th>{{ trans('status') }}</th>
                            <th>{{ trans('paid at') }}</th>
                            <th>{{ trans('Acciones') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($amortizations as $amortization)
                            <tr>
                                <td>{{$amortization->request_id}}</td>
                                <td>{{$amortization->amount}} {{ $currency }}</td>
                                <td>{{$amortization->status}}</td>
                                <td>{{$amortization->paid_at}}</td>
                                <td>
                                    @if($amortization->status=='rejected')
                                        <form method="POST" action="{{route('againAmortization', $amortization)}}">
                                            @csrf
                                            <button class="mt-6 bg-green-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-green-700 transition duration-300">
                                                Reintentar pago
                                            </button>
                                    @endif
                                        @if($amortization->status=='pending')
                                            <h1>Pago en estudio</h1>
                                        @endif
                                        <button class="mt-6 bg-green-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-green-700 transition duration-300">
                                            Ver factura
                                        </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination justify-content-end">
                    {!! $amortizations->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
