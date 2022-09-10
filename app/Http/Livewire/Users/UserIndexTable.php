<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndexTable extends Component
{
    use WithPagination;

    protected $userService;
    protected $queryString = ['search'];
    protected $listeners = ['userDelete', 'userStatusChange'];

    public $search = '';

    public function boot(UserService $userService): void
    {
        $this->userService = $userService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function userDelete(User $user): void
    {
        $this->userService->delete($user);
    }

    public function userStatusChange(User $user): void
    {
        $this->userService->changeStatus($user);
    }

    public function render()
    {
        $users = $this->userService->getUsers($this->search);

        return view('livewire.users.user-index-table', compact('users'));
    }
}
