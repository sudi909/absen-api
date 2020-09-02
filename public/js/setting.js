$(window).on("load", function () {
    qs('#location').value = localStorage.getItem("location");
    let $form = qs('#settingForm');
    qs('#location').focus();

    // hide result
    qs("#result").style.display = 'none';

    $form.addEventListener('submit', function (e) {
        e.preventDefault();
        localStorage.setItem("location", qs('#location').value);

        qs("#result").style.color = 'green';
        qs("#result").style.display = '';
        qs("#result").innerHTML = "Location Updated";
    });
});
