@php
    /* @var Illuminate\Pagination\LengthAwarePaginator $items */
@endphp
@extends('layout')

@section('content')
    @foreach($items as $item)
        <div>{{ $item->name }}</div>
    @endforeach
@endsection
