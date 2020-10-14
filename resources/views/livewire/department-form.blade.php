<div>
    <form wire:submit.prevent="saveDepartment">
    <!-- Button trigger modal -->
    <div wire:ignore.self class="modal fade" id="form-modal-department" tabindex="-1" aria-labelledby="form-modal-departmentLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-modal-departmentLabel">Form Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="idKey" value="0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="depart_name">Department</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('depart_name') is-invalid @enderror" 
                                    placeholder="Department..." 
                                    wire:model="depart_name">
                                    @error('depart_name')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="depart_status">Status</label>
                                <select wire:model="depart_status" class="form-control @error('depart_status') is-invalid @enderror">
                                    <option >Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                                @error('depart_status')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="depart_desc">Description</label>
                        <textarea class="form-control" wire:model="depart_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ref_id">Status</label>
                        <select wire:model="ref_id" class="form-control @error('ref_id') is-invalid @enderror">
                            <option value="">Select Parent</option>
                            @foreach ($departments as $item)
                            <option value="{{ $item->id }}">{{ $item->depart_name }}</option>
                            @endforeach
                        </select>
                        @error('ref_id')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>