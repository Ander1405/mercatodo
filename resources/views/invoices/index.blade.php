<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Pagos de E-comerce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">

                    <table>
                        <thead class="bg-gray-800 text-white">
                        <tr class="bg-indigo-500 text-white">
                            <th>{{ trans('Reference') }}</th>
                            <th>{{ trans('Documento') }}</th>
                            <th>{{ trans('Monto') }}</th>
                            <th>{{ trans('status') }}</th>
                            <th>{{ trans('paid at') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->reference}}</td>
                                <td>{{$invoice->payer_document}}</td>
                                <td>{{$invoice->amount}}</td>
                                <td>{{$invoice->status}}</td>
                                <td>{{$invoice->paid_at}}</td>
                                <td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination justify-content-end">
                    {!! $invoices->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
