@extends('layouts.main')

@section('content')
    <x-page-header-only>Edit admin</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        @livewire('admins.admin-edit', [
            'admin_id' => $admin['id'],
            'name' => $admin['name'],
            'email' => $admin['email']
        ])

        <x-created-at-card-component createdAt="{{ $admin['created_at'] }}" modifiedAt="{{ $admin['updated_at'] }}" />
    </div>
@endsection
