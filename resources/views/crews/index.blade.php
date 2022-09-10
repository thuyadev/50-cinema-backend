@extends('layouts.main')

@section('content')
    @if(session()->has('success'))
        <x-success-toast-component message="{{ session('success') }}"></x-success-toast-component>
    @endif

    <x-page-header-component btnName="Create" pageName="Crews" pageLink="{{ route('crews.create') }}" />

    @livewire('crews.crew-index-table')
@endsection
