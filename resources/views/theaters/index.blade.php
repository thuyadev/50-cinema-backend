@extends('layouts.main')

@section('content')
    <x-page-header-component btnName="Create" pageName="Theaters" pageLink="{{ route('theaters.create') }}" />

    @livewire('theaters.theater-index-table')
@endsection
