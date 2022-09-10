@extends('layouts.main')

@section('content')
    <x-page-header-component btnName="Create" pageName="Cinemas" pageLink="{{ route('cinemas.create') }}" />

    @livewire('cinemas.cinema-index-table')
@endsection
