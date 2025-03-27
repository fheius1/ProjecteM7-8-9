@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Delete User</h1>
        <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST" data-qa="form-delete-user" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-qa="button-confirm-delete">Si</button>
            <a href="{{ route('users.manage.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-qa="button-cancel-delete">Cancel·lar</a>
        </form>
    </div>

    <x-footer />
@endsection
