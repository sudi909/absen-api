$(window).on("load", function () {
    let today = new Date();
    let endDate = new Date();
    endDate.setMonth(endDate.getMonth() + 1);

    qs('#location').value = localStorage.getItem("location");
    let $form = qs('#reportForm');

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#wizard_container").toggleClass("toggled");
    });

    $('input[name="daterange"]').daterangepicker({
        startDate: today,
        endDate: endDate,
        locale: {
            format: 'DD MMM YYYY',
            separator: " - ",
            applyLabel: 'Set Date',
            daysOfWeek: [
                'Su',
                'Mo',
                'Tu',
                'We',
                'Th',
                'Fr',
                'Sa'
            ],
            monthNames: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
        },
        opens: 'right'
    });
});
