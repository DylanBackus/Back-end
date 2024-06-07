@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profiel Bewerken</h1>
    <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>
@endsection
