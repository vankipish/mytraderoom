<? session_start();
#	....................... ..........................................................
#
#		Скрипт:	skycom, версия: 1.0
#		Автор:	Sky (http://skystudio.ru http://skyscript.ru)
#		Адаптация для OSC: Vankipish	
#	.................................................................................
include ("skyComDB.php"); 
unset($prava);

//выход
if (isset($_GET['logout']))
{	if (isset($_SESSION['ses_user'])) { unset($_SESSION['ses_user']); }
	if (isset($_SESSION['pass'])) { unset($_SESSION['pass']); }
	setcookie('user_id', '', 0, "/");
	setcookie('user_pass', '', 0, "/");
	header('Location: adm.php');
	exit;
}

//вход
if (!empty($_POST) && $act=="login")
{	$user_email = (isset($_POST['user_email'])) ? osc_escape_string($_POST['user_email']) : '';
	$user_email =  trim($user_email);
	$user_pass = (isset($_POST['user_pass'])) ? osc_escape_string($_POST['user_pass']) : '';

	$skyComNI ->dao->select('user_sol');
	$skyComNI->dao->from('skyusers');
	$skyComNI->dao->where('user_email', $user_email);
	$skybaselogin = $skyComNI->dao->get();
	
	if (mysql_num_rows($skybaselogin) == 1)
	{
		$skyrowlogin = db2_fetch_assoc($skybaselogin);
		$user_sol = $skyrowlogin['user_sol'];
		$user_pass = md5(md5($_POST['user_pass']) . $user_sol);

		$skyComNI ->dao->select('user_id','user_login','user_pass','user_prava');
		$skyComNI->dao->from('skyusers');
		$conditions = array('user_email'  => $user_email,
							'user_pass'   => $user_pass);
		$skyComNI->dao->where($conditions);
		$skybaselogin = $skyComNI->dao->get();

		if (mysql_num_rows($skybaselogin) == 1)
		{
			$skyrowlogin = db2_fetch_assoc($skybaselogin);
			$_SESSION['ses_user'] = $skyrowlogin['user_id'];
			$_SESSION['pass'] = $skyrowlogin['user_pass'];
			$name =  $skyrowlogin['user_login'];
			$prava = $skyrowlogin['user_prava'];
			if (isset($_POST['zapomnit']))
			{	$time = 12960000;
				setcookie('user_id', $skyrowlogin['user_id'], time()+$time, "/");
				setcookie('user_pass', $user_pass, time()+$time, "/");
			}
		if (isset ($cat_id) && !empty($cat_id)) {$act = "cat";}
		else {unset($act);}
		if (isset ($acton) && !empty($acton)) {$act = "pod";}
		}
		else { $oshibka = "Пароль для данного электронного адреса не верен"; }
	}
	else { $oshibka = "Пользователь с таким электронным адресом не найден"; }
}

//вход, если запомнили
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_pass']))
	{	$_SESSION['ses_user'] = $_COOKIE['user_id'];
		$_SESSION['pass'] = $_COOKIE['user_pass'];
	}
	
