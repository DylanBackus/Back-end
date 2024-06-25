@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Beschikbare Spellen</h1>
    <ul>
        @foreach($games as $game)
            <li>{{ $game->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
