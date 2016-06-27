/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
    var request_type;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        request_type = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        request_type = new XMLHttpRequest();
    }
    return request_type;
}

function toggle(id)
{
    var e = document.getElementById(id);
    var dh = gh(id);
    var elems = e.getElementsByTagName('*');
    if (e.style.display == "none")
    {
        for(var i=0; i=0;i-=5)
        {
            (function()
                {

                    var pos=i;
                    setTimeout(function()
                    {
                        e.style.height = (pos/100)*dh+"px";
                        if (pos<=0)
                        {
                            e.style.display = "none";
                            e.style.height=lh;
                        }
                    },1000-(pos*5));
                }
            )();
        }
        return true;
    }
    return false;
}

function vhe(obj, vh){obj.style.visibility=vh;}

function gh(id)
{
    var e = document.getElementById(id);
    if(e.style.display == "none")
    {
        e.style.visibility = "hidden";
        e.style.display = "block";
        dh = e.clientHeight||e.offsetHeight+5; // Высота
        e.style.display = "none";
        e.style.visibility = "visible";
    }
    else
    {
        dh = e.clientHeight||e.offsetHeight+5; // Высота
    }
    return dh;
}
function clearText(field)
{
    if(field.defaultValue == field.value)field.value = '';else if(field.value == '')field.value = field.defaultValue;
}