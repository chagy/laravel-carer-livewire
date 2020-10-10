<div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            @livewire('position-form')

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
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $positions->links() !!}
        </div>
    </div>
</div>
