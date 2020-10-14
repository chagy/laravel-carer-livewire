<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class DepartmentForm extends Component
{
    public $idKey = 0;
    public $depart_name;
    public $depart_desc;
    public $depart_status;
    public $ref_id;
    public $action;

    protected $listeners = [
        'departmentFormEdit' => 'edit',
        'departmentResetInput' => 'resetInput'
    ];

    public function rulesValidate()
    {
        if($this->idKey > 0)
        {
            return [
                'depart_name' => 'required|unique:departments,depart_name,'.$this->idKey,
                'depart_status' => 'required'
            ];
        }
        else 
        {
            return  [
                'depart_name' => 'required|unique:departments',
                'depart_status' => 'required'
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
        $this->depart_name = "";
        $this->depart_desc = "";
        $this->depart_status = "";
        $this->ref_id = "";
        $this->idKey = 0;
    }


    public function saveDepartment()
    {
        
        if ($this->idKey > 0)
        {
            $validatedData = $this->validate($this->rulesValidate());
            $department = Department::findOrFail($this->idKey);
            $department->depart_name = $this->depart_name;
            $department->depart_desc = $this->depart_desc;
            $department->depart_status = $this->depart_status;
            $department->ref_id = !empty($this->ref_id) ? $this->ref_id : null;
            $department->save();
        }
        else 
        {
            $validatedData = $this->validate($this->rulesValidate());
            Department::create([
                'depart_name' => $this->depart_name,
                'depart_desc' => $this->depart_desc,
                'depart_status' => $this->depart_status,
                'ref_id' => !empty($this->ref_id) ? $this->ref_id : null
            ]);
        }
        
        $this->resetInput();
        $this->emit("departmentRender");

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Save Successfully!',
            'timer'=>3000,
            'icon'=>'success',
        ]);

        $this->emit("formModalDepartmentHide");
    }


    public function edit($id)
    {
        $this->resetErrorBag();
        $department = Department::findOrFail($id);

        $this->idKey = $department->id;
        $this->depart_name = $department->depart_name;
        $this->depart_desc = $department->depart_desc;
        $this->depart_status = $department->depart_status;
        $this->ref_id = $department->ref_id;
    }

    public function render()
    {
        $departments = Department::orderBy('depart_name','asc')->get();
        return view('livewire.department-form',['departments' => $departments]);
    }
}
