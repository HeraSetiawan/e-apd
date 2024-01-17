<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $link = 'info';

    function loginAdmin() : void {
        $this->link = 'admin';
    }

    function loginKru() : void {
        $this->link = 'kru';
    }

    function info() : void {
        $this->link = 'info';
    }

    public function render()
    {
        return view('livewire.login')->layout('components.template-guest');
    }
}
