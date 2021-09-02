<?
require "option.php";//файл с параметрами подключения к БД
 

$step=$_REQUEST["step"];
 

if ($step==2)
{
$upd=$_REQUEST["upd"];
$id=$_REQUEST["id"];


$plan = $_POST["plan"];
$iduser =  $_POST["iduser"];




	if ($plan<=0) 
	{
	?>
		<script language="javascript">
		alert("Не верный ввод!");
		history.back();
		</script>

	<?
		exit();
	}	
 


	{
	 mysql_query("UPDATE plan SET    iduser=$iduser,  plan=$plan where idplan=$id");		
	}



?>
 <script language="javascript">
 location.href='performanceadmin.php';
 </script>
<?


 
}



$step=$_REQUEST["step"];
$upd=$_REQUEST["upd"];

?>
<!DOCTYPE html>

<head>
<title>Учебный план</title>
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

               <li class="current"><a href="performanceadmin.php">Учебный план</a></li>
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

<?

date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");   
?>

<?
if ($upd==1)
{
$Arr=$_REQUEST["Arrplan"];
$r=mysql_query("SELECT  plan.idsubject, subject, category, plan FROM  subject,  category, plan where plan.idsubject=subject.idsubject and plan.idcategory=category.idcategory and idplan="."$Arr[0]");
$f=mysql_fetch_array($r);//считывание текующей записи
}
else
{
$Arr=$_REQUEST["Arr"];	
}
date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");  ?>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12">

        <h4>Редактирование плана (<? echo $f[subject]. ", ". $f[category]; ?>)  </h4>
     
      </div>

      <div  class="grid_12">

<form name="form2" method="post"  enctype="multipart/form-data" >
				  <table border="0" align="">
                                  
       
                     			
                                                          	 
<tr> 
 <td><font color="#000000" >   Преподаватель: </font></td>
        <td ><select name="iduser"  style="height:22; width:auto" >
  <?

$d=mysql_query( "select * from user, usersubject where user.iduser=usersubject.iduser and usersubject.idsubject=".$f["idsubject"]);
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["iduser"];
	if ($m["iduser"]==$f["iduser"])
	 echo " selected=selected";
	echo ">".$m["user"];
	echo "</option>";	 		
  }
  
?>
					  
          </select></td>
                    </tr>
                    
   
                            <tr>
                      <td><font color="#000000" >  Часы: </font> </td>
                      <td><input   name="plan"   type="text"  value="<? echo "$f[plan]";?>" size="10" ></td>
                    </tr>   
                                                                                 
                  </table>
				<br>
				<input  type="button"  name="button"   onclick="this.form.action='updperformance.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="OK" width="500">
				<input  type="button"  name="button"  onClick="javascript:history.back();"  value="Отмена">

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

