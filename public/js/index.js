$(window).on("load", function () {
    if (localStorage.getItem("location") !== 'unknown') {
        qs('#location').value = localStorage.getItem("location");
    }

    // hide result
    qs("#result").style.display = 'none';

    let $form = qs('#attForm');
    qs('#id').focus();

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#wizard_container").toggleClass("toggled");
        qs('#id').focus();
    });

    $form.addEventListener('submit', function (e) {
        e.preventDefault();
        var dataToSend = toJSONString(this);

        let audioSuccess = $('#audioSuccess').val();
        let audioFailed = $('#audioFailed').val();
        let dataReceived = "";
        fetch("/absen", {
            method: "post",
            headers: {"Content-Type": "application/json"},
            body: dataToSend
        })
            .then(function (response) {
                if (response.status === 200) {
                    const audio = new Audio(audioSuccess);
                    audio.play();
                } else {
                    const audio = new Audio(audioFailed);
                    audio.play();
                }
                return response.json();
            })
            .then(function (data) {
                resetNotification();
                if (data.errors) {
                    qs("#result").style.color = 'red';
                    qs("#result").style.display = '';
                    qs("#result").innerHTML = "<i class='far fa-times-circle fa-sm' style='color: red; margin-right: 10px'></i>" + data.message;
                } else {
                    qs("#result").style.display = '';
                    qs("#result").innerHTML = "<i class='far fa-check-circle fa-sm' style='color: lightgreen; margin-right: 10px'></i>" + data.message
                    + '<span id="name" style="margin-bottom: 10px; font-weight: bolder">' + data.name + '</span>';
                }
                qs('#id').value = '';
                qs('#id').focus();

            });
    });
});
