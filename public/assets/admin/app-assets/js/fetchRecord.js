// SET DEFAULT TABLE LENGTH LIMIT
let table_length_limit = 15;


// LOAD RECORD ON PAGE LOAD FIRST TIME
$(document).ready(function () {
    loadRecords();
});
$(document).on('click', '.data-reset', function () {
    $('.delivery_date').val('');
    $('.number').val('');
    $('.status').val('');
    $('.payment_status').val('');
    $('.grand_total').val('');
    $('.id').val('');
    loadRecords();
});


// LOAD RECORD FUNCTION
function loadRecords() {
    $.ajax({
        url: '?table_length_limit=' + table_length_limit,
        type: "get",
        datatype: "html"
    }).done(function (data) {
        $("#append-record").empty().html(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        loadRecords();
    });
}


// GET DATA FROM SERVER EVENT
function getData(page) {
    $.ajax({
        url: '?page=' + page + '&table_length_limit=' + $('.table_length_limit').val(),
        type: "get",
        datatype: "html"
    }).done(function (data) {
        $("#append-record").empty().html(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}


// PAGINATION CLICK EVENT
$(document).on('click', '.pagination a', function (event) {

    event.preventDefault();

    $('li').removeClass('active');
    $(this).parent('li').addClass('active');

    var myurl = $(this).attr('href');
    var page = $(this).attr('href').split('page=')[1];
    getData(page);

});


// TABLE LENGTH CHANGE EVENT
$(document).on('change', '.table_length_limit', function (event) {
    $('.overlay-bg').removeClass('d-none');
    $.ajax(
        {
            url: '?table_length_limit=' + $(this).val(),
            type: "get",
            datatype: "html"
        }).done(function (data) {
        $("#append-record").empty().html(data);
        $('.overlay-bg').addClass('d-none');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });

});

//TABLE FILTER SEARCH BOX EVENT
//TABLE FILTER SEARCH BOX EVENT
$(document).on('keyup', '.table_filter_search', function (event) {

    var table_filter_search = $(this).val();

    delay(function () {

        $('.overlay-bg').removeClass('d-none');

        $.ajax({
            url: '?table_filter_search=' + table_filter_search + '&table_length_limit=' + $('.table_length_limit').val(),
            type: "get",
            datatype: "html"
        }).done(function (data) {
            $("#append-record").empty().html(data);
            $('.overlay-bg').addClass('d-none');
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }, 1000);

});

$(document).on('click', '.data-submit', function (event) {
    let modal = $(this).closest('.modal-slide-in');
    var date = $(this).closest('form').find('.delivery_date').val() ?? '';
    var number = $(this).closest('form').find('.number').val() ?? '';
    var status = $(this).closest('form').find('.status').val() ?? '';
    var payment_status = $(this).closest('form').find('.payment_status').val() ?? '';
    var id = $(this).closest('form').find('.id').val() ?? '';
    var grand_total = $(this).closest('form').find('.grand_total').val() ?? '';
    delay(function () {

        $('.overlay-bg').removeClass('d-none');

        $.ajax({
            url: '?date=' + date + '&number=' + number + '&status=' + status + '&payment_status=' + payment_status + '&id=' + id + '&grand_total=' + grand_total,
            type: "get",
            datatype: "html"
        }).done(function (data) {
            $("#append-record").empty().html(data);
            $('.overlay-bg').addClass('d-none');
            modal.hide();
            $('.modal-backdrop').hide();
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }, 1000);

});

$(document).on('click', '.exportData', function (e) {
    e.preventDefault();
    var table_filter_search = $('.table_filter_search').val();
    var table_length_limit = +$('.table_length_limit').val()
    // $('#filter-form-submit').submit();
    var date = $('.delivery_date').val() ?? '';
    var number = $('.number').val() ?? '';
    var status = $('.status').val() ?? '';
    var payment_status = $('.payment_status').val() ?? '';
    var grand_total = $('.grand_total').val() ?? '';
    var id = $('.id').val() ?? '';
    delay(function () {
        // $('.overlay-bg').removeClass('d-none');
        $.ajax({
            url: '?export=data',
            type: "get",
            data: {date, number, status, payment_status, id, grand_total, table_filter_search, table_length_limit},
            responseType: "blob",
            // datatype: 'json'
        }).done(function (response) {
            var a = document.createElement("a");
            a.href = response.file;
            a.download = response.name;
            document.body.appendChild(a);
            a.click();
            a.remove();
            // $("#append-record").empty().html(data);
            // $('.overlay-bg').addClass('d-none');
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }, 1000);

});

let delay = (() => {
    let timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

