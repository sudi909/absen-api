let $storageEnabled = false;
if (typeof(Storage) !== "undefined") {
    $storageEnabled = true;
}

localStorage.setItem("location", "YayasanVitka");

function qs(selector) {
    return document.querySelector(selector);
}

$(window).on("load", function(){
    let $location = localStorage.getItem("location");
    let $form = qs('#attForm');

    $form.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log('test');
        // var data = $form.serializeArray();
        // console.log(data);
    });
});
