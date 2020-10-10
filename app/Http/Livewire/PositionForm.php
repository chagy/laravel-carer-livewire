<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position;

class PositionForm extends Component
{
    public $idKey = 0;
    public $posi_name;
    public $posi_desc;
    public $posi_status;

    protected $rules = [
        'posi_name' => 'required|unique:positions',
        'posi_status' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function savePosition()
    {
        $validatedData = $this->validate();
        if ($this->idKey > 0)
        {
            $position = Position::findOrFail($this->idKey);
        }
        else 
        {
            Position::create([
                'posi_name' => $this->posi_name,
                'posi_desc' => $this->posi_desc,
                'posi_status' => $this->posi_status
            ]);
        }
        $this->posi_name = "";
        $this->posi_desc = "";
        $this->posi_status = "";
        $this->idKey = 0;

        $this->emit("positionRender");

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Save Successfully!',
            'timer'=>3000,
            'icon'=>'success',
        ]);
    }

    public function render()
    {
        return view('livewire.position-form');
    }
}
