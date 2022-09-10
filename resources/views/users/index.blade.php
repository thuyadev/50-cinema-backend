@extends('layouts.main')

@section('content')
    @if(session()->has('success'))
        <x-success-toast-component message="{{ session('success') }}"></x-success-toast-component>
    @endif

    <x-page-header-only pageName="Users" />

    @livewire('users.user-index-table')
@endsection
