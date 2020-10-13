@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-4/12 bg-teal-900 rounded-lg shadow-xl p-6">
        <h1 class="text-white text-5xl">Wish List</h1>
        <h1 class="text-white text-3xl pt-8">Welcome Back To Wish List</h1>
        <h2 class="text-teal-300 pb-5">Enter Your Credentials </h2>
        
        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div class="relative ">
                <label for="email" class="uppercase text-teal-500 text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="pt-8 w-full bg-teal-800 rounded pl-3 text-gray-100 outline-none focus:bg-teal-700" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">

                    @error('email')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3 ">
                <label for="password" class="uppercase text-teal-500 text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="pt-8 w-full bg-teal-800 rounded p-3 text-gray-100 outline-none focus:bg-teal-700" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

           
                    <div class="pt-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-white" for="remember">
                             {{ __('Remember Me') }}
                        </label>
                    </div>


                    <div class="pt-8">
                        <button type="submit" class="uppercase rounded text-teal-800 w-full text-left bg-gray-400 py-2 px-3 font-bold">
                            Login
                         </button>
                    </div>
                    <div class=" flex pt-8 text-white justify-between text-sm font-bold">
                        <a class="text-white" href="{{ route('password.request') }}">
                          Forgot Your Password?
                        </a>  
                        <a class="text-white" href="{{ route('register') }}">
                          Register
                        </a>
                    </div>
        </form>
    </div>
</div>
@endsection
