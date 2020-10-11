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
    public $action;

    // protected $rules = [
    //     'posi_name' => 'required|unique:positions',
    //     'posi_status' => 'required'
    // ];

    protected $listeners = [
        'positionFormEdit' => 'edit'
    ];

    public function updated($propertyName)
    {
        if($this->idKey == 0)
        {
            $this->validateOnly($propertyName,[
                'posi_name' => 'required|unique:positions',
                'posi_status' => 'required'
            ]);
        }
        else 
        {
            $this->validateOnly($propertyName,[
                'posi_name' => 'required|unique:positions,posi_name,'.$this->idKey,
                'posi_status' => 'required'
            ]);
        }
        
    }


    public function savePosition()
    {
        
        if ($this->idKey > 0)
        {
            $validatedData = $this->validate([
                'posi_name' => 'required|unique:positions,posi_name,'.$this->idKey,
                'posi_status' => 'required'
            ]);
            $position = Position::findOrFail($this->idKey);
        }
        else 
        {
            $validatedData = $this->validate([
                'posi_name' => 'required|unique:positions',
                'posi_status' => 'required'
            ]);
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

        $this->emit("formModalPositionHide");
    }


    public function edit($id)
    {
        $position = Position::findOrFail($id);

        $this->idKey = $position->id;
        $this->posi_name = $position->posi_name;
        $this->posi_desc = $position->posi_desc;
        $this->posi_status = $position->posi_status;
    }

    public function render()
    {
        return view('livewire.position-form');
    }
}
