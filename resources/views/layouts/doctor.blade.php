<!DOCTYPE html>
<html  class="light-layout">
<head>
    @include('doctor.include.head')
    @stack('css')
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-extended  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">
<div class="page-loader d-none">
    <div class="loader"></div>
</div>
@include('doctor.include.header')
@include('doctor.include.sidebar')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="ml-25" href="javascript:;">Ipersona</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Picnave<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@include('doctor.include.script')

<form id="delete-form" action="" method="POST"
      style="display: none;">
    @csrf
    @method('delete')
</form>
@stack('js')
<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Edit Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body append_body">
        
      </div>
    </div>
  </div>
</div>
<script>
    $(document).on('click','.edit_schedule',function(e){
       e.preventDefault();

       let url = $(this).attr('href');

       toastr.success('Please wait your request has sent');
        $.ajax({
            type: 'GET',
            data: {},
            url: url,
            success: function (response) {
                $('.append_body').html(response.view);
                $('#editScheduleModal').modal('show');
                $('.pickatime').pickatime();
            }
        });
    })
</script>
</body>
</html>
