<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public string $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $users = User::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('livewire.user-list', [
            'users' => $users,
        ]);
    }

    // Delete user method
    public function deleteUser($userId)
    {
        // Find the user and delete
        $user = User::find($userId);

        if ($user) {
            // $user->delete();

            // Flash a success message to notify the user
            session()->flash('success', 'User deleted successfully!');
        } else {
            session()->flash('error', 'User not found!');
        }

        // Reset pagination after deletion
        $this->resetPage();
    }
}
