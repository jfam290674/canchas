<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Celular 1 -->
        <div class="mt-4">
            <x-input-label for="celular_1" :value="__('Celular 1')" />
            <x-text-input id="celular_1" class="block mt-1 w-full" type="tel" name="celular_1" :value="old('celular_1')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('celular_1')" class="mt-2" />
        </div>

        <!-- Celular 2 -->
        <div class="mt-4">
            <x-input-label for="celular_2" :value="__('Celular 2')" />
            <x-text-input id="celular_2" class="block mt-1 w-full" type="tel" name="celular_2" :value="old('celular_2')" autocomplete="tel" />
            <x-input-error :messages="$errors->get('celular_2')" class="mt-2" />
        </div>

        <!-- User Type -->
        <div class="mt-4">
            <x-input-label for="user_type" :value="__('User Type')" />
            <select id="user_type" name="user_type" class="block mt-1 w-full" onchange="toggleCarnetField(this.value)">
                <option value="Cliente" {{ old('user_type') === 'Cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="UTE" {{ old('user_type') === 'UTE' ? 'selected' : '' }}>UTE</option>
            </select>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        <!-- Carnet -->
        <div class="mt-4" id="carnetField" style="display: none;">
            <x-input-label for="carnet" :value="__('Carnet')" />
            <input id="carnet" class="block mt-1 w-full" type="file" name="carnet" accept=".jpg,.jpeg,.png,.pdf" />
            <x-input-error :messages="$errors->get('carnet')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Toggle Carnet Field Script -->
    <script>
        function toggleCarnetField(userType) {
            const carnetField = document.getElementById('carnetField');
            carnetField.style.display = userType === 'UTE' ? 'block' : 'none';
        }
        toggleCarnetField(document.getElementById('user_type').value); // Ensure correct display on load
    </script>
</x-guest-layout>
