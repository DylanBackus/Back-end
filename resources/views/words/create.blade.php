<!-- resources/views/words/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Voeg een nieuw woord toe</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('words.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="word">Woord:</label>
            <input type="text" class="form-control" id="word" name="word" required>
        </div>
        <button type="submit" class="btn btn-primary">Voeg woord toe</button>
    </form>
@endsection
