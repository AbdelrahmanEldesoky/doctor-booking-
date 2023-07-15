<div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.doctors.create',$id)}}">
                                <i data-feather="edit-2" class="mr-50"></i>
                                <span>Edit</span>
                            </a>
                            <a class="dropdown-item" href="{{route('admin.doctors.show',$id)}}">
                                <i data-feather="eye" class="mr-50"></i>
                                <span>Show</span>
                            </a>
                            <a href="{{route('admin.doctors.destroy',$id)}}"
                               class="dropdown-item delete-btn">
                                <i data-feather="trash" class="mr-50"></i>
                                <span>Delete</span>
                            </a>
                            <a class="dropdown-item" href="{{route('admin.doctors.dashboard',$id)}}">
                                <i data-feather="eye" class="mr-50"></i>
                                <span>Dashboard</span>
                            </a>
                            <a class="dropdown-item" href="{{route('invoice',$id)}}">
                                <i data-feather="eye" class="mr-50"></i>
                                <span>Invoice</span>
                            </a>
                            <a class="dropdown-item" href="{{route('invoiceDownload',$id)}}">
                                <i data-feather="eye" class="mr-50"></i>
                                <span>Save Invoice</span>
                            </a>
                        </div>
                    </div>