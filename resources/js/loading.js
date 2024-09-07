/* public/js/loading.js */

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loading").style.display = "none";
});

$(document).ajaxStart(function () {
    $("#loading").show();
}).ajaxStop(function () {
    $("#loading").hide();
});
