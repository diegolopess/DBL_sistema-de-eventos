@extends('layouts.main')

@section('title', 'DBL Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <p class="subtitle">Todos os eventos</p>
    @endif   
    <div id="cards-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <div class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</div>
                    <div class="card-title">{{ $event->title }}</div>
                    <p class="card-participants">{{ count($event->users) }} {{ count($event->users) <= 1 ? 'Participante' : 'Participantes' }}</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar eventos com "{{$search}}". <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Nenhum evento encontrado.</p>
        @endif
    </div>
</div>
@endsection