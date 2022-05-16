<x-app-layout>
    <x-slot name="header">
<div class="min-w-screen min-h-screen">
        <div class="text-center font-bold text-white text-4xl">
            <h1 class="text-4xl text-black">Importes</h1>
        </div>

        <div class="py-40">
            <div class="container mx-auto bg-indigo-500 rounded-lg p-14">
                <form action="{{ route('imports') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="sm:flex items-center bg-white rounded-lg overflow-hidden px-2 py-1 justify-between">
                            <input class="text-base text-gray-400 flex-grow outline-none px-2 " name="file" type="file" placeholder="Search your domain name" />
                            <div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto ">
                                <button class="bg-indigo-500 text-white text-base rounded-lg px-4 py-2 font-thin">Subir</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
</div>
    </x-slot>
</x-app-layout>
