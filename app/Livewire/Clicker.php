<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Clicker extends Component
{
    #[Rule('required|min:2|max:255')]
    public $name = "";

    #[Rule('required|email|unique:users')]
    public $email = "";

    #[Rule('required|min:5')]
    public $password = "";

    public function createNewUser() {
        $this->validate();

        User::create([
            'name' => $this->name,
            "email" => $this->email,
            "password" => bcrypt($this->password)
        ]);
    }
    
    public function render()
    {
        $users = User::all();

        return view('livewire.clicker', [
            'users' => $users
        ]);
    }
}