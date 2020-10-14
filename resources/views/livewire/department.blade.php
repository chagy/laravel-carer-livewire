<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Department </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" wire:model="searchTerm" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button 
                                type="button" 
                                class="btn btn-primary my-2 my-sm-0" 
                                data-toggle="modal" 
                                wire:click="$emit('departmentResetInput')"
                                data-target="#form-modal-department" >
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Department</th>
                                <th width="15%">Status</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($departments as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->depart_name }}</td>
                                <td>
                                    @if ($item->depart_status)
                                    <span class="badge badge-success">Active</span>
                                    @else 
                                    <span class="badge badge-danger">Not Active</span>    
                                    @endif
                                </td>
                                <td>
                                    <button 
                                        type="button" 
                                        class="btn btn-warning btn-sm" 
                                        data-toggle="modal" 
                                        data-target="#form-modal-department" 
                                        wire:click.prevent="$emit('departmentFormEdit',{{ $item->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {!! $departments->links() !!}
                </div>
            </div>
        <!-- /.card -->
        </div>
    </div>
    @livewire('department-form')
</div>
