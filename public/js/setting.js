$(window).on("load", function () {
    qs('#location').value = localStorage.getItem("location");
    let $form = qs('#settingForm');
    qs('#location').focus();

    // hide result
    qs("#result").style.display = 'none';

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#wizard_container").toggleClass("toggled");
    });

    $form.addEventListener('submit', function (e) {
        e.preventDefault();
        localStorage.setItem("location", qs('#location').value);

        qs("#result").style.color = 'green';
        qs("#result").style.display = '';
        qs("#result").innerHTML = "Location Updated";
    });
});
