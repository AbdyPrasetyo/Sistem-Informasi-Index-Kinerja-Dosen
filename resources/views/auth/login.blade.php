{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layout_auth.main')
@section('login')
{{-- <form>
    <div class="flex flex-col gap-4 mt-7">
        <div>
            <label
                class="text-dark dark:text-darklink font-semibold mb-2 block ">Username</label>
            <input type="text" class="form-control py-2" />
        </div>
        <div>
            <label
                class="text-dark dark:text-darklink font-semibold mb-2 block ">Password</label>
            <input type="password" class="form-control py-2" />
        </div>
        <div>
            <div class="flex justify-between my-2">
                <div>
                    <label class="cursor-pointer label flex items-center ">
                        <input type="checkbox"
                            class="border-bordergray w-4 h-4 rounded-sm text-primary dark:border-darkborder bg-transparent dark:checked:bg-primary dark:checked:border-primary focus:ring-0 focus:ring-offset-0"
                            checked id="checkbox1">
                        <span class="label-text ms-2">Remeber this Device</span>
                    </label>
                </div>
                <a href="../main/authentication-forgot-password.html"
                    class="text-primary font-semibold">Forgot Password ?</a>
            </div>
        </div>
        <a href="../main/index.html" class="btn btn-md py-3">Sign In</a>
        <div class="text-center mt-2.5">
            <span class="text-base  font-medium ">New to Modernize? <a
                    href="../main/authentication-register.html"
                    class="text-primary font-medium text-sm ms-2">Create an
                    account</a></span>
        </div>
    </div>
</form> --}}
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let errorMessages = '';
        @foreach ($errors->all() as $error)
            errorMessages += '{{ $error }}<br>';
        @endforeach

        Swal.fire({
            title: 'Login Gagal',
    text: 'Email atau password salah.',
    icon: 'error',
    confirmButtonText: 'OK',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    background: '#f4f4f4',
    titleColor: '#ff0000',  // Warna teks judul
    textColor: '#000000',   // Warna teks isi
    iconColor: '#ff0000'    // Warna ikon
        });
    });
</script>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex flex-col gap-4 mt-7">
        <!-- Email Address -->
        <div>
            <label class="text-dark dark:text-darklink font-semibold mb-2 block">{{ __('Email') }}</label>
            <input type="email" name="email" :value="old('email')"  autofocus autocomplete="username" class="form-control py-2" />
            @if ($errors->has('email'))
                <span class="text-error text-sm">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Password -->
        <div>
            <label class="text-dark dark:text-darklink font-semibold mb-2 block">{{ __('Password') }}</label>
            <input type="password" name="password"  autocomplete="current-password" class="form-control py-2" />
            @if ($errors->has('password'))
                <span class="text-error text-sm">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Remember Me and Forgot Password -->
        <div>
            <div class="flex justify-between my-2">
                <div>
                    <label class="cursor-pointer label flex items-center">
                        <input type="checkbox" name="remember" class="border-bordergray w-4 h-4 rounded-sm text-primary dark:border-darkborder bg-transparent dark:checked:bg-primary dark:checked:border-primary focus:ring-0 focus:ring-offset-0" id="remember_me">
                        <span class="label-text ms-2">{{ __('Remember me') }}</span>
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-primary font-semibold">{{ __('Forgot Password?') }}</a>
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-md py-3">{{ __('Log in') }}</button>

        <!-- Register Link -->
        <div class="text-center mt-2.5">
            <span class="text-base font-medium">{{ __('New to Modernize?') }}
                <a href="{{ route('register') }}" class="text-primary font-medium text-sm ms-2">{{ __('Create an account') }}</a>
            </span>
        </div>
    </div>
</form>

@endsection
