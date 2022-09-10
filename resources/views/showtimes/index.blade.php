@extends('layouts.main')

@section('content')
    <x-page-header-component btnName="Create" pageName="Show Time" pageLink="{{ route('showtimes.create') }}" />

    @livewire('show-times.show-time-index-table')
@endsection
