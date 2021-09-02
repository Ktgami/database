<?
require "option.php";//файл с параметрами подключения к БД
$step=$_REQUEST["step"];

if ($step==1)
{

$login =  $_POST["login"];
$parol =  $_POST["parol"];


$SET_user=mysql_query("select * from user where login='$login' and parol='$parol'");
$COUNT_user=mysql_num_rows($SET_user);

//echo "select * from user where login='$login' and parol='$parol'";

if  ($COUNT_user==0)
{
?>
<script language="javascript">
alert("Не верный ввод!");
history.back();
</script>
<?
exit();
} 



if ($COUNT_user>0)
{
		$f=mysql_fetch_array($SET_user);//считывание текующей записи
		$iduser=$f["iduser"];
		setcookie ( 'iduser', $iduser); 
		$fio=$f["user"];
		setcookie ( 'fio', $fio); 
		$mode=$f["permission"];	
		setcookie ( 'mode', $mode); 

		setcookie ('idagreement', "NULL");   

}

?>

	 <script language="javascript">
 	location.href='index.php';
	 </script>
<?



 
}



?>
<!DOCTYPE html>

<head>
<title>Авторизация</title>
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<meta name="format-detection" content="telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/TMForm.js"></script>
<script src="js/modal.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});  
 }); 
</script>
<!--[if lt IE 8]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<![endif]-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<!--==============================
              header
=================================-->
<header>
  <div class="container">
    <div class="row">
      <div class="grid_12 rel">
        <h1>
          <a href="index.php">
            <img src="images/logo.png" alt="Logo alt">
          </a>
        </h1>
      </div>
    </div>
  </div>
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container">
      <div class="row">
        <div class="grid_12 ">
          <div class="navigation ">
            <nav>
              <ul class="sf-menu">
               <li><a href="index.php">Главная</a></li>
               <li><a href="about.php">О сайте</a></li>
               <li><a href="contacts.php">Контакты</a></li>
               <li class="current"><a href="#">Авторизация</a></li>
<?
if ($mode!="")
{
?> 
               <li><a href="profile.php?step=1"><? echo "$fio ($mode)";?> </a></li>
<?
}
?>
             
             </ul>
            </nav>
            <div class="clear"></div>
          </div>       
         <div class="clear"></div>  
        </div>
     </div> 
    </div> 
  </section>
</header>



<!--=====================
          Content
======================-->
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12">

        <h3>Авторизация</h3>   
         
      </div>
 
      <div  class="grid_12">


	<form name="form2" onaction="this.form.action='default.php?step=1'" method="post"  >		
							<table align="center">				
							<tr>
							<td>
							Авторизация:
							</td>
                                                        </tr>							
                                                        <tr>
							<td>
							Логин:
							</td>
                                                        </tr>
                            <tr>
							<td>
<input    name="login"   value=""  type="text" >
							</td>
							</tr>
							
							<tr>
							<td>
							Пароль:
							</td>
                            </tr>
                            <tr>
							<td>
<input    name="parol"    value=""  type="password" >							
							</td>
							</tr>	
	<tr>
		<td align="right"><input  name="button"  type="button"   onClick="this.form.action='auth.php?step=1'; this.form.submit();" value="Вход" width="600">
		  <br>
</td>    
					</tr>
							</table>
</form>	

      </div>
    </div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<footer id="footer">
  <div class="container" align="center">
    <div class="row">
      <div class="grid_12"> 
        <div class="copyright"><a href="#">Все права защищены</a>
        </div>
    </div>
  </div>  
  </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>


