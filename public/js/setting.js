$(window).on("load", function () {
    qs('#location').value = localStorage.getItem("location");
    let $form = qs('#settingForm');
    qs('#location').focus();

    // hide result
    qs("#result-checkin").style.display = 'none';

    $form.addEventListener('submit', function (e) {
        e.preventDefault();
        localStorage.setItem("location", qs('#location').value);

        qs("#result-checkin").style.color = 'green';
        qs("#result-checkin").style.display = '';
        qs("#result-checkin").innerHTML = "Location Updated";
    });
});
