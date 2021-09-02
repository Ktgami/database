<?
require "option.php";//файл с параметрами подключения к БД
require 'rb.php';


$step=$_REQUEST["step"];
if ($step==2)//выход
{
	
setcookie ( 'mode', ""); 
 
setcookie ('iduser', "NULL"); ;  
setcookie ('fio', "");   
  

$mode="";
$step=0;
}
R::setup( 'mysql:host=127.0.0.1', 'root', '' );


$plan = R::dispense('subject');

 $plan->idsubject = "18";
 
 $plan->subject = "MAth";
 
 $plan->idform = "1";
 
R::store($plan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>"Учебный план"</title>
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<meta name="format-detection" content="telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
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
<body class="page1" id="top">
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
               <li class="current"><a href="index.php">Главная</a></li>
               <li><a href="about.php">О сайте</a></li>
               <li><a href="contacts.php">Контакты</a></li>

             
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
  <section class="page1_header">
    <div class="container">
      <div class="row">
        <div class="grid_4">
        

<?

if ($mode=="Администратор") 
{
?>     
      
          <a href="user.php" class="banner "><div class="maxheight">
            <div class=" fa fa-users"></div>Пользователи</div>
          </a>  
            
          <a href="faculty.php" class="banner "><div class="maxheight">
            <div class=" fa fa-calendar"></div>Справочники</div>
          </a>  
          <a href="reportadmin.php" class="banner "><div class="maxheight">
            <div class="fa fa-pencil "></div>Карточка нагрузки</div>
          </a>                                          
          <a href="performanceadmin.php" class="banner "><div class="maxheight">
            <div class="fa fa-briefcase"></div>Учебный план</div>
          </a>  
<?
}
?>   

<?
if ($mode=="Преподаватель") 
{
?>          
 
          <a href="performanceuser.php" class="banner "><div class="maxheight">
            <div class="fa fa-briefcase"></div>Учебный план</div>
          </a>                
          <a href="reportuser.php" class="banner "><div class="maxheight">
            <div class="fa fa-pencil "></div>Карточка нагрузки</div>
          </a>   
          <a href="usersubject.php" class="banner "><div class="maxheight">
            <div class="fa fa-book "></div>Предметы</div>
          </a>      
<?
}
?>            
        
<?
if ($mode=="")
{
?>           

<?
}
?>    
 

<?
if ($mode=="")
{
?>         
          <a href="auth.php" class="banner "><div class="maxheight1">
            <div class="fa fa-user"></div>Авторизация</div>
          </a>
<?
}
else
{
?>                   

          <a href="index.php?step=2" class="banner "><div class="maxheight1">
            <div class=" fa  fa-backward"></div>Выход</div>
          </a>
<?
}
?>
        </div>
        <div class="grid_5">
        <br>
          <h2> </h2>
          <table>
            <tbody>
              <tr>
                <td>                  "Учебный план" <br><br><br><br><br></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</header>
<div class="block-1">
  <div class="container">
    <div class="row">
      <div class="grid_3">
        <div ></div>

      </div>
      <div class="grid_3">
        <div></div>
      </div>
      <div class="grid_3">
        <div></div>
      </div>

    </div>
  </div>
</div>

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