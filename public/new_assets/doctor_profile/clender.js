window.onload = function() {
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });
    close_time_container.onclick = function() {
        document.querySelector(".date_input_container").classList.remove("show");
    }
    document.querySelectorAll(".time_link").forEach((a) => {
        a.onclick = function() {
            document.querySelector(".date_input_container").classList.add("show");
        }
    })

}

$('.schedule_time').click(function(){

    let customday = [$(this).data("day")];

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5',
        local: 'ar'
    });
    /** for tarnslate days */
    var dayNamesMin = $("#datepicker").datepicker("option", "dayNamesMin");

    // Setter
    $("#datepicker").datepicker("option", "dayNamesMin", [days[1], days[2], days[3], days[4],
    days[5], days[6], days[0],
    ]);

    /** for tarnslate month */


var daymonthMin = $("#datepicker").datepicker("option", "monthNames");

// Setter
$("#datepicker").datepicker("option", "monthNames", [month[0], month[1], month[2], month[3],
month[4], month[5], month[6],month[7],month[8],month[9],month[10],month[11]
]);


$("#datepicker").datepicker({
    beforeShowDay: function (date) {
        var day = jQuery.datepicker.formatDate("yy-mm-dd", date);
        return [msg.indexOf(day) == -1];
    },
});

  $("#datepicker").datepicker("option", "beforeShowDay", function (date) {
      var day = date.getDay();
      let customPickr = $('.flatpickr-custom');
    //   if (customPickr.length) {
    //       customPickr.flatpickr({
    //           minDate: "today",
    //           "disable": [
    //               function (date) {
    //                   return (date.getDay() != day);
    //               }
    //           ],
    //       });
    //   }

        return [customday.indexOf(day) != -1];

  });

});

$("#datepicker").ready(function () {
    $("#datepicker").datepicker({
        minDate: 0
    });
});
// Getter
