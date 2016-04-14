function js_showOrHide()
{
    var chekbox = document.getElementById('chk1');
    var elem = document.getElementById('el1');
    $('input#'+chekbox.id).on('ifChecked', function(event){$('#'+elem.id).slideDown(300);});
    $('input#'+chekbox.id).on('ifUnchecked', function(event){$('#'+elem.id).slideUp(300);});
}
