<div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            
            @livewire('position-form')
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <h3>
                                Position 
        
                                
                            </h3>
                        </div>
                        <div class="col-md-5 text-right">
                            <form class="form-inline my-2 my-lg-0">
                                <input 
                                    class="form-control mr-sm-2" 
                                    type="search" 
                                    placeholder="Search" 
                                    aria-label="Search" 
                                    wire:model="searchTerm">
                                <button 
                                    type="button" 
                                    class="btn btn-primary my-2 my-sm-0" 
                                    data-toggle="modal" 
                                    data-target="#form-modal-position" >
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Position</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($positions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->posi_name }}</td>
                                    <td>
                                        @if ($item->posi_status)
                                        <span class="badge badge-success">Active</span>
                                        @else 
                                        <span class="badge badge-danger">Not Active</span>    
                                        @endif
                                    </td>
                                    <td>
                                        <button 
                                            type="button" 
                                            class="btn btn-warning" 
                                            data-toggle="modal" 
                                            data-target="#form-modal-position" 
                                            wire:click.prevent="$emit('positionFormEdit',{{ $item->id }})">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $positions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
