<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoryCarer;

class CategoryCarerForm extends Component
{
    public $idKey = 0;
    public $cc_name;
    public $cc_desc;
    public $cc_status;

    public $action;

    protected $listeners = [
        'categoryCarerFormEdit' => 'edit',
        'categoryCarerResetInput' => 'resetInput'
    ];

    public function rulesValidate()
    {
        if($this->idKey > 0)
        {
            return [
                'cc_name' => 'required|unique:category_carers,cc_name,'.$this->idKey,
                'cc_status' => 'required'
            ];
        }
        else 
        {
            return  [
                'cc_name' => 'required|unique:category_carers',
                'cc_status' => 'required'
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
        $this->cc_name = "";
        $this->cc_desc = "";
        $this->cc_status = "";
        $this->idKey = 0;
    }


    public function saveCategoryCarer()
    {
        
        if ($this->idKey > 0)
        {
            $validatedData = $this->validate($this->rulesValidate());
            $categoryCarer = CategoryCarer::findOrFail($this->idKey);
            $categoryCarer->cc_name = $this->cc_name;
            $categoryCarer->cc_desc = $this->cc_desc;
            $categoryCarer->cc_status = $this->cc_status;
            $categoryCarer->save();
        }
        else 
        {
            $validatedData = $this->validate($this->rulesValidate());
            CategoryCarer::create([
                'cc_name' => $this->cc_name,
                'cc_desc' => $this->cc_desc,
                'cc_status' => $this->cc_status,
                'ref_id' => !empty($this->ref_id) ? $this->ref_id : null
            ]);
        }
        
        $this->resetInput();
        $this->emit("categoryCarerRender");

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Save Successfully!',
            'timer'=>3000,
            'icon'=>'success',
        ]);

        $this->emit("formModalCategoryCarerHide");
    }


    public function edit($id)
    {
        $this->resetErrorBag();
        $categoryCarer = CategoryCarer::findOrFail($id);

        $this->idKey = $categoryCarer->id;
        $this->cc_name = $categoryCarer->cc_name;
        $this->cc_desc = $categoryCarer->cc_desc;
        $this->cc_status = $categoryCarer->cc_status;
    }

    public function render()
    {
        return view('livewire.category-carer-form');
    }
}
