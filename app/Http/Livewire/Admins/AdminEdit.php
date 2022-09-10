<?php

namespace App\Http\Livewire\Admins;

use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\View\View;
use Livewire\Component;

class AdminEdit extends Component
{
    protected $adminService;

    public $admin_id;
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|same:confirm_password',
        'confirm_password' => 'nullable|same:password'
    ];

    public function boot(AdminService $adminService): void
    {
        $this->adminService = $adminService;
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function editAdmin(Admin $admin): void
    {
        $this->validate();

        $this->adminService->update($this, $admin);

        session()->flash('success', 'admin account updated successfully!');
    }

    public function render(): View
    {
        return view('livewire.admins.admin-edit');
    }
}
