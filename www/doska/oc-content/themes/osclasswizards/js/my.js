function js_showOrHideChkbox($id)
{
    var chekbox = document.getElementById('chk'+$id+'');
    var elem = document.getElementById('el'+$id+'');
    $('input#'+chekbox.id).on('ifChecked', function(event){$('#'+elem.id).slideDown(300);});
    $('input#'+chekbox.id).on('ifUnchecked', function(event){$('#'+elem.id).slideUp(300);});
}

function js_showOrHideDiv($id) // появление информации в предложениях
{
    var chek = document.getElementById('chk'+$id+'');
    var elem = document.getElementById('el'+$id+'');
    $('#chk'+$id).on("click", function(event){$('#'+elem.id).slideDown(300); $('#chk'+$id).slideUp(0)});
    //$('#chk'+$id).on("click", function(event){$('#'+elem.id).slideUp(300);});
}

function js_showZakazchikField($id) // появление информации в предложениях
{
    var chek = document.getElementById('chk1');
    var elem = document.getElementById('el1');
    $('#chk1').on("click", function(event){$('#el3').slideUp(300);$('#el2').slideUp(300,function(){($('#'+elem.id).slideDown(300))})});
    
}
function js_showIspolnitelField($id) // появление информации в предложениях
{
    var chek = document.getElementById('chk2');
    var elem = document.getElementById('el2');
    $('#chk2').on("click", function(event){$('#el1').slideUp(300,function(){($('#el2').slideDown(300));$('#el3').slideDown(300)})});
    
}

$(document).ready(function(){
    $("#menu").on("click","a", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();

        //забираем идентификатор бока с атрибута href
        var id  = $(this).attr('href'),

        //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;

        //анимируем переход на расстояние - top за 1500 мс
        $("body").delay(100).animate({scrollTop: top -200}, 500);
    });
});
