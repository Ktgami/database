<?
require "option.php";//файл с параметрами подключения к БД
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>О сайте</title>
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
               <li class="current"><a href="about.php">О сайте</a></li>
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
</header>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - July 28, 2014!</div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h3>О сайте</h3>
        <img src="images/page2_img.jpg" alt="" class="img_inner fleft">
        <div class="extra_wrapper" align="justify">
          <p>На web-портале ведутся списки преподавателей и перечни читаемых ими предметов. Каждый преподаватель может читать несколько предметов, а один предмет может читаться только одним преподавателем. Есть возможность хранить и распечатывать анкетные данные о преподавателях. Также есть возможность формировать учебный план для преподавателей, который после этого доступен для просмотра и экспорта в Excel.  </p>
<p class="fwn">&nbsp;</p>
        
        </div>
      </div>
    </div>
  </div>
  <article class="content_gray offset__1">
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h3>Функционал web-портала</h3>
        </div>
        <div class="grid_4">
          <div class="block-3">
            <div class="count">1</div>
            <div class="extra_wrapper">
              <div class="text1"><a href="#">Режим администратора</a></div>
             В режиме администратора web-портал обеспечивает работу с пользователями системы (распределение прав), учебным планом и справочниками базы данных 
            </div>
          </div>
        </div>
        <div class="grid_4">
          <div class="block-3">
            <div class="count">2</div>
            <div class="extra_wrapper">
              <div class="text1"><a href="#">Режим преподавателя</a></div>
             В режиме преподавателя web-портал обеспечивает работу со своими анкетными данными и карточкой занятий
            </div>
          </div>
        </div>
        <div class="grid_4">
          <div class="block-3">
            <div class="count">3</div>
            <div class="extra_wrapper">
              <div class="text1"><a href="#">Формирование отчетов</a></div>
			Web-портал обеспечивает формирование отчетов (экспорт в Excel) и фильтр данных
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>

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