function js_showOrHideChkbox($id)
{
    var chekbox = document.getElementById('chk'+$id+'');
    var elem = document.getElementById('el'+$id+'');
    $('input#'+chekbox.id).on('ifChecked', function(event){$('#'+elem.id).slideDown(300);});
    $('input#'+chekbox.id).on('ifUnchecked', function(event){$('#'+elem.id).slideUp(300);});
}

function centerBox() {
    var boxWidth = 400;
    /* определяем нужные данные */
    var winWidth = $(window).width();
    var winHeight = $(document).height();
    var scrollPos = $(window).scrollTop();

    /* Вычисляем позицию */

    var disWidth = (winWidth - boxWidth) / 2;
    var disHeight = scrollPos + 150;

    /* Добавляем стили к блокам */
    $('.contact_information').css({'width' : boxWidth+'px', 'left' : disWidth+'px', 'top' : disHeight+'px'});
    $('#blackout').css({'width' : winWidth+'px', 'height' : winHeight+'px'});

    return false;
}

function js_showOrHideDiv($id) // появление pop-up окна "подробно"
{
    js_blackoutShow();
    $('#blackout').fadeIn(100);
    $(window).resize(centerBox);
    $(window).scroll(centerBox);
    centerBox();
    var elem = document.getElementById('el'+$id+'');
    $('#'+elem.id).fadeIn(300);


    $('html,body').css('overflow', 'hidden');
        $('html').click(function() {
            var scrollPos = $(window).scrollTop();
            /* Скрыть окно, когда кликаем вне его области */
            $('.contact_information').hide();
            $('#blackout').hide();
            $("html,body").css("overflow","auto");
            $('html').scrollTop(scrollPos);
        });
        $('.close').click(function() {
            var scrollPos = $(window).scrollTop();
            /* Скрываем тень и окно, когда пользователь кликнул по X */
            $('.contact_information').hide();
            $('#blackout').hide();
            $("html,body").css("overflow","auto");
            $('html').scrollTop(scrollPos);
        });
}
function js_blackoutShow() {
    $('body').append('<div id="blackout"></div>');
}
function js_showZakazchikField($id) 
{
    var chek = document.getElementById('chk1');
    var unchek = document.getElementById('chk2');
    var elem = document.getElementById('el1');
    $('#chk1').on("click", function(event)
    {
        //$('#el3').fadeOut(300);
        $('#el2').fadeOut(300,function()
    {
        $('#'+elem.id).fadeIn(300);
        chek.style.background = "radial-gradient(#1DC5E5, #3CCEE5)";
        chek.style.color = "#F1E8E1";
        chek.style.textShadow = "1px 1px 2px black";
        chek.style.borderColor = "#23A0C4";
        unchek.style.background = "radial-gradient(#0eaae5, #0d88b6)";
        unchek.style.color = "#f8fbfc";
        unchek.style.textShadow = "none";
        unchek.style.borderColor = "#0c678d"

    })
    });

}
function js_showIspolnitelField($id) 
{
    var chek = document.getElementById('chk2');
    var unchek = document.getElementById('chk1');
    var elem = document.getElementById('el2');
    $('#chk2').on("click", function(event)
    {
        $('#el1').fadeOut(300,function()
        {
            $('#el2').fadeIn(300);
            //$('#el3').fadeIn(300);
            chek.style.background = "radial-gradient(#1DC5E5, #3CCEE5)";
            chek.style.color = "#F1E8E1";
            chek.style.textShadow = "1px 1px 2px black";
            chek.style.borderColor = "#23A0C4";
            unchek.style.background = "radial-gradient(#0eaae5, #0d88b6)";
            unchek.style.color = "#f8fbfc";
            unchek.style.textShadow = "none";
            unchek.style.borderColor = "#0c678d"
        })
    });

}

$(document).ready(function(){
    $(".main_button").on("click","a", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();
        //забираем идентификатор бока с атрибута href
        var id  = $(this).attr('href'),
        //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;
        //анимируем переход на расстояние - top за 1500 мс
        $("body").delay(100).animate({scrollTop: top }, 500);
    });
});

$(document).ready(function(){
    $("#menu").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $("body").delay(100).animate({scrollTop: top -200}, 500);
    });
});

$(document).ready(function(){
    $("#menu1").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $("body").delay(100).animate({scrollTop: top -200}, 500);
    });
});

function js_showOrHideMyCom($id) // появление обсуждения предложений
{
    var trigger = document.getElementById('triger'+$id+'');
    var myComSend = document.getElementById('myComSend'+$id+'');
    $('#'+myComSend.id).slideDown(300); $('#trigger'+$id).slideUp(0);
    //$('#chk'+$id).on("click", function(event){$('#'+elem.id).slideUp(300);});
}

function js_answer($offerId)  // ф-я ответа на коммент
{
    var $id=event.target.id.substring(7);
    js_showOrHideMyCom($offerId);
    var $textArea = document.getElementById('myCom_text'+$offerId);
    var $whome = document.getElementById('author_'+$id);
    $textArea.focus();
    $('#myCom_text'+$offerId).val($("#author_"+$id).html()+', ');
    $('#answer_for_'+$offerId).val($id);
    //alert($('#answer_for_'+$offerId).val());
}

function js_echo_comments($comments,$offerId) {
    $.each($comments, function(index, value)
    {
        if (value['answer_for']==0)
        {
            $('#comForCom'+$offerId).append
                ('<ul id="comForOfferID'+value['com_id']+'">' +
                '<li><a id="author_'+value['com_id']+'">'+value.author_name+' </a>('+value.pub_date+'):</li>' +
                '<li>'+value.com_text+'</li>' +
                '<div><a id="answer_'+value['com_id']+'" class="myComAnswer" onclick="js_answer('+$offerId+')">Ответить</a>' +
                '</div><div style="clear:both;"></div>' +
                '</ul>');
            
        }
        else
        {
            $('#comForOfferID'+value['answer_for']).append
            ('<ul id="'+value['com_id']+'" style="margin-left: 10%">' +
                '<li><a id="author_'+value['com_id']+'">'+value.author_name+' </a>('+value.pub_date+'):</li>' +
                '<li>'+value.com_text+'</li>' +
                '</ul>');
        }

    });


}

function js_mark_comment(comment,$offerId) {
    $('#comForOfferID'+comment['com_id']).fadeIn(300);
    $('#comForOfferID'+comment['com_id']).animate({ backgroundColor: "rgba( 200, 255, 219, 0.9 )"}, 500);
    $('#comForOfferID'+comment['com_id']).animate({ backgroundColor: "rgba( 0, 0, 0, 0 )"}, 500);
    top = $('#comForOfferID'+comment['com_id']).offset().top;
    //анимируем переход на расстояние - top за 1500 мс
    $('div.comments_list').delay(50).animate({scrollTop: top }, 1500);
}
