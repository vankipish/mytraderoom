<?  
#	....................... ..........................................................
#
#		Скрипт:	SkyCom, версия: 1.0
#		Автор:	Sky (http://skystudio.ru http://skyscript.ru)
#
#	.................................................................................
session_start();
include ("skyComDB.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "">
<html xml:lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Пример подключения комментариев SkyCom</title>
<link rel="shortcut icon" href="pic/favicon.ico">
<link href="st.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.validationengine.js"></script>
<script type="text/javascript" src="scripts/skycom.js"></script>
</head>
<body>
<!--
#	....................... ..........................................................
#
#		Автор:	Sky (http://skystudio.ru http://skyscript.ru)
#
#	.................................................................................
-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="pic/skyscript_fon_verh.png">
  <tr>
    <td align="center">
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" background="pic/skyscript_fon_verh.png">
  <tr>
    <td width="275"><a href="http://www.skyscript.ru"><img title="Скачать бесплатные PHP скрипты — SkyScript" src="pic/skyscript_logo.png" width="275" height="100" border="0"></a></td>
    <td>&nbsp;</td>
    <td align="left"><span class="kr">Бесплатный Скрипт</span> Комментариев Sky<span class="kr">Com</span> ver 1.1</td>
    <td width="65" align="left">
    <a href="index.php"><img border="0" src="pic/home.png" width="35" height="22" alt="начало" /></a></td>
  </tr>
</table>
</td>
  </tr>
</table>
<!-- Верх -->
<div align="center">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6827403180602561";
/* В каталог */
google_ad_slot = "2443449188";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<!-- Основная таблица -->
<table width="884" border="0" cellspacing="3" cellpadding="0" align="center" style="margin-top:15px;">
  <tr>
    <td valign="top" width="240" style="padding-right:20px;"><p>Для работы скрипта необходимо передать любой идентификатор, который укажет какие комментарии брать и куда записывать новые.</p>
      <p>Комментарий от администратора подсвечивается другим фоном. (комментировать надо после входа в систему).</p>
      <p><br />
        <br />
        <br />
        <br />
    <a href="adm.php">Администрирование</a></p></td>
    <td valign="top">
<!-- Рабочий блок -->

<? $com='1'; //идентификатор $com=переменная; например id темы $com=$news_id; можно использовать лат. буквы например nov_11
include("skycom.php");  ?>
<!-- Завершение Рабочий блок -->   
    </td>
  </tr>
</table>
<!-- Завершение Основной таблицы -->
<!-- Низ
#	....................... ..........................................................
#
#		Автор:	Sky (http://skystudio.ru http://skyscript.ru)
#
#	.................................................................................
-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="pic/skyscript_fon_niz.png">
  <tr>
    <td align="center"><table width="950" height="68" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="33"></td>
        <td width="210" align="left"><div class="sm2">Бесплатные PHP-скрипты<br />
          <a href="http://www.skyscript.ru">2009&mdash;2011 SkyScript.ru</a></div></td>
        <td width="33">&nbsp;</td>
        <td align="left"><div class="sm2">Скрипт Комментарии <span class="kr">SkyCom</span> версия 1.1<br />
          Работает на PHP + MySQL </div></td>
        <td width="33"><a href="adm.php">Администрирование</a></td>
        <td align="right"><!--Rating@Mail.ru counter-->
          <script language="JavaScript" type="text/javascript"><!--
d=document;var a='';a+=';r='+escape(d.referrer);js=10;//--></script>
          <script language="JavaScript1.1" type="text/javascript"><!--
a+=';j='+navigator.javaEnabled();js=11;//--></script>
          <script language="JavaScript1.2" type="text/javascript"><!--
s=screen;a+=';s='+s.width+'*'+s.height;
a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth);js=12;//--></script>
          <script language="JavaScript1.3" type="text/javascript"><!--
js=13;//--></script>
          <script language="JavaScript" type="text/javascript"><!--
d.write('<a href="http://top.mail.ru/jump?from=1671954" target="_top">'+
'<img src="http://d3.c8.b9.a1.top.mail.ru/counter?id=1671954;t=84;js='+js+
a+';rand='+Math.random()+'" alt="Рейтинг@Mail.ru" border="0" '+
'height="18" width="88"><\/a>');if(11<js)d.write('<'+'!-- ');//--></script>
          <noscript>
            <a target="_top" href="http://top.mail.ru/jump?from=1671954"> 
            <img src="http://d3.c8.b9.a1.top.mail.ru/counter?js=na;id=1671954;t=84" 
height="18" width="88" border="0" alt="Рейтинг@Mail.ru" /></a>
            </noscript>
          <script language="JavaScript" type="text/javascript"><!--
if(11<js)d.write('--'+'>');//--></script>
          <!--// Rating@Mail.ru counter-->
          </td>
        <td width="33" align="right"></td>
      </tr>
    </table></td>
  </tr>
</table>
<!-- Низ -->
</body>
</html>