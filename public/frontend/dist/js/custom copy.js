$(document).on('submit', '.contact_form', function (e) {
    e.preventDefault();
    if (!validate())
        return false;
    if ($("div").hasClass("alert-dangers")) {
        return false;
    }
    toastr.success('Please wait your request has sent');
    var form = $(this);
    var data = new FormData(this);
    $(form).find('.submit_btn').prop('disabled', true);
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
            $(form).find('.submit_btn').prop('disabled', true);
            if (response.error) {
                toastr.error(response.error);
            } else {
                toastr.success(response.success);
            }
            $(form).find('.submit_btn').prop('disabled', false);
            if (!response.update) {
                $(form).trigger("reset");
            }
        },
        error: function (xhr, status, error) {
            if (xhr.status == 422) {
                $(form).find('div.alert').remove();
                var errorObj = xhr.responseJSON.errors;
                $.map(errorObj, function (value, index) {
                    var appendIn = $(form).find('[name="' + index + '"]').closest('div');
                    if (!appendIn.length) {
                        toastr.error(value[0]);
                    } else {
                        $(appendIn).append('<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' + value[0] + '</div>')
                    }
                });
                $(form).find('.submit_btn').prop('disabled', false);

            } else {
                $(form).find('.submit_btn').prop('disabled', false);
                toastr.error('Unknown Error!');
            }

        }
    });
});
$(document).on('submit', '.update_password', function (e) {
    e.preventDefault();
    if (!validate())
        return false;
    if ($("div").hasClass("alert-dangers")) {
        return false;
    }
    toastr.success('Please wait your request has sent');
    var form = $(this);
    var data = new FormData(this);
    $(form).find('.submit_btn').prop('disabled', true);
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
            $(form).find('.submit_btn').prop('disabled', true);
            if (response.error) {
                toastr.error(response.error);
            } else {
                toastr.success(response.success);
            }
            $(form).find('.submit_btn').prop('disabled', false);
            if (!response.update) {
                $(form).trigger("reset");
            }
        },
        error: function (xhr, status, error) {
            if (xhr.status == 422) {
                $(form).find('div.alert').remove();
                var errorObj = xhr.responseJSON.errors;
                $.map(errorObj, function (value, index) {
                    var appendIn = $(form).find('[name="' + index + '"]').closest('div');
                    if (!appendIn.length) {
                        toastr.error(value[0]);
                    } else {
                        $(appendIn).append('<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' + value[0] + '</div>')
                    }
                });
                $(form).find('.submit_btn').prop('disabled', false);

            } else {
                $(form).find('.submit_btn').prop('disabled', false);
                toastr.error('Unknown Error!');
            }

        }
    });
});

$(document).on('submit', '.auth_form', function (e) {
    e.preventDefault();
    if (!validate())
        return false;
    if ($("div").hasClass("alert-dangers")) {
        return false;
    }
    toastr.success('Please wait your request has sent');
    var form = $(this);
    var data = new FormData(this);
    $(form).find('.submit_btn').prop('disabled', true);
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
            $(form).find('.submit_btn').prop('disabled', true);
            if (response.error) {
                toastr.error(response.error);
            } else {
                toastr.success(response.success);
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                }
            }
            $(form).find('.submit_btn').prop('disabled', false);
            $(form).trigger("reset");
        },
        error: function (xhr, status, error) {
            if (xhr.status == 422) {
                $(form).find('div.alert').remove();
                var errorObj = xhr.responseJSON.errors;
                $.map(errorObj, function (value, index) {
                    var appendIn = $(form).find('[name="' + index + '"]').closest('div');
                    if (!appendIn.length) {
                        toastr.error(value[0]);
                    } else {
                        $(appendIn).append('<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' + value[0] + '</div>')
                    }
                });
                $(form).find('.submit_btn').prop('disabled', false);

            } else {
                $(form).find('.submit_btn').prop('disabled', false);
                toastr.error('Unknown Error!');
            }

        }
    });
});

function validate() {
    var valid = true;
    $(".alert-danger").remove();

    $(".required:visible").each(function () {
        if ($(this).val() == "" || $(this).val() === null || ($(this).attr('type') == "radio" && $('[name="' + $(this).attr('name') + '"]:checked').val() == undefined)) {
            $(this)
                .closest("div")
                .append('<div class="alert-danger">This field is required</div>');

            valid = false;
        }
    });
    if (!valid) {
        $("html, body").animate({
                scrollTop: $(".alert-danger:first").offset().top - 80,
            },
            100
        );
    }
    return valid;
}
