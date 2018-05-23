@extends('layouts.master')

@section('content')

    @foreach(auth()->user()->buildings as $building)
        <b>{{ $building->name }}</b>
        <p>
            Type: {{ $building->buildingType->resource->name }}
            <br/>
            Current level: {{ $building->pivot->level }}
            <br/>
            Production per hour: {{ $building->buildingType->production() }}
            <br/>
            Level up cost:
        </p>
        <ul>
            <li>wood: {{ $building->buildingType->cost('wood') }}</li>
            <li>stone: {{ $building->buildingType->cost('stone') }}</li>
            <li>metal: {{ $building->buildingType->cost('metal') }}</li>
            <li>gold: {{ $building->buildingType->cost('gold') }}</li>
        </ul>


    @endforeach

@stop