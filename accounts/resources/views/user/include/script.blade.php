<script src="{{asset('assets/admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/form-select2.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/charts/chart.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/card-js.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<script>
    $(window).on('load', function () {

        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    @if(session('message'))
    toastr.success("{{ session('message') }}");
    @elseif(session('error'))
    toastr.error("{{ session('error') }}");
    @endif
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $('#delete-form').attr('action', url);
                $('#delete-form').submit();
            }
        });
    }

    $(document).on('click','.delete-btn',function(e)
    {
        e.preventDefault();
        let url = $(this).attr('href');
        deleteAlert(url)
    })
</script>
<script>
    $(document).on('keypress', '.notNumber', function () {
        return event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32
    })
    $(document).on('keypress', '.onlyNumber', function () {
        return event.charCode >= 48 && event.charCode <= 57
    });
    $(document).on('input', '.decimalNumber', function (e) {
        this.value = this.value.replace(/[^0.00-9.99]/g, '').replace(/(\..*)\./g, '$1').replace(new RegExp("(\\.[\\d]{2}).", "g"), '$1');
    });
    $(document).on('input', '.number', function (e) {
        this.value = this.value.replace(/[^0.00-9.99]/g, '').replace(/(\..*)\./g, '$1')//.replace(new RegExp("(^[\\d]{1})[\\d]", "g"), '$1').replace(/(\..*)\./g, '$1').replace(new RegExp("(\\.[\\d]{2}).", "g"), '$1');
    });



</script>

