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

    protected $listeners = [
        'positionFormEdit' => 'edit',
        'positionResetInput' => 'resetInput'
    ];

    public function rulesValidate()
    {
        if($this->idKey > 0)
        {
            return [
                'posi_name' => 'required|unique:positions,posi_name,'.$this->idKey,
                'posi_status' => 'required'
            ];
        }
        else 
        {
            return  [
                'posi_name' => 'required|unique:positions',
                'posi_status' => 'required'
            ];
        }
    }

    public function updated($propertyName)
    {
        if($this->idKey == 0)
        {
            $this->validateOnly($propertyName,$this->rulesValidate());
        }
        else 
        {
            $this->validateOnly($propertyName,$this->rulesValidate());
        }
        
    }

    public function resetInput()
    {
        $this->posi_name = "";
        $this->posi_desc = "";
        $this->posi_status = "";
        $this->idKey = 0;
    }


    public function savePosition()
    {
        
        if ($this->idKey > 0)
        {
            $validatedData = $this->validate($this->rulesValidate());
            $position = Position::findOrFail($this->idKey);
            $position->posi_name = $this->posi_name;
            $position->posi_desc = $this->posi_desc;
            $position->posi_status = $this->posi_status;
            $position->save();
        }
        else 
        {
            $validatedData = $this->validate($this->rulesValidate());
            Position::create([
                'posi_name' => $this->posi_name,
                'posi_desc' => $this->posi_desc,
                'posi_status' => $this->posi_status
            ]);
        }
        
        $this->resetInput();
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
        $this->resetErrorBag();
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
