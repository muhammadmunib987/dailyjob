<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::all()
        ]);
    }
}
