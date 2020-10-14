<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department as DepartmentModel;

class Department extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'departmentRender' => 'render'
    ];



    public function render()
    {
        $departments = DepartmentModel::query();

        if($this->searchTerm)
        {
            $departments = $departments->where('depart_name','LIKE',"%{$this->searchTerm}%");
        }

        $departments = $departments
                            ->orderBy('id','desc')
                            ->paginate(20);
        return view('livewire.department',[
            'departments' => $departments
        ]);
    }
}
