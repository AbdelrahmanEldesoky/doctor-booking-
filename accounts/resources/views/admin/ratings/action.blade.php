<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
        <i class="fa fa-ellipsis-v"></i>
    </button>
    <div class="dropdown-menu">

        <a href="{{route('admin.ratings.destroy',$query->id)}}" class="dropdown-item delete-btn">
            <i data-feather="trash" class="mr-50"></i>
            <span>Delete</span>
        </a>

    </div>
</div>
