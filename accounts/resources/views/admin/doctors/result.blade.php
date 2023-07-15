<div class="table-responsive">
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody id="tag_container">
        @forelse($searchResults as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{customDate($item->created_at,'M d, Y')}}</td>
                <td><span class="btn btn-success">Active</td>
                <td>
                    
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="6">No records were found right now!</td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-6 text-left seach-result-info">
        <p>Showing {{ $searchResults->firstItem() }} to {{ $searchResults->lastItem() }}
            of {{ $searchResults->total() }} entries</p>
    </div>
    <div class="col-lg-6 text-right seach-result-info">
        {{--        {{ $searchResults->links('vendor.pagination.custom') }}--}}
        {{ $searchResults->onEachSide(5)->links() }}
    </div>
</div>
