<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $username = "akuntest";

    public function createNewUser() {
        User::create([
            'name' => "Akun test 2",
            "email" => "test2@test.com",
            "password" => bcrypt('1234567890')
        ]);
    }
    
    public function render()
    {
        $title = "Test";
        $users = User::all();

        return view('livewire.clicker', [
            'title' => $title,
            'users' => $users
        ]);
    }
}