<div>
    <form wire:submit.prevent="saveCategoryCarer">
    <!-- Button trigger modal -->
    <div wire:ignore.self class="modal fade" id="form-modal-category-carer" tabindex="-1" aria-labelledby="form-modal-category-carerLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-modal-category-carerLabel">Form Category Carer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="idKey" value="0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cc_name">Category Carer</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('cc_name') is-invalid @enderror" 
                                    placeholder="Category Carer..." 
                                    wire:model="cc_name">
                                    @error('cc_name')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cc_status">Status</label>
                                <select wire:model="cc_status" class="form-control @error('cc_status') is-invalid @enderror">
                                    <option >Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                                @error('cc_status')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cc_desc">Description</label>
                        <textarea class="form-control" wire:model="cc_desc"></textarea>
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