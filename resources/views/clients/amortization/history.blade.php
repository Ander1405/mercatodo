<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('History pay') }}
        </h2>
    </x-slot>

    <div>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <thead>
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">{{ trans('Reference') }}</th>
                <th class="px-4 py-3">{{ trans('Monto') }}</th>
                <th class="px-4 py-3">{{ trans('status') }}</th>
                <th class="px-4 py-3">{{ trans('paid at') }}</th>
                <th class="px-4 py-3">{{ trans('Acciones') }}</th>
            </tr>
            @foreach($amortizations as $amortization)
            <tr class="bg-gray-700 border-b border-gray-600">
                <td>{{$amortization->request_id}}</td>
                <td>{{$amortization->amount}} {{ $currency }}</td>
                <td>{{$amortization->status}}</td>
                <td>{{$amortization->paid_at}}</td>
                <td>
                    @if($amortization->status=='rejected')
                        <form method="POST" action="{{route('againAmortization', $amortization)}}">
                            @csrf
                            <button class="mt-6 bg-green-600 text-white px-4 py-0 rounded-md text-1xl font-medium hover:bg-green-700 transition duration-300">
                                Reintentar pago
                            </button>
                            @endif
                            @if($amortization->status=='pending')
                                <h1 class="font-semibold">Pago en estudio</h1>
                            @endif
                            <a href="{{ route('api.show', $amortization->id) }}" class="mt-6 bg-green-600 text-white px-4 py-0 rounded-md text-1xl font-medium hover:bg-green-700 transition duration-300">
                                Ver factura
                            </a>
                        </form>
                </td>
            </tr>
            @endforeach
            </thead>
        </table>
    </div>
</x-app-layout>

