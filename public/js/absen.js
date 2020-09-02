let $storageEnabled = false;
if (typeof (Storage) !== "undefined") {
    $storageEnabled = true;
}

if (localStorage.getItem("location") === null) {
    localStorage.setItem("location", "unknown");
}

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

function resetNotification() {
    qs("#result").style.display = 'none';
    qs("#result").innerHTML = '';
    qs("#result").style.color = 'black';
}
