<?
require "option.php";//файл с параметрами подключения к БД
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Лучшие сотрудники</title>
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
               <li class="current"><a href="#">Лучшие сотрудники</a></li>               
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
<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - July 28, 2014!</div>

  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h3>Наши лучшие преподаватели</h3>
      </div>
      <div class="grid_2">
        <img src="images/page2_img1.jpg" alt="" class="bord_img">
        <div class="text2"><a href="#">Анастасия Стоцкая</a></div>
        Физика
      </div>
      <div class="grid_2">
        <img src="images/page2_img2.jpg" alt="" class="bord_img">
        <div class="text2"><a href="#">Кирилл Левников</a></div>
        Экономика
      </div>
      <div class="grid_2">
        <img src="images/page2_img3.jpg" alt="" class="bord_img">
        <div class="text2"><a href="#">Маргарита Апраскина</a></div>
        Математика
      </div>
      <div class="grid_2">
        <img src="images/page2_img4.jpg" alt="" class="bord_img">
        <div class="text2"><a href="#">Александр Сергеев</a></div>
        Философия
      </div>
      <div class="grid_2">
        <img src="images/page2_img5.jpg" alt="" class="bord_img">
        <div class="text2"><a href="#">Андрей Семёнов</a></div>
        Английский язык
      </div>
      <div class="grid_2">
        <img src="images/page2_img6.jpg" alt="" class="bord_img">
        <div class="text2"><a href="#">Михаил Вашкевич</a></div>
        Экономика
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