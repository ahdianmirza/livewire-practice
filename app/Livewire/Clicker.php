<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Rule('required|min:2|max:255')]
    public $name = "";

    #[Rule('required|email|unique:users')]
    public $email = "";

    #[Rule('required|min:5')]
    public $password = "";

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function createNewUser() {
        sleep(1);

        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        $user = User::create($validated);

        $this->reset(['name', 'email', 'password', 'image']);

        request()->session()->flash('success', 'User created successfully!');

        $this->dispatch('user-created', $user);
    }

    public function ReloadList() {
        $this->dispatch('user-created');
    }
    
    public function render()
    {
        $users = User::paginate(5);

        return view('livewire.clicker', [
            'users' => $users
        ]);
    }
}