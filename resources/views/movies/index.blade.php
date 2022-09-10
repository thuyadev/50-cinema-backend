@extends('layouts.main')

@section('content')
    @if(session()->has('success'))
        <x-success-toast-component message="{{ session('success') }}"></x-success-toast-component>
    @endif

    <x-page-header-component btnName="Create" pageName="Movies" pageLink="{{ route('movies.create') }}" />

    @livewire('movies.movie-index-table')
@endsection
