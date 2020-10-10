<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Position as PositionModel;

class Position extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'positionRender' => 'render'
    ];

    public function render()
    {
        return view('livewire.position',[
            'positions' => PositionModel::latest()->paginate(20)
        ]);
    }
}
