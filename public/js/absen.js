let $storageEnabled = false;
if (typeof (Storage) !== "undefined") {
    $storageEnabled = true;
}

localStorage.setItem("location", "YayasanVitka");

function qs(selector) {
    return document.querySelector(selector);
}

function toJSONString(form) {
    var obj = {};
    var elements = form.querySelectorAll("input, select, textarea");
    for (var i = 0; i < elements.length; ++i) {
        var element = elements[i];
        var name = element.name;
        var value = element.value;

        if (name) {
            obj[name] = value;
        }
    }

    return JSON.stringify(obj);
}

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
                if (data.errors) {
                    qs("#result-checkin").style.color = 'red';
                } else {
                    qs("#result-checkin").style.color = 'green';
                }
                qs("#result-checkin").style.display = '';
                qs("#result-checkin").innerHTML = data.message;

                qs('#id').value = '';
                qs('#id').focus();

                setInterval(function () {
                    qs("#result-checkin").style.display = 'none';
                    qs("#result-checkin").innerHTML = '';
                    qs("#result-checkin").style.color = 'black';
                }, 5000);
            });


    });
});
