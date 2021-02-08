<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class AllSalariesTable extends Component{
    use WithPagination;
    public $search;
    public $perPage = 20;

    public function render() {
        return view('livewire.all-salaries-table', [
            'salaries' =>  Salary::with("users")->paginate($this->perPage),
        ]);
    }
}

