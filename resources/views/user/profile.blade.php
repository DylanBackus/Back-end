@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}'s Profiel</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Avatar: <img src="/storage/avatars/{{ $user->avatar }}" alt="Avatar"></p>
    <a href="{{ route('user.editProfile') }}" class="btn btn-primary">Profiel Bewerken</a>
</div>
@endsection
