<x-guest-layout>
    <x-auth-card>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 mb-3">{{ trans('Resgister') }}</h1>
            <!-- Name -->
            <div>
                <x-label for="name" :value="trans('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div>
                <x-label for="surname" :value="trans('Surname')" />

                <x-input id="surname" class="block mt- w-full" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>
            <div>
                <x-label for="document" :value="trans('Document')" />

                <x-input id="document" class="block mt-1 w-full" type="text" name="document" :value="old('document')" required autofocus />
            </div>
            <div>
                <x-label for="phone_number" :value="trans('Phone number')" />

                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="trans('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="trans('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="trans('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="w-full block bg-purple-500 hover:bg-purple-400 focus:bg-purple-400 text-white font-semibold rounded-lg px-4 py-3"> {{ trans('Register') }}</button>
            </div>
            <div class="mt-4 text-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ trans('Already register') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
