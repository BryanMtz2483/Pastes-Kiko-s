<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $dashModal;
    public function render()
    {
        return view('views.dashboard');
    }
}
