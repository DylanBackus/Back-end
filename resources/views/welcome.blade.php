@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welkom bij het Wordgame!</h1>
    <p>Klik op de onderstaande knop om beschikbare spellen te zien en te spelen.</p>
    <a href="{{ route('games.index') }}" class="btn btn-primary">Bekijk Spellen</a>
</div>
@endsection
