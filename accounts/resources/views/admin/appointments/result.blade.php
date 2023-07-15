<div class="table-responsive">
    <table class="table table-sm">
        <thead>
        <tr>
            <th>User</th>
            <th>Email</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="tag_container">
        @forelse($searchResults as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{customDate($item->created_at,'M d, Y')}}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                <i data-feather="edit-2" class="mr-50"></i>
                                <span>Accept</span>
                            </a>

                            <a href="#"
                               class="dropdown-item delete-btn">
                                <i data-feather="trash" class="mr-50"></i>
                                <span>Delete</span>
                            </a>
                        </div>
                    </div>
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
