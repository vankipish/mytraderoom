<? session_start();
#	....................... ..........................................................
#
#		������:	skycom, ������: 1.0
#		�����:	Sky (http://skystudio.ru http://skyscript.ru)
#
#	.................................................................................
include ("db.php"); 
unset($prava);

//�����
if (isset($_GET['logout']))
{	if (isset($_SESSION['ses_user'])) { unset($_SESSION['ses_user']); }
	if (isset($_SESSION['pass'])) { unset($_SESSION['pass']); }
	setcookie('user_id', '', 0, "/");
	setcookie('user_pass', '', 0, "/");
	header('Location: adm.php');
	exit;
}

//����
if (!empty($_POST) && $act=="login")
{	$user_email = (isset($_POST['user_email'])) ? mysql_real_escape_string($_POST['user_email']) : '';
	$user_email =  trim($user_email);
	$user_pass = (isset($_POST['user_pass'])) ? mysql_real_escape_string($_POST['user_pass']) : '';
	$skybaselogin = mysql_query("SELECT `user_sol` FROM `skyusers` WHERE `user_email`='{$user_email}' LIMIT 1",$db) or die(mysql_error());
	if (mysql_num_rows($skybaselogin) == 1)
	{
		$skyrowlogin = mysql_fetch_assoc($skybaselogin);
		$user_sol = $skyrowlogin['user_sol'];
		$user_pass = md5(md5($_POST['user_pass']) . $user_sol);
		$skybaselogin = mysql_query("SELECT `user_id`,`user_login`,`user_pass`,`user_prava` FROM `skyusers` 
									WHERE `user_email`='{$user_email}' 
						   			AND `user_pass`='{$user_pass}' LIMIT 1",$db) or die(mysql_error());
		if (mysql_num_rows($skybaselogin) == 1)
		{
			$skyrowlogin = mysql_fetch_assoc($skybaselogin);
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
		else { $oshibka = "������ ��� ������� ������������ ������ �� �����"; }
	}
	else { $oshibka = "������������ � ����� ����������� ������� �� ������"; }
}

//����, ���� ���������
if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_pass']))
	{	$_SESSION['ses_user'] = $_COOKIE['user_id'];
		$_SESSION['pass'] = $_COOKIE['user_pass'];
	}
	
//��������
if (isset($_SESSION['ses_user']) && isset($_SESSION['pass']))
	{
	$ses_user = (isset($_SESSION['ses_user'])) ? mysql_real_escape_string($_SESSION['ses_user']) : '';
	$pass = (isset($_SESSION['pass'])) ? mysql_real_escape_string($_SESSION['pass']) : '';
	$skybase = mysql_query("SELECT `user_id`,`user_login`,`user_pass`,`user_prava`,`user_email`
	FROM `skyusers` WHERE `user_pass`='{$pass}' AND `user_id`='{$ses_user}' LIMIT 1",$db) or die(mysql_error());
		if (mysql_num_rows($skybase) == 1)
		{	$skyrow = mysql_fetch_array($skybase);
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
<title>����������� � �����������������</title>
<link rel="shortcut icon" href="http://skyscript.ru/pic/skyico.ico">
<link href="st.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="scripts/jquery.js"></script>
<script src="scripts/jquery.validationengine.js" type="text/javascript"></script>
</head>
<body>
<!--
#	....................... ..........................................................
#
#		�����:	Sky (http://skystudio.ru http://skyscript.ru)
#
#	.................................................................................
-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="pic/skyscript_fon_verh.png">
  <tr>
    <td align="center">
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" background="pic/skyscript_fon_verh.png">
  <tr>
    <td width="275"><a href="http://www.skyscript.ru"><img title="������� ���������� PHP ������� � SkyScript" src="pic/skyscript_logo.png" width="275" height="100" border="0"></a></td>
    <td>&nbsp;</td>
    <td align="left"><span class="kr">���������� ������</span> ������� ��������������� Sky<span class="kr">Com</span> ver 1.0</td>
    <td width="65" align="left">
    <a href="index.php"><img border="0" src="pic/home.png" width="35" height="22" alt="������" /></a></td>
  </tr>
</table>
</td>
  </tr>
</table>
<!-- ���� -->
<div align="center">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6827403180602561";
/* � ������� */
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
<!-- ������� ����-->
<table style='margin-top:25px;' align='center' width='884' border='0' cellspacing='0' cellpadding='0'>
<tr>
    <td style='border-bottom:1px solid #cccccc;' valign='middle' align="left" height="37">
  
  	<!-- ������ -->
    
    <a href="?mod=nas"  class="nav">���������</a>
    <a href="index.php" target="_blank" class="nav">�� ����</a>
    
	<!-- ���������� ������ -->


    
    </td>
    <td align="right" style='border-bottom:1px solid #cccccc; padding-right:10px;'><span class="zag"><? echo $name; ?> </span></td>
    <td width="80" style='border-bottom:1px solid #cccccc;' align="right"><a class="nav" href="?logout" title="�����">�����</a>   
    </td>
</tr>
</table>
<!-- ���������� ������� ����-->

<?
if (isset($oshibka)) { echo '<br />'.$oshibka; }
if (isset($ok)) { echo '<br />'.$ok; }
?>

<!-- �������� ������� -->
<table width="884" border="0" cellspacing="3" cellpadding="0" align="center" style="margin-top:15px;">
  <tr>
  <td valign="top" width="260">

 </td>
    <td valign="top">
<!-- ������� ���� -->  

<?
//���������
if ($mod=='nas' || empty($mod))
	{
	//�����
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
				$newpass=",`user_pass`='{$code_pass}',`user_sol`='{$user_sol}'";
				$_SESSION['pass'] = $code_pass;
		}
	else { $newpass=""; }
	$user_email = globper('user_email'); 
	if (empty($user_email)) { al("����������� ������� ����� ����������� �����"); }
	else
		{ 
	$skybase = mysql_query("UPDATE `skyusers` SET `user_email`='{$user_email}'".$newpass." WHERE `user_id`='{$_SESSION['ses_user']}'",$db) or die(mysql_error());
		echo '<div class="ok">��������� �������</div>'; 
		}
	}
	
	//�����������
	if ($act == "rednascom")
	{
		$com_width = globper('com_width'); $com_dlina = globper('com_dlina'); $com_str = globper('com_str'); 
		if (empty($com_width) || empty($com_dlina) || empty($com_str)) { al("����������� ������� ��� ��������"); }
		else {
			$skybasenastr = mysql_query("SELECT `nas_par`,`nas_znach` FROM `skynas`",$db) or die(mysql_error());
			$skyrownastr = mysql_fetch_array($skybasenastr);
			
			do {
				if (!empty($$skyrownastr['nas_par']))
				{ $skybase = mysql_query("UPDATE `skynas` SET `nas_znach`='{$$skyrownastr['nas_par']}'
			WHERE `nas_par`='{$skyrownastr['nas_par']}'",$db) or die(mysql_error()); }
				}
			while ($skyrownastr = mysql_fetch_array($skybasenastr));
			echo '<div class="ok">��������� �������</div>';
			}
	}
	
	
	
	echo'<div class="zag" style="margin:0 0 5px 0;">���������</div>';

	$skybase = mysql_query("SELECT `user_email`
	FROM `skyusers` WHERE `user_id`='{$_SESSION['ses_user']}' LIMIT 1",$db) or die(mysql_error());
	$skyrow = mysql_fetch_array($skybase); ?>
    
<fieldset class="nas">
<legend class="ser"> ����� ��������� </legend>
<form action="adm.php" method="post">
<table border="0" width="100%" class="tbl" cellpadding="4" cellspacing="0">
<tr><td width="150">E-mail ��� �����<br />
<span class="sm2">�� �� ���������</span></td><td><input  class="validate[required,length[0,200]] text-input" style="width:500px" name="user_email" value="<? echo $skyrow['user_email'] ?>" type="text" /></td><td width="100"></td></tr>
<tr><td>������<br />
<span class="sm2">������ ������ � ��������</span></td><td><input style="width:500px" name="user_pass" type="text" /></td><td width="100">
<input type="hidden" name="mod" value="nas" />
<input type="hidden" name="act" value="rednas" />
<input style="width:100px; cursor:pointer;" type="submit" value="��������" /></td></tr>
</table></form>
</fieldset> 


<fieldset class="nas">
<legend class="ser"> ����������� </legend>
<form action="adm.php" method="post">
<table border="0" width="100%" class="tbl" cellpadding="4" cellspacing="0">

<tr><td width="150">������ �����������<br /><span class="sm2">��������� � ��������</span></td><td>
<input  class="validate[required,length[0,5]] text-input" style="width:500px" name="com_width" value="<? echo $com_width; ?>" type="text" /></td><td width="100">
</td></tr>

<tr><td width="150">������������ �����<br /><span class="sm2">���������� ��������</span></td><td>
<input  class="validate[required,length[0,7]] text-input" style="width:500px" name="com_dlina" value="<? echo $com_dlina; ?>" type="text" /></td><td width="100">
</td></tr>

<tr><td width="150">������������ �� ���<br /><span class="sm2">�������� (1-�� ������)</span></td><td>
<input  class="validate[required,length[0,3]] text-input" style="width:500px" name="com_str" value="<? echo $com_str; ?>" type="text" /></td><td width="100">
<input type="hidden" name="mod" value="nas" />
<input type="hidden" name="act" value="rednascom" /> 
<input style="width:100px; cursor:pointer;" name="" type="submit" value="��������" />
</td></tr>

</table></form>
</fieldset> 


<? } ?>

<!-- ���������� ������� ���� -->   
    </td>
  </tr>
</table>
<!-- ���������� �������� ������� -->

<? } else { ?>
<center>
<? if(isset($oshibka)) { echo '<center><div class="alert">'.$oshibka.'</div></center>'; } ?>
<div>
<form action="adm.php" method="post">
	<table border="0" style="margin-left:15px; margin:20px 0 50px 0;" cellpadding="4">
		<tr>
			<td align="right" width="100">����� (e-mail)</td>
			<td height="35" style="padding-left:15px;">
            <input class="validate[required,length[0,200]] text-input" title="������� �����" name="user_email" type="text" size="23" /></td>
		</tr>
		<tr>
			<td align="right">������</td>
			<td height="35" style="padding-left:15px;">
            <input class="validate[required,length[0,200]] text-input" name="user_pass" type="password" size="23" />
            </td>
		</tr>
		<tr>
			<td align="right">���������</td>
			<td height="35" style="padding-left:15px;">
            <input type="checkbox" name="zapomnit" />
            <input type="hidden" name="act" value="login">
            <input class="menuinp" style="width:100px; margin-left:53px; cursor:pointer;" type="submit" value="�����" />
			</td>
		</tr>
	</table> 
</form>  
<span class="sm2">�� ���������: �����: email@email.ru  ������: 12345</span><br />
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
//	echo '<br /> ����: '.$user_sol;
//	echo '<br /> ������: '.$newpass;
//	echo '<br /> ���: '.$code_pass;
?> 
</center>
<? } ?>

<!-- ���
#	....................... ..........................................................
#
#		�����:	Sky (http://skystudio.ru http://skyscript.ru)
#
#	.................................................................................
-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="pic/skyscript_fon_niz.png">
  <tr>
    <td align="center"><table width="950" height="68" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="33"></td>
        <td width="210" align="left"><div class="sm2">���������� PHP-�������<br />
          <a href="http://www.skyscript.ru">2009&mdash;2011 SkyScript.ru</a></div></td>
        <td width="33">&nbsp;</td>
        <td align="left"><div class="sm2">������ ����������� <span class="kr">SkyCom</span> ������ 1.0<br />
          �������� �� PHP + MySQL </div></td>
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
a+';rand='+Math.random()+'" alt="�������@Mail.ru" border="0" '+
'height="18" width="88"><\/a>');if(11<js)d.write('<'+'!-- ');//--></script>
          <noscript>
            <a target="_top" href="http://top.mail.ru/jump?from=1671954"> 
            <img src="http://d3.c8.b9.a1.top.mail.ru/counter?js=na;id=1671954;t=84" 
height="18" width="88" border="0" alt="�������@Mail.ru" /></a>
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
<!-- ��� -->
</body>
</html>