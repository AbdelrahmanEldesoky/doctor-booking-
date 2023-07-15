@extends('layouts.doctor')
@section('title', trans('site.Payments'))
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/dashboard/css/dataTables.bootstrap4.min.css') }}" />

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/css/bootstrap-switch.css" />
<style>
    .ribbon-wrapper {
        /*height: 70px;*/
        height: 105px;
        overflow: hidden;
        position: absolute;
        right: -2px;
        top: -2px;
        /*width: 70px;*/
        z-index: 10;
    }

    .ribbon-wrapper .ribbon {
        box-shadow: 0 0 3px rgba(0, 0, 0, .3);
        font-size: .8rem;
        line-height: 100%;
        padding: .375rem 0;
        position: relative;
        text-align: center;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, .4);
        transform: rotate(45deg);
    }

    .ribbon-wrapper .ribbon {
        font-size: .8rem;
        line-height: 100%;
        text-align: center;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, .4);
        text-transform: uppercase;
    }

    .ribbon-wrapper p {
        line-height: 11px;

    }

    .ribbon-wrapper.ribbon-lg .ribbon {
        right: -42px;
        top: 27px;
        width: 160px;
    }

    .ribbon-wrapper .ribbon::before {
        left: 0;
    }

    .ribbon-wrapper .ribbon::after,
    .ribbon-wrapper .ribbon::before {
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        border-top: 3px solid #9e9e9e;
        bottom: -3px;
        content: "";
        position: absolute;
    }

    .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        padding: .75rem 1.25rem;
        position: relative;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .text-sm {
        font-size: .875rem !important;
    }

    .lh_sm {
        line-height: 0px !important;
        ;
    }

    .fa-li {
        left: calc(var(--fa-li-width, 2em) * -1);
        position: absolute;
        text-align: center;
        width: var(--fa-li-width, 2em);
        line-height: inherit;
    }

    .fs-15 {
        font-size: 15px;
    }

    .has-shadow {
        box-shadow: 0px 0px 6px 1px #aaa;
    }

    hr {
        border-top: 1px solid !important;
    }

    .bootstrap-switch-handle-off {
        height: 100% !important;
        background: #DC3545 !important;
        width: 57px !important;
        font-size: 13px !important;
    }

    .bootstrap-switch {
        width: 118px !important;
    }

    .bootstrap-switch-handle-on {
        width: 57px !important;
    }

</style>

@endpush
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0"> @lang('site.Payments')</h2>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle waves-effect waves-float waves-light"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                @lang('site.add_payment_method')
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item bank_add_btn" href="javascript:void(0);"> @lang('site.add_bank')</a>
                                <a class="dropdown-item mobile_add_btn" href="javascript:void(0);"> @lang('site.add_mobile')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-2">
                                <ul class="nav nav-pills mb-5">
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-block" id="home-tab" data-toggle="pill"
                                            href="#home" aria-expanded="true"> @lang('site.Transactions')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile"
                                            aria-expanded="false"> @lang('site.Payment_Methods')</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab"
                                        aria-expanded="true">
                                        <div class="table-responsive">
                                            {{ $dataTable->table(['class' => 'table text-center table-striped w-100'],true) }}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                                        aria-expanded="false">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="stacked-pill-1"
                                                            data-toggle="pill" href="#vertical-pill-1"
                                                            aria-expanded="true">
                                                            @lang('site.Bank_Account')
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="stacked-pill-2" data-toggle="pill"
                                                            href="#vertical-pill-2" aria-expanded="false">
                                                            @lang('site.Mobile_Wallets')
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9 col-sm-12">
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="vertical-pill-1"
                                                        aria-labelledby="stacked-pill-1" aria-expanded="true">
                                                        <div class="row appendBank">
                                                            @include('doctor.components.appendBank')
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="vertical-pill-2" role="tabpanel"
                                                        aria-labelledby="stacked-pill-2" aria-expanded="false">
                                                        <div class="row appendMobile">
                                                        @include('doctor.components.appendMobile')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <q></q>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> @lang('site.Bank_Accounts')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('doctor.payments.bank')}}" class="bank_form">
                @csrf
                <input type="hidden" name="id" class="account_id">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Bank_Name')</label>
                                <input type="text" required name="bank_name" class="form-control required bank_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('site.Branch_Name')</label>
                                <input type="text" name="branch_name" required class="form-control required branch_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Swift_Code')</label>
                                <input type="text" name="swift_code" required class="form-control required swift_code" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.IBAN')</label>
                                <input type="text" required name="iban" class="form-control required iban" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Account_Name')</label>
                                <input type="text" required name="account_name" class="form-control required account_name" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Account_Number')</label>
                                <input type="text" name="account_number" required class="form-control required account_number" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Confirm_Account_Number')</label>
                                <input type="text" name="confirm_account_number" required class="form-control required confirm_account_number" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit_account">@lang('site.save_changes')</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mobileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> @lang('site.Bank_Account')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('doctor.payments.mobile')}}" class="bank_form">
                @csrf
                <input type="hidden" name="id" class="account_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Wallet_Type')</label>
                                <select class="form-control wallet_type" name="wallet_type">
                                    <option>Orange</option>
                                    <option>Vodafone</option>
                                    <option>Edisalat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Mobile_Number')</label>
                                <input type="text" name="mobile_number" required class="form-control mobile_number required" placeholder="Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.Confirm_Mobile_Number')</label>
                                <input type="text" name="confirm_mobile_number" required class="form-control confirm_mobile_number required" placeholder="Number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit_account">@lang('site.save_changes')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.js"></script>
