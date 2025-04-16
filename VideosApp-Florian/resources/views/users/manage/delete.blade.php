@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container mx-auto mt-8">
        <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST" data-qa="form-delete-user">
            @csrf
            @method('DELETE')
            <button type="submit" data-qa="button-confirm-delete">Yes</button>
            <a href="{{ route('users.manage.index') }}" data-qa="button-cancel-delete">Cancel</a>
        </form>
    </div>

    <x-footer />
@endsection
