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
<form id="counter-form" action="{{route('admin.save.ratecounter')}}" method="POST"
      style="display: none;">
    @csrf
    <input type="hidden" name="rate_counter" class="rate_counter">
    <input type="hidden" name="id" class="user_id">
</form>
<script>
    $(document).on('change', '.search_country_id', function () {
    let city = $(this).val();
    $.ajax({
        type: 'GET',
        data: {city: city},
        url: '{{route('append.areas')}}',
        success: function (response) {
            $('.appendCities').html(response.view);
        },
    });
})
</script>
<script>

$(document).on('change','.rate_counter_input',function(){
     let count_val = $(this).val();
     let id = $(this).data('id');
     $('.rate_counter').val(count_val);
     $('.user_id').val(id);

     $('#counter-form').submit();
})
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
    $(document).on('click', '.add_promocode', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let code = $(this).data('code');
        let discount = $(this).data('discount');
        let expiry = $(this).data('expiry');
        let total_user = $(this).data('totaluser');
        let per_user = $(this).data('peruser');
        $('.promo_code').val(code);
        $('.per_user').val(per_user);
        $('.total_user').val(total_user);
        $('.expiry_date').val(expiry);
        $('.promo_discount').val(discount);
        $('.promo_form').attr('action',url);
        $('#promoModal').modal('show');
    })
</script>
@stack('js')

<script>
</script>
</body>
</html>
