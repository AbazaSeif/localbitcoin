$(document).ready(function() {
    $(".menu-phone").click(function () {
        $(".content-menu-phone").slideToggle(400);
    });
    $(".btn-lk").click(function () {
        $(".win-container").show();
    });
	$(".close-left").click(function () {
        $(".win-container").hide();
        $(".checkWindows").hide();
        $("#redact-lk-pass").hide();
        $("#redact-lk-mail").hide();
    });
    $("#btn-red-mail").click(function () {
        $("#redact-lk-mail").show();
    });
    $("#btn-red-pass").click(function () {
        $("#redact-lk-pass").show();
    });
    $('.inp-btn-popap').mouseenter(function() {
        $('.inp-btn-popap').addClass('animated tada');
    });
    $('.inp-btn-popap').mouseleave(function() {
        $('.inp-btn-popap').removeClass('animated tada');
    });
    $('.btn-reg').mouseenter(function() {
        $('.btn-reg').addClass('animated swing');
    });
    $('.btn-reg').mouseleave(function() {
        $('.btn-reg').removeClass('animated swing');
    });
    $('.reg-btn-bot').mouseenter(function() {
        $('.reg-btn-bot').addClass('animated shake');
    });
    $('.reg-btn-bot').mouseleave(function() {
        $('.reg-btn-bot').removeClass('animated shake');
    });

});

