@extends('layouts.main')

@section('content')

@if (session('warning'))
<div class="bg-indigo-900 text-center py-4 md:mt-5 md:mb-2 max-w-lg m-auto">
  <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Aviso</span>
    <span class="font-semibold mr-2 text-left flex-auto">{{session('warning')}}</span>
  </div>
</div>
@endif

            <form class="w-full max-w-lg bg-white m-auto p-10 rounded md:mt-5 md:mb-2" method="POST">
                @csrf
                <h2 class="m-auto text-orange-500 mb-2 font-bold text-lg">Login</h2>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                  Email
                </label>
                <input value="{{old('email')}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email">
              </div>
              <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password">
              </div>
              <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                 ENTRAR
                </button>
              </div>
            </form>
@endsection
