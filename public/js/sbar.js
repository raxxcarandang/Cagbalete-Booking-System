const hamBurger = document.querySelector(".toggle-btn");
let margintoggle = false;
hamBurger.addEventListener("click", function () {
	margintoggle = !margintoggle;
document.querySelector("#sidebar").classList.toggle("expand");

if (margintoggle == true) {
$(".main").css('margin-left', '20vw');
$(".main").css('max-width', '100vw');

$("#accheadpreview").css('max-width', '60vw');
$("#accpreview").css('max-width', '60vw');


} else {
	$(".main").css('margin-left', '5vw');

	$(".main").css('max-width', '100%');
	$("#accheadpreview").css('max-width', '72vw');
	$("#accheadpreview").css('max-width', '72vw');
}

});


$(document).ready(function(){
    
});

function cheadtoggle() {
        $(".chead").toggle(); 
}

/*
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
*/


