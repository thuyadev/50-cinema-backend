@extends('layouts.main')

@section('content')
    @if(session()->has('success'))
        <x-success-toast-component message="{{ session('success') }}"></x-success-toast-component>
    @endif

    <x-page-header-component btnName="Create" pageName="Genres" pageLink="{{ route('genres.create') }}" />

    @livewire('genres.genre-index-table')
@endsection
