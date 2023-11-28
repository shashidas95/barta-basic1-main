<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Full Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- User Name -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Bio -->
        {{-- <div class="mt-2">
            <x-input-label for="bio" :value="__('Bio')" />
            <x-textarea id="bio" class="block mt-1 w-full" name="bio" :value="old('bio')" required
                autocomplete="bio"></x-textarea>
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div> --}}
        <!-- Image Upload -->
        {{-- <div class="mt-2">
            <x-input-label for="image" :value="__('Profile Image')" />
            <x-file-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div> --}}
        <!-- Email Address -->
        <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-2">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center mt-2">
            <x-primary-button class="block mt-1 mx-auto w-full text-center ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="flex items-center  justify-end mt-4">
            <a class="underline text-sm text-black-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already  a member?') }}
                <span class="text-lg font-bold"> {{ __('Sign In') }}</span>


            </a>
        </div>
    </form>
</x-guest-layout>
