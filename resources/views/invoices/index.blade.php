<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-gray-800 leading-tight">
            {{ trans('Transacciones') }}
        </h2>
    </x-slot>
    <div>
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-200 overflow-hidden shadow-sm ">
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <thead class="bg-gray-700 text-white">
            <tr class="text-left border-b border-gray-300">
                <th class="px-4 py-3">{{ trans('Reference') }}</th>
                <th class="px-4 py-3">{{ trans('Documento') }}</th>
                <th class="px-4 py-3">{{ trans('Monto') }}</th>
                <th class="px-4 py-3">{{ trans('status') }}</th>
                <th class="px-4 py-3">{{ trans('paid at') }}</th>
            </tr>
            @foreach($invoices as $invoice)
                <tr class="bg-gray-600 border-b border-gray-600">
                    <td class="px-4 py-3">{{$invoice->reference}}</td>
                    <td class="px-4 py-3">{{$invoice->payer_document}}</td>
                    <td class="px-4 py-3">{{$invoice->amount}}</td>
                    <td class="px-4 py-3">{{$invoice->status}}</td>
                    <td class="px-4 py-3">{{$invoice->paid_at}}</td>
                </tr>
            @endforeach
            </thead>
            <div class="px-40">
                <a class="hover:bg-green-600 transition duration-300 inline-flex bg-green-400 text-white rounded-sm h-6 px-3 py-6 justify-center items-center" href="{{ route('amortizatioExport') }}">Exportes</a>
            </div>
        </table>
        <div class="pagination justify-content-end">
            {!! $invoices->links() !!}
        </div>
    </div>
        </div>
            </div>
                </div>
    </x-app-layout>

