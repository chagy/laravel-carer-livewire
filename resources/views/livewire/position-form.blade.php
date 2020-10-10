<div>
    <div class="card">
        <div class="card-header">
            Position
        </div>
        <div class="card-body">
            <form wire:submit.prevent="savePosition">
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
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
