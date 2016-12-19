$(document).ready(function() {
    $('.full-auth').mouseenter(function() {
        $('.full-auth').addClass('animated tada');
    });
    $('.full-auth').mouseleave(function() {
        $('.full-auth').removeClass('animated tada');
    });
    $('#btn-obl').click(function () {
        $("#window-dialog").hide();
    })
    $('#btn-lk').click(function () {
        $("#window-autor").show();
    })
    $("#btn-full-table").click(function () {
        $("#full-table").slideToggle(400);
    })
    
});