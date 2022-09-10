@extends('layouts.main')

@section('content')
    <x-page-header-component btnName="Create" pageName="Blogs" pageLink="{{ route('blogs.create') }}" />

    @livewire('blogs.blog-index-table')
@endsection
