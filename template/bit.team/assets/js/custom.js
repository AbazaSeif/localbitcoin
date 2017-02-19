
/*=============================================================
    Authour URI: www.binarycart.com
    Version: 1.1
    License: MIT
    
    http://opensource.org/licenses/MIT

    100% To use For Personal And Commercial Use.
   
    ========================================================  */

(function ($) {
    $('.login').click(function(){
        $('#selectedlogin').val(this.innerText);
        var login = this.innerText;
        $.ajax({
            url: '../ajax.php',
            type: 'POST',
            data: 'purp=commission&login='+login ,
            success: function (data){
                $('#commission').css('display', 'block');
                $('#commission-value').val(data);
            }
        });
        $.ajax({
            url: '../ajax.php',
            type: 'POST',
            data: 'purp=requistes&login='+login ,
            success: function (data){
                $('.container-lk-1').remove();
                $('#pay_systems').css('display', 'block');
                var requistes = JSON.parse(data);
                requistes.forEach(function(item, i){
                    var src = "../../template/bit.team/img/system_oplat/op" + item['system_id'] + ".png";
                    var img = '<img src="' + src + '">';
                    $('#' + item['system_id']).val("");
                    $('#cards').append('<div class="container-lk-1" id="container'+i+'"></div');
                    $('#container'+i).append('<div class="in-lk-1" id="lk'+i+'"></div>');
                    $('#lk'+i).append(img);
                    $('#lk'+i).append('<input id="'+item['id']+'" class="text-lk-add" value="'+item['card_num']+'">');
                    $('#lk'+i).append('<span class="fa fa-times rm-cart" aria-hidden="true" onclick="rm_card('+item['id']+','+i+')"></span>');
                    $('#lk'+i).append('<div class="clear">');
                });
                $('.text-lk-add').focusout(function (){ 
                    var id = this.id;
                    $.ajax({
                        url: '../ajax.php',
                        type: 'POST',
                        data: 'purp=change_card&id=' + id +'&number=' + this.value
                    });
                });
            }
        });
    });
    $('#commission-value').focusout(function(){
        var login = $('#selectedlogin').val();
        $.ajax({
            url: '../ajax.php',
            type: 'POST',
            data: 'purp=setcommission&login='+login+'&value='+this.value
        });
    });
}(jQuery));
function change_user(item)
{
    var parr = item.parentElement.parentElement;
    document.getElementById('username').value = parr.children[1].innerText;
    document.getElementById('email').value = parr.children[2].innerText;
    document.getElementById('verified').value = (parr.children[6].innerText == "Нет")?"0":"1";
    document.getElementById('role').value = (parr.children[8].innerText == "Нет")?"1":"2";
    document.getElementById('blocked').value = (parr.children[7].innerText == "Нет")?"0":"1";
    document.getElementById('edit_user_id').value = parr.children[0].innerText;
}
function change_ads(item)
{
    var parr = item.parentElement.parentElement;
    document.getElementById('type').value = (parr.children[2].innerText == "Продать")?"2":"1";
    document.getElementById('location').value = parr.children[3].innerText;
    document.getElementById('currency_id').value = parr.children[10].innerText;
    document.getElementById('price').value = parr.children[11].innerText;
    document.getElementById('max_amount').value = parr.children[12].innerText;
    document.getElementById('comment').value = parr.children[9].innerText;
    document.getElementById('edit_ads_id').value = parr.children[0].innerText;
}
function change_comm(item)
{
    var parr = item.parentElement.parentElement;
    document.getElementById('comment').value = parr.children[3].innerText;
    document.getElementById('edit_comm_id').value = parr.children[0].innerText;
}

function rm_card(id, i)
{
    $('#container'+i).remove();
    $.ajax({
        url: '../ajax.php',
        type: 'POST',
        data: 'purp=rm_card&id=' + id
    });

}