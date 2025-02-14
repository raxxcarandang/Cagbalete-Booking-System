const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
document.querySelector("#sidebar").classList.toggle("expand");
});

$(document).ready(function(){
    
});

function cheadtoggle() {
        $(".chead").toggle(); 
}

function updtoggle() {
    $(".dbinfo").toggle();
    $(".updform").toggle();
    $("#btnupd").toggle();
    $("#btnsav").toggle();
}

function updatebook() {
    $(".dbinfo").toggle();
    $(".updform").toggle();
    $("#btnupd").toggle();
    $("#btnsav").toggle();
}


