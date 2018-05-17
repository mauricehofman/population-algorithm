@extends('layouts.master')

@section('content')

    <ul>
        <li>Gold cost: {{ auth()->user()->buildings->first()->cost('gold') }}</li>
        <li>Food cost: {{ auth()->user()->buildings->first()->cost('food') }}</li>
        <li>Stone cost: {{ auth()->user()->buildings->first()->cost('stone') }}</li>
        <li>Wood cost: {{ auth()->user()->buildings->first()->cost('wood') }}</li>
        <li>Metal cost: {{ auth()->user()->buildings->first()->cost('metal') }}</li>
    </ul>

@stop