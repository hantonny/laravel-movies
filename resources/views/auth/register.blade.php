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

<form class="w-full max-w-lg bg-white m-auto p-10 rounded md:mt-5 md:mb-2" form method="POST" action="{{ route('register') }}">
    @csrf
    <h2 class="m-auto text-orange-500 mb-2 font-bold text-lg">Registrar</h2>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
          Nome
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" type="text" placeholder="Nome" name="name" required>
        <p class="text-gray-600 text-md-center italic">O nome e email são obrigatórios.</p>
    </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
          Email
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="email" placeholder="Email" required>
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
          Senha
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" name="password" type="password" placeholder="******************" required>
        <p class="text-gray-600 text-md-center italic">A senha deve ter no mínimo 4 caracteres.</p>
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Cofirmar Senha
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password_confirmation" name="password_confirmation" type="password" placeholder="******************" required>
        <p class="text-gray-600 text-md-center italic">As senhas devem ser iguais.</p>
      </div>
    </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        {{ __('CADASTRAR') }}
        </button>
  </form>
@endsection