<script>
    $("[name='Makeyourselfonline']").bootstrapSwitch();

</script>
<script>
    $(document).on('click', '.bank_add_btn', function () {
        $('#bankModal').find('form').trigger("reset");
        $('#bankModal').modal('show');
    })

    $(document).on('change', '.eye_line', function () {
        alert($(this).val())
    })
    $(document).on('click', '.edit_bank', function () {
        let id=$(this).data('id');
        let bank=$(this).data('bank');
        let branch=$(this).data('branch');
        let swift=$(this).data('swift');
        let iban=$(this).data('iban');
        let account=$(this).data('account');
        let number=$(this).data('number');

        $('.account_id').val(id);
        $('.bank_name').val(bank);
        $('.swift_code').val(swift);
        $('.branch_name').val(branch);
        $('.iban').val(iban);
        $('.account_name').val(account);
        $('.account_number').val(number);
        $('.confirm_account_number').val(number);
        $('#bankModal').modal('show');
    })
    $(document).on('click', '.mobile_add_btn', function () {
        $('#mobileModal').find('form').trigger("reset");
        $('#mobileModal').modal('show');
    })
    $(document).on('click', '.edit_mobile', function () {
        let id=$(this).data('id');
        let type=$(this).data('type');
        let number=$(this).data('number');

        $('.account_id').val(id);
        $('.wallet_type').val(type);
        $('.mobile_number').val(number);
        $('.confirm_mobile_number').val(number);
        $('#mobileModal').modal('show');
    })
</script>

<script src="{{  asset('assets/admin/dashboard/js/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/admin/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

@if(in_array('data-table',$assets ?? []))
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/vendor/datatables/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/buttons.server-side.js')}}"></script>
@endif
{{ $dataTable->scripts() }}

<script>
        $(document).on('submit', '.bank_form', function (e) {
            e.preventDefault();
            if (!validate())
                return false;
            if ($("div").hasClass("alert-dangers")) {
                return false;
            }
            toastr.success('Please wait your request has sent');
            var form = $(this);
            var data = new FormData(this);
            $(form).find('.submit_account').prop('disabled', true);
            $.ajax({
                type: 'POST',
                data: data,
                cache: !1,
                contentType: !1,
                processData: !1,
                url: $(form).attr('action'),
                async: true,
                headers: {
                    "cache-control": "no-cache"
                },
                success: function (response) {
                    $(form).find('.submit_account').prop('disabled', true);
                    if (response.error) {
                        toastr.error(response.error);
                    } else {
                        toastr.success(response.success);
                        $('.'+response.target).html(response.view)
                        $('.modal').modal('hide');
                        $("[name='Makeyourselfonline']").bootstrapSwitch();

                    }
                    $(form).find('.submit_account').prop('disabled', false);

                },
                error: function (xhr, status, error) {
                    if (xhr.status == 422) {
                        $(form).find('div.alert').remove();
                        var errorObj = xhr.responseJSON.errors;
                        $.map(errorObj, function (value, index) {
                            var appendIn = $(form).find('[name="' + index + '"]')
                                .closest('div');
                            if (!appendIn.length) {
                                toastr.error(value[0]);
                            } else {
                                $(appendIn).append(
                                    '<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' +
                                    value[0] + '</div>')
                            }
                        });
                        $(form).find('.submit_account').prop('disabled', false);

                    } else {
                        $(form).find('.submit_account').prop('disabled', false);
                        toastr.error('Unknown Error!');
                    }

                }
            });
        });
</script>
@endpush
