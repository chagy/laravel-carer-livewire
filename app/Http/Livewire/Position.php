<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Position as PositionModel;

class Position extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;

    protected $listeners = [
        'positionRender' => 'render'
    ];

    public function render()
    {
        $positions = PositionModel::query();
        
        if ($this->searchTerm)
        {
            $positions = $positions
                            ->where("posi_name","LIKE","%".$this->searchTerm."%");
        }

        $positions = $positions
                        ->latest()
                        ->paginate(20);

        return view('livewire.position',[
            'positions' => $positions
        ]);
    }
}
