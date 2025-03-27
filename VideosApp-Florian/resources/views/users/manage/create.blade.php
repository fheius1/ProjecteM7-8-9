@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Creacio nou usuari</h1>
        <form action="{{ route('users.manage.store') }}" method="POST" data-qa="form-create-user" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" data-qa="label-name" class="block text-gray-700">Nom</label>
                <input type="text" name="name" id="name" class="form-control border border-gray-300 p-2 w-full" data-qa="input-name" required>
            </div>
            <div class="mb-4">
                <label for="email" data-qa="label-email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="form-control border border-gray-300 p-2 w-full" data-qa="input-email" required>
            </div>
            <div class="mb-4">
                <label for="password" data-qa="label-password" class="block text-gray-700">Contrasenya(minim 8 caracters)</label>
                <input type="password" name="password" id="password" class="form-control border border-gray-300 p-2 w-full" data-qa="input-password" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" data-qa="label-password-confirmation" class="block text-gray-700">Confirmar contrasenya</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border border-gray-300 p-2 w-full" data-qa="input-password-confirmation" required>
            </div>
            <button type="submit" class="text-black font-bold py-2 px-4 rounded" data-qa="button-submit">Crear</button>
        </form>
    </div>

    <x-footer />
@endsection
