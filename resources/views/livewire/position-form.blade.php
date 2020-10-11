<div>
    <form wire:submit.prevent="savePosition">
    <!-- Button trigger modal -->
    <div wire:ignore.self class="modal fade" id="form-modal-position" tabindex="-1" aria-labelledby="form-modal-positionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-modal-positionLabel">Form Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="idKey" value="0">
                    <div class="form-group">
                        <label for="posi_name">Position</label>
                        <input 
                            type="text" 
                            class="form-control @error('posi_name') is-invalid @enderror" 
                            placeholder="Position..." 
                            wire:model="posi_name">
                            @error('posi_name')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="posi_desc">Description</label>
                        <textarea class="form-control" wire:model="posi_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="posi_status">Status</label>
                        <select wire:model="posi_status" class="form-control @error('posi_status') is-invalid @enderror">
                            <option >Select</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                        @error('posi_status')
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