<x-app-layout>
    <x-slot name="header">

        <!-- component -->
        <section class="bg-gray-100 py-20">
            <div class="max-w-2xl mx-auto py-0 md:py-16">
                <article class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
                    <div class="md:rounded-b-md  bg-white">
                        <div class="p-9 border-b border-gray-200">
                            <div class="space-y-6">
                                <div class="flex justify-between items-top">
                                    <div class="space-y-4">
                                        <div>
                                            <img class="max-h-10 object-cover mb-4" src="https://mms.businesswire.com/media/20190116005163/es/612424/23/Logo.jpg">
                                            <p class="font-bold text-lg"> {{ trans('Invoice') }} </p>
                                            <p> Mercatodo </p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-sm text-gray-400"> {{ trans('Billed to') }} </p>
                                            <span> {{ $user->name }} </span>
                                            <p> {{ $amortization -> email }} </p>
                                            <p>Numero de contacto</p>
                                            <p> {{ $user->phone_number }} </p>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <div>
                                            <p class="font-medium text-sm text-gray-400"> Invoice Number </p>
                                            <p> {{ $amortization -> reference }} </p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-sm text-gray-400"> Invoice Date </p>
                                            <p> {{ $amortization-> paid_at }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-9 border-b border-gray-200">
                            <p class="font-medium text-sm text-gray-400"> Note </p>
                            <p class="text-sm"> Thank you for your order. </p>
                        </div>
                        <table class="w-full divide-y divide-gray-200 text-sm">
                            <thead>
                            <tr>
                                <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Item </th>
                                <th scope="col" class="py-3 text-left font-semibold text-gray-400">  </th>
                                <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Amount </th>
                                <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                                    <div>
                                        @foreach($shoppingCar->shoppingCarItems as $product)
                                        <p> {{$product->product->name}} </p>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="whitespace-nowrap text-gray-600 truncate"></td>
                                <td class="whitespace-nowrap text-gray-600 truncate"> {{ $amortization -> amount }} </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="p-9 border-b border-gray-200">
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="text-gray-500 text-sm"> Total </p>
                                    </div>
                                    <p class="text-gray-500 text-sm"> $660,000.00 </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-9 border-b border-gray-200">
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="font-bold text-black text-lg"> Amount Due </p>
                                    </div>
                                    <p class="font-bold text-black text-lg"> $360.00 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>

    </x-slot>
</x-app-layout>
