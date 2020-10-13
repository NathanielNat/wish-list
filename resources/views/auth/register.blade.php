@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-3/12 bg-teal-900 rounded-lg shadow-xl p-6">
        

        <h1 class="text-white text-3xl pt-8">Make a Wish Today</h1>
        <p class="text-teal-300 ">Enter your information below</p>
        <form method="POST" action="{{ route('register') }}" class="pt-8">
            @csrf

            <div class="relative pt-3">
                <label for="name" class="uppercase text-teal-500 text-xs font-bold absolute pl-3 pt-2">full name</label>

                <div class="col-md-6">
                    <input id="name" type="text"
                        class="pt-8 w-full bg-teal-800 rounded pl-3 text-gray-100 outline-none focus:bg-teal-700"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Your Name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="email" class="uppercase text-teal-500 text-xs font-bold absolute pl-3 pt-2">e-mail</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="pt-8 w-full bg-teal-800 rounded pl-3 text-gray-100 outline-none focus:bg-teal-700"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="your@email.com">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password"
                    class="uppercase text-teal-500 text-xs font-bold absolute pl-3 pt-2">password</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="pt-8 w-full bg-teal-800 rounded pl-3 text-gray-100 outline-none focus:bg-teal-700"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password-confirm"
                    class="uppercase text-teal-500 text-xs font-bold absolute pl-3 pt-2">re-enter password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password"
                        class="pt-8 w-full bg-teal-800 rounded pl-3 text-gray-100 outline-none focus:bg-teal-700"
                        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm">
                </div>
            </div>

            <div class="pt-8">
                <button type="submit"
                    class=" w-full bg-gray-100 uppercase rounded text-teal-800 text-left py-2 px-3 font-bold">
                    Register
                </button>
            </div>

            <div class=" flex pt-8 text-white justify-between text-sm font-bold">
                <a class="text-white" href="{{ route('password.request') }}">
                  Forgot Your Password?
                </a>  
                <a class="text-white" href="{{ route('login') }}">
                  Login
                </a>
            </div>

        </form>

    </div>
</div>
@endsection
