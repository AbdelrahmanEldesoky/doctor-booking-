@extends('layouts.admin')
@section('title','Dashboard |Admin')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}"/>
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="row-grouping-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justify-content-between">
                                    <h4 class="card-title">Hospital Images</h4>
                                    <div>
                                    <a href="javascript:;" data-href="{{route('admin.hospital_images.store',$id)}}"
                                       class="btn btn-primary add_hospital_image">Add More</a>
                                    </div>
                                </div>
                                <div class="card-body mt-2">
                                    <div class="table-responsive">
                                        {{ $dataTable->table(['class' => 'table text-center table-striped w-100'],true) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hospitalImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hospital Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hospital_id" class="hospital_id">
      <div class="modal-body">
         <label>Image</label>
         <input type="file" class="form-control" required name="file">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
@endsection
@push('js')

    {{--    <script src="{{  asset('assets/admin/dashboard/js/jquery.min.js')}}"></script>--}}
    <script src="{{  asset('assets/admin/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{  asset('assets/admin/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    @if(in_array('data-table',$assets ?? []))
        <script type="text/javascript"
                src="{{ asset('assets/admin/vendor/datatables/dataTables.buttons.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/pdfmake.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/vfs_fonts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.html5.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/buttons.server-side.js')}}"></script>
    @endif
    {{ $dataTable->scripts() }}


    <script>
        $(document).on('click','.add_hospital_image',function(){
            let url = $(this).data('href');
            let id = $(this).data('hospital_id');

           $('#hospitalImageModal').find("form").attr('action',url);      
           $('#hospitalImageModal').find(".hospital_id").val(id);     
           
           $('#hospitalImageModal').modal('show');

        })
        $(document).on('click','.edit_hos_img',function(){
            let url = $(this).data('href');

           $('#hospitalImageModal').find("form").attr('action',url);      
           
           $('#hospitalImageModal').modal('show');

        })
    </script>
@endpush
