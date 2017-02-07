$(document).ready(function() {
    $(".menu-phone").click(function () {
        $(".content-menu-phone").slideToggle(400);
    });
    $(".btn-lk").click(function () {
        $(".win-container").show();
    });
	$(".close-left").click(function () {
        $(".win-container").hide();
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


    // $(".btn-new-cart").toggle(function() { 
    //     $(".block-system-cart").slideDown();
    //   },  
    //   function() { 
    //     $(".block-system-cart").slideUp(); 
    //   }
    // );

    $("#btn-sys-1").click(function(){
        $("#sys-1").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
     $("#btn-sys-2").click(function(){
        $("#sys-2").show();
        $("#sys-1").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
      $("#btn-sys-3").click(function(){
        $("#sys-3").show();
        $("#sys-2").hide();
        $("#sys-1").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
       $("#btn-sys-4").click(function(){
        $("#sys-4").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-1").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
        $("#btn-sys-5").click(function(){
        $("#sys-5").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-1").hide();
        $("#sys-6").hide();
    });
         $("#btn-sys-6").click(function(){
        $("#sys-6").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-1").hide();
    });


    $(".btn-info-mess").toggle(function() { 
        $(".modalInfoMessege").slideDown();
      },  
      function() { 
        $(".modalInfoMessege").slideUp(); 
      }
    );

    $(".send-mess-btn").click(function() {
        if($(".area-bue").val().length == 0) {
            $(".user-comment-error").css("display", "block");
            return false;
        }
        else {
            $(".user-comment-error").css("display", "none");
        }
    })

    $(".btn-serche").click(function() {
        if($(".inp-sum").val().length == 0) {
            alert("Введите сумму для поиска");
            return false;
        }
    })

    // $('.btn-authorization').click(function() {
    //     if(document.getElementById('btn-double-auth').style.backgroundImage == 'url("http://localbitcoin/template/bit.team/img/elements/btn-faqt.png")'){
    //     //if($('#btn-double-auth').css('backgroundImage') === 'url("http://localbitcoin/template/bit.team/img/elements/btn-faqt.png")') {
    //         $('#btn-double-auth').css('backgroundImage', 'url(http://localbitcoin/template/bit.team/img/elements/btn-faqt-no.png)');
    //         return;    
    //     }
    //     else {
    //         $('.btn-authorization').css('backgroundImage', 'url(http://localbitcoin/template/bit.team/img/elements/btn-faqt.png)');    
    //     }
    // });

});

