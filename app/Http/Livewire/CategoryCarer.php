<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoryCarer as CategoryCarerModel;

class CategoryCarer extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $listeners = [
        'categoryCarerRender' => 'render'
    ];

    public function render()
    {
        $category_carers = CategoryCarerModel::query();

        if($this->searchTerm)
        {
            $category_carers = $category_carers->where('cc_name','LIKE',"%{$searchTerm}%");
        }

        $category_carers = $category_carers
                                ->orderBy('id','desc')
                                ->paginate(20);

        return view('livewire.category-carer',['category_carers' => $category_carers]);
    }
}