//проверка
if (isset($_SESSION['ses_user']) && isset($_SESSION['pass']))
	{
	$ses_user = (isset($_SESSION['ses_user'])) ? osc_escape_string($_SESSION['ses_user']) : '';
	$pass = (isset($_SESSION['pass'])) ? osc_escape_string($_SESSION['pass']) : '';

		$skyComNI ->dao->select('`user_id`,`user_login`,`user_pass`,`user_prava`,`user_email`');
		$skyComNI->dao->from('skyusers');
		$conditions = array('user_pass'  => $pass,
							'user_id'   => $ses_user);
		$skyComNI->dao->where($conditions);
		$skybase = $skyComNI->dao->get();

		if (mysql_num_rows($skybase) == 1)
		{	$skyrow = db2_fetch_array($skybase);
			$prava = $skyrow['user_prava'];
			$name =  $skyrow['user_login'];
			$user_email = $skyrow['user_email'];
		}
		else 
		{ 	$prava = 0;
			if (isset($_SESSION['ses_user'])) { unset($_SESSION['ses_user']); }
			if (isset($_SESSION['pass'])) { unset($_SESSION['pass']); }
			setcookie('user_id', '', 0, "/");
			setcookie('user_pass', '', 0, "/");
			header('Location: adm.php');
			exit(); 
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "">
<html xml:lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Комментарии — Администрирование</title>
<link rel="shortcut icon" href="http://skyscript.ru/pic/skyico.ico">
<link href="st.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="scripts/jquery.js"></script>
<script src="scripts/jquery.validationengine.js" type="text/javascript"></script>
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
    <td align="left"><span class="kr">Бесплатный Скрипт</span> Системы комментирования Sky<span class="kr">Com</span> ver 1.0</td>
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
<? if ($prava==5) { ?>
<!-- Верхнее меню-->
<table style='margin-top:25px;' align='center' width='884' border='0' cellspacing='0' cellpadding='0'>
<tr>
    <td style='border-bottom:1px solid #cccccc;' valign='middle' align="left" height="37">
  
  	<!-- КНОПКИ -->
    
    <a href="?mod=nas"  class="nav">настройки</a>
    <a href="index.php" target="_blank" class="nav">на сайт</a>
    
	<!-- Завершение КНОПКИ -->


    
    </td>
    <td align="right" style='border-bottom:1px solid #cccccc; padding-right:10px;'><span class="zag"><? echo $name; ?> </span></td>
    <td width="80" style='border-bottom:1px solid #cccccc;' align="right"><a class="nav" href="?logout" title="Выйти">выйти</a>   
    </td>
</tr>
</table>
<!-- Завершение Верхнее меню-->

<?
if (isset($oshibka)) { echo '<br />'.$oshibka; }
if (isset($ok)) { echo '<br />'.$ok; }
?>

<!-- Основная таблица -->
<table width="884" border="0" cellspacing="3" cellpadding="0" align="center" style="margin-top:15px;">
  <tr>
  <td valign="top" width="260">

 </td>
    <td valign="top">
<!-- Рабочий блок -->  

<?
//настройки
if ($mod=='nas' || empty($mod))
	{
	//общие
	if ($act == "rednas")
	{
	if (isset($_POST['user_pass']) && !empty($_POST['user_pass'])) 
	{ $user_pass = globper('user_pass'); 
				function usersol($n=3)
				{	$key = '';
					$pattern = '1234567890abcdefghijklmnopqrstuvwxyz.,*_-=+';
					$counter = strlen($pattern)-1;
					for($i=0; $i<$n; $i++)
					{ $key .= $pattern{rand(0,$counter)}; }
					return $key;
				}
				$user_sol = usersol();
				$newpass = $user_pass;
				$code_pass = md5(md5($newpass) . $user_sol);
				$newpass=",'user_pass'='{$code_pass}','user_sol'='{$user_sol}'";
				$_SESSION['pass'] = $code_pass;
		}
	else { $newpass=""; }
	$user_email = globper('user_email'); 
	if (empty($user_email)) { al("обязательно введите адрес электронной почты"); }
	else
		{
			$aSkyCom = array('user_email'=> $user_email,
							 'user_pass'=> $code_pass,
							 'user_sol'=>$user_sol
				);
			$skyComNI -> update($aSkyCom,array('user_id' =>$_SESSION['ses_user']));
			echo '<div class="ok">изменения внесены</div>';
		}
	}
	
	//комментарии
	if ($act == "rednascom")
	{
		$com_width = globper('com_width'); $com_dlina = globper('com_dlina'); $com_str = globper('com_str'); 
		if (empty($com_width) || empty($com_dlina) || empty($com_str)) { al("обязательно введите все значения"); }
		else {

			$skyComNI ->dao->select('`nas_par`,`nas_znach`');
			$skyComNI->dao->from('skynas');
			$skybasenastr = $skyComNI->dao->get();
			$skyrownastr = db2_fetch_array($skybasenastr);
						
			do {
				if (!empty($$skyrownastr['nas_par']))
					{
					$aSkyCom = array('nas_znach'=> $$skyrownastr['nas_par']);
					$conditions = array('nas_par'  => $skyrownastr['nas_par']);
					$skyComNI->dao->from('skynas');
					$skyComNI->dao->set($aSkyCom);
					$skyComNI->dao->where($conditions);
					$skybase = $skyComNI->dao->update();
					}
				}
			while ($skyrownastr = db2_fetch_array($skybasenastr));
			echo '<div class="ok">изменения внесены</div>';
			}
	}
	
	
	
	echo'<div class="zag" style="margin:0 0 5px 0;">Настройки</div>';

		$conditions = array('user_id'  => $_SESSION['ses_user']);
		$skyComNI ->dao->select('user_email');
		$skyComNI->dao->from('skyusers');
		$skyComNI->dao->where($conditions);
		$skybase = $skyComNI->dao->get();
		$skyrow = db2_fetch_array($skybase);
	 ?>
    
<fieldset class="nas">
<legend class="ser"> Общие настройки </legend>
<form action="adm.php" method="post">
<table border="0" width="100%" class="tbl" cellpadding="4" cellspacing="0">
<tr><td width="150">E-mail для входа<br />
<span class="sm2">он же системный</span></td><td><input  class="validate[required,length[0,200]] text-input" style="width:500px" name="user_email" value="<? echo $skyrow['user_email'] ?>" type="text" /></td><td width="100"></td></tr>
<tr><td>Пароль<br />
<span class="sm2">можете ввести и поменять</span></td><td><input style="width:500px" name="user_pass" type="text" /></td><td width="100">
<input type="hidden" name="mod" value="nas" />
<input type="hidden" name="act" value="rednas" />
<input style="width:100px; cursor:pointer;" type="submit" value="Изменить" /></td></tr>
</table></form>
</fieldset> 


<fieldset class="nas">
<legend class="ser"> Комментарии </legend>
<form action="adm.php" method="post">
<table border="0" width="100%" class="tbl" cellpadding="4" cellspacing="0">

<tr><td width="150">Ширина комментария<br /><span class="sm2">начальная в пикселях</span></td><td>
<input  class="validate[required,length[0,5]] text-input" style="width:500px" name="com_width" value="<? echo $com_width; ?>" type="text" /></td><td width="100">
</td></tr>

<tr><td width="150">Максимальная длина<br /><span class="sm2">количество символов</span></td><td>
<input  class="validate[required,length[0,7]] text-input" style="width:500px" name="com_dlina" value="<? echo $com_dlina; ?>" type="text" /></td><td width="100">
</td></tr>

<tr><td width="150">Комментариев на стр<br /><span class="sm2">основных (1-го уровня)</span></td><td>
<input  class="validate[required,length[0,3]] text-input" style="width:500px" name="com_str" value="<? echo $com_str; ?>" type="text" /></td><td width="100">
<input type="hidden" name="mod" value="nas" />
<input type="hidden" name="act" value="rednascom" /> 
<input style="width:100px; cursor:pointer;" name="" type="submit" value="Изменить" />
</td></tr>

</table></form>
</fieldset> 


<? } ?>

<!-- Завершение Рабочий блок -->   
    </td>
  </tr>
</table>
<!-- Завершение Основной таблицы -->

<? } else { ?>
<center>
<? if(isset($oshibka)) { echo '<center><div class="alert">'.$oshibka.'</div></center>'; } ?>
<div>
<form action="adm.php" method="post">
	<table border="0" style="margin-left:15px; margin:20px 0 50px 0;" cellpadding="4">
		<tr>
			<td align="right" width="100">Логин (e-mail)</td>
			<td height="35" style="padding-left:15px;">
            <input class="validate[required,length[0,200]] text-input" title="Введите логин" name="user_email" type="text" size="23" /></td>
		</tr>
		<tr>
			<td align="right">Пароль</td>
			<td height="35" style="padding-left:15px;">
            <input class="validate[required,length[0,200]] text-input" name="user_pass" type="password" size="23" />
            </td>
		</tr>
		<tr>
			<td align="right">Запомнить</td>
			<td height="35" style="padding-left:15px;">
            <input type="checkbox" name="zapomnit" />
            <input type="hidden" name="act" value="login">
            <input class="menuinp" style="width:100px; margin-left:53px; cursor:pointer;" type="submit" value="Войти" />
			</td>
		</tr>
	</table> 
</form>  
<span class="sm2">По умолчанию: Логин: email@email.ru  Пароль: 12345</span><br />
<br />
<br />
<br />
</div>
<?
//	function usersol($n=3)
//	{	$key = '';
//		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz.,*_-=+';
//		$counter = strlen($pattern)-1;
//		for($i=0; $i<$n; $i++)
//		{ $key .= $pattern{rand(0,$counter)}; }
//		return $key;
//	}
//	$user_sol = usersol();
//	$newpass = usersol(7);
//	$code_pass = md5(md5($newpass) . $user_sol);
//	echo '<br /> Соль: '.$user_sol;
//	echo '<br /> Пароль: '.$newpass;
//	echo '<br /> Код: '.$code_pass;
?> 
</center>
<? } ?>

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
        <td align="left"><div class="sm2">Скрипт Комментарии <span class="kr">SkyCom</span> версия 1.0<br />
          Работает на PHP + MySQL </div></td>
        <td width="33">&nbsp;</td>
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