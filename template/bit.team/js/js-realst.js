$(document).ready(function() {
    $.ajax({
        url: '../ajax.php',
        type: 'POST',
        data: 'purp=amount',
        success: function (data) {
            if(data.length > 0)
            {
                var amount = '<span class="aaaa">'+data+'</span>';
                $('.aaaa').remove();
                $('#amount').append(amount);
                $('#amount').css('display', 'block');
                $('#loading').css('display', 'none');
                if($('*').is('#cabinet-amount'))
                {
                    $('#loading-2').css('display', 'none');
                    $('#cabinet-amount').append(amount);
                }
                if($('*').is('#refill-amount'))
                {
                    $('#loading-2').css('display', 'none');
                    $('#refill-amount').append(amount);
                    $.ajax({
                    url: '../ajax.php',
                    type: 'POST',
                    data: 'purp=address',
                    success: function (data){
                        $('#address').val(data);
                    }
                });
                }
            }
        }
    });
    $('#cabinet-amount').ready(function () {
       $('#cabinet-amount').append($('#aaaa').val());
    });
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
        $("#redact-lk-phone").hide();
    });
    $("#btn-red-mail").click(function () {
        $("#redact-lk-mail").show();
    });
    $("#btn-red-pass").click(function () {
        $("#redact-lk-pass").show();
    });
    $("#btn-red-phone").click(function () {
        $("#redact-lk-phone").show();
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
    $(".btn-new-cart").toggle(function() { 
        $(".block-system-cart").slideDown();
       },  
       function() { 
         $(".block-system-cart").slideUp(); 
       }
     );

    $("#btn-sys-1").click(function(){
        $("#system_id").val("6");
        $("#sys-1").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
     $("#btn-sys-2").click(function(){
        $("#system_id").val("5");
        $("#sys-2").show();
        $("#sys-1").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
      $("#btn-sys-3").click(function(){
        $("#system_id").val("4");
        $("#sys-3").show();
        $("#sys-2").hide();
        $("#sys-1").hide();
        $("#sys-4").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
       $("#btn-sys-4").click(function(){
        $("#system_id").val("3");
        $("#sys-4").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-1").hide();
        $("#sys-5").hide();
        $("#sys-6").hide();
    });
        $("#btn-sys-5").click(function(){
        $("#system_id").val("2");
        $("#sys-5").show();
        $("#sys-2").hide();
        $("#sys-3").hide();
        $("#sys-4").hide();
        $("#sys-1").hide();
        $("#sys-6").hide();
    });
        $("#btn-sys-6").click(function(){
        $("#system_id").val("1");
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

    $("input.send-mess-btn").click(function() {
        if($(".area-bue").val().length === 0) {
            $(".user-comment-error").css("display", "block");
            return false;
        }
        else {
            $(".user-comment-error").css("display", "none");
        }
    });

    $(".btn-serche").click(function() {
        if($(".inp-sum").val().length == 0) {
            alert("Введите сумму для поиска");
            return false;
        }
    });
    
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


    $(".btn-add-cart").click(function () {
        var system_id = $("#system_id").val();
        if(system_id.length > 0)
        {
            var content = $('#'+system_id).val();
            var user_id = $('#user_id').val();
            if(content.length > 0)
            {
                var src = "../../template/bit.team/img/system_oplat/op" + system_id + ".png"
                var img = '<img src="' + src + '">';
                $('#' + system_id).val("");
                $('#insert_here').append('<div class="container-lk-1" id="container"></div');
                $('#container').append('<div class="in-lk-1" id="lk"></div>');
                $('#lk').append(img);
                $('#lk').append('<span class="text-lk-add">' + content + '</span>');
                $('#lk').append('<div class="clear">');
                $.ajax({
                url: '../ajax.php',
                type:'POST',
                data:'purp=card&system_id='+system_id+'&card_num='+content+'&user_id='+user_id,
                success: function(data){
                    }
                });
            }
        }
    });

});

