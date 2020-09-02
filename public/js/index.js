$(window).on("load", function () {
    qs('#location').value = localStorage.getItem("location");

    // hide result
    qs("#result-checkin").style.display = 'none';

    let $form = qs('#attForm');
    qs('#id').focus();

    $form.addEventListener('submit', function (e) {
        e.preventDefault();
        var dataToSend = toJSONString(this);

        let dataReceived = "";
        fetch("/absen", {
            method: "post",
            headers: {"Content-Type": "application/json"},
            body: dataToSend
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                resetNotification();
                if (data.errors) {
                    qs("#result-checkin").style.color = 'red';
                } else {
                    qs("#result-checkin").style.color = 'green';
                }
                qs("#result-checkin").style.display = '';
                qs("#result-checkin").innerHTML = data.message;

                qs('#id').value = '';
                qs('#id').focus();
            });
    });
});
