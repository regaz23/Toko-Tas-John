@extends('layout')

@section("content")
<div class="max-w-md m-auto pt-[100px]">
    <img src="{{asset('/logo.png')}}" class="m-auto" alt="">
    <form action="/auth/signin" method="POST">
        @csrf
        <div class="flex flex-col gap-8 mt-12">
            <div>
                <input type="text" id="email"
                    class="border-b-2 border-[#434B6A] text-gray-900 text-sm block w-full p-2.5 outline-none"
                    placeholder="EMAIL" name="email" value="{{ old('email') }}" />

                @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</p>
                @enderror
            </div>
            <div>
                <input type="password" id="password"
                    class="border-b-2 border-[#434B6A] text-gray-900 text-sm block w-full p-2.5 outline-none"
                    placeholder="PASSWORD" name="password" />

                @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}.</p>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-[#434B6A] font-medium rounded-full text-sm px-5 py-2.5 self-center mt-8"
                id="submit">Login</button>
        </div>
    </form>
    @endsection