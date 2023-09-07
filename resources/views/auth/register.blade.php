<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

          <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="kecamatan" :value="__('Kecamatan')" />
            <select id="kecamatan" name="kecamatan" class="block mt-1 w-full" required>
            <option>--Pilih Kecamatan--</option>
                @foreach ($kecamatans as $kecamatan )
            <option value={{ $kecamatan['name'] }}>{{ $kecamatan['name'] }}</option>
            @endforeach
        <!-- Tambahkan opsi-opsi lain sesuai kebutuhan -->
    </select>
    <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
        </div>

          <div class="mt-4">
            <x-input-label for="desa" :value="__('Desa')" />
            <select id="desa" name="desa" class="block mt-1 w-full" required>
            <option>--Pilih Desa--</option>
                @foreach ($desas as $desa )
            <option value={{ $desa['name'] }}>{{ $desa['name'] }}</option>
            @endforeach
        <!-- Tambahkan opsi-opsi lain sesuai kebutuhan -->
    </select>
    <x-input-error :messages="$errors->get('desa')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>