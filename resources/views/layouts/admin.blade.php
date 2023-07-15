<!DOCTYPE html>
<html class="light-layout">
<head>
    @include('admin.include.head')
    @stack('css')
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-extended  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">
<div class="page-loader d-none">
    <div class="loader"></div>
</div>
@include('admin.include.header')
@include('admin.include.sidebar')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


@include('admin.include.script')

<form id="delete-form" action="" method="POST"
      style="display: none;">
    @csrf
    @method('delete')
</form>
<script>

    $(document).on('click', '.add_speciality', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let name_en = $(this).data('name_en');
        let name_ar = $(this).data('name_ar');
        let image = $(this).data('image');
        $('.speciality_image').attr('data-default-file',image);
        $('.speciality_name_en').val(name_en);
        $('.speciality_name_ar').val(name_ar);
        $('.speciality_form').attr('action',url);
        $('#specialityModal').modal('show');
       
    })
</script>
@stack('js')

<script>
</script>
</body>
</html>
