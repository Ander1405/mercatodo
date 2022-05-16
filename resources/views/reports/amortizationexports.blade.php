<x-app-layout>
    <x-slot name="header">
        <div class="min-w-screen min-h-screen">
            <div class="mt-2 text-center font-bold text-white text-4xl">
                <h1 class="text-4xl text-black">Exporte de Transacciones</h1>
            </div>
            <div id="ChartAmortization">

            </div>
            <div class="py-40">
                <div class="container mx-auto bg-indigo-500 rounded-lg p-14">
                    <form  action="{{ route('paymnets') }}" method="GET">
                        @csrf
                        <div class="sm:flex items-center bg-indigo-500 rounded-lg overflow-hidden px-2 py-1 justify-between">
                            <div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto ">
                                <button class="font-semibold px-60 bg-white text-black text-base rounded-lg px-4 py-2 font-thin">Descargar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
