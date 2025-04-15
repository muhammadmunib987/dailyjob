<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Counter extends Component
{
    public int $count = 0;

    public string $name = '';
    public string $email = '';

    protected array $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        // For demonstration
        $payload=[
            'name'=>$this->name,
            'email'=>$this->email,
        ];
        User::create($payload);
        // After validation logic (example)
        // Contact::create([...]);

        session()->flash('success', 'Form submitted successfully!');
        $this->reset('name', 'email');
    }
}
