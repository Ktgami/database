<?
require "option.php";//файл с параметрами подключения к БД


$step=$_REQUEST["step"];


if ($step==2)
{

$id=$_REQUEST["id"];


$user =  $_POST["user"];
$post =  $_POST["post"];
$degree =  $_POST["degree"];
$experience =  $_POST["experience"];
$datebirth =  $_POST["datebirth"];
$address =  $_POST["address"];
$family =  $_POST["family"];
$phone =  $_POST["phone"];
$mail =  $_POST["mail"];


$idchair =  $_POST["idchair"];

if ( ($user=="") or ($phone=="")or ($post=="") ) 
{
?>

	 <script language="javascript">
	 alert ('Введите обязательные для ввода даннные!');
 	 history.back();
	 </script>
<?
}



  	 

	
	 mysql_query("UPDATE user SET  idchair =  $idchair, post='$post', degree='$degree', experience='$experience', user='$user', datebirth='$datebirth',address='$address',family='$family',mail='$mail', phone='$phone' where iduser=$id");		


	 
if ($mode=="Администратор") 
{
 
?>

 <script language="javascript">
 location.href='user.php';
 </script>
<?
}

 
}

?>
<!DOCTYPE html>

<head>
<title>Профиль пользователя</title>
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
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outlogind browser. For a faster, safer browsing experience, upgrade for free today." />
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


<?
if ($mode=="Администратор")
{
?> 
               <li ><a href="user.php">Пользователи</a></li>
<?


?>
               <li class="current"><a  href="#">Профиль</a></li>
<?
}
if ($mode!="")
{
?> 
               <li ><a href="profile.php?step=1"><? echo "$fio ($mode)";?> </a></li>
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
$step=$_REQUEST["step"];




if (isset ($_REQUEST['Arr']))
{
	$Arr=$_REQUEST["Arr"];
	$iduser=$Arr[0];
}
if (isset ($_REQUEST['iduser']))
{
	$iduser=$_REQUEST['iduser'];
}


	
$r=mysql_query("SELECT * FROM user where iduser="."$iduser");
$f=mysql_fetch_array($r);//считывание текующей записи



  ?>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
  
        <h3>Профиль пользователя</h3>   
 
     
      </div>
 
      <div  class="grid_12">

<form name="form2" method="post"  enctype="multipart/form-data" >
				  <table  border="0" align="">
                                   
                    <tr>
                      <td ><font color="#000000" >   ФИО: </font> </td>
                      <td><input   name="user"   type="text"  value="<? echo "$f[user]";  ?>" size="40" ></td>                     
                      <td rowspan="10"><img   width="220" height="220" src="upload/<? echo "$f[file]";?>"></td>                      
                      <td rowspan="2"> 

                      <input  type="button"  name="button"   onclick="this.form.action='changefile.php?step=1&iduser=<? echo"$iduser";?>'; this.form.submit();"   value="Загрузить фото" width="500">
                      <input  type="button"  name="button"   onclick="this.form.action='expprofile.php?iduser=<? echo"$iduser";?>&fio=<? echo"$f[user]";?>'; this.form.submit();"   value="Печать анкеты" width="500">                
                      </td>                                            
                    </tr>
                      
<tr> 
 <td><font color="#000000" >   Кафедра: </font></td>
 <td ><select name="idchair"  style="height:22; width:auto" >
   <?

$d=mysql_query( "select * from chair");
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idchair"];
	if ($m["idchair"]==$f["idchair"])
	 echo " selected=selected";
	echo ">".$m["chair"];
	echo "</option>";	 		
  }
  
?>
   
 </select></td>
                    </tr>  
                    
                                        
                      <tr>
                      <td><font color="#000000" > Степень: </font> </td>
                      <td><input   name="degree"  value="<? echo "$f[degree]";  ?>"   type="text" size="40"></td>
                    </tr>                     	                                                                 
                    <tr>
                      <td><font color="#000000" > Должность: </font> </td>
                      <td><input   name="post"  value="<? echo "$f[post]";  ?>"   type="text" size="40"></td>
                    </tr> 
                      <tr>
                      <td><font color="#000000" > Стаж: </font> </td>
                      <td><input   name="experience"  value="<? echo "$f[experience]";  ?>"   type="text" size="40"></td>
                    </tr>                       
                    
                  

                    
                      	<tr>
                      <td><font color="#000000" > Дата рождения: </font> </td>
                      <td><input   name="datebirth"  value="<? echo "$f[datebirth]";  ?>"   type="text" size="8"></td>
                    </tr>                 

                      	<tr>
                      <td><font color="#000000" > Место жительства: </font> </td>
                      <td><input   name="address"  value="<? echo "$f[address]";  ?>"   type="text" size="40"></td>
                    </tr> 
                         	<tr>
                      <td><font color="#000000" > Семейное положение: </font> </td>
                      <td><input   name="family"  value="<? echo "$f[family]";  ?>"   type="text" size="40"></td>
                    </tr>                    
                              	<tr>
                      <td><font color="#000000" > Телефон: </font> </td>
                      <td><input   name="phone"  value="<? echo "$f[phone]";  ?>"   type="text" size="40"></td>
                    </tr>   
                              	<tr>
                      <td><font color="#000000" > Почта: </font> </td>
                      <td><input   name="mail"  value="<? echo "$f[mail]";  ?>"   type="text" size="40"></td>
                    </tr>                                  
                  </table>
<br>                  
                Преподаваемые предметы:
                <br>
			<?
                $s="SELECT usersubject.*,  subject  FROM usersubject, subject where usersubject.idsubject=subject.idsubject  and usersubject.iduser=$iduser";  

				$r=mysql_query($s);				
			?>
               
<table WIDTH=100% border="1" cellspacing=0 cellpadding=2  >
									<tr >
                            

          

        <td>Предмет</td>          
 	     								
 	     								      	     								
    	     								                
     	     								    
                                         
		</tr>
        
        
      <?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи				
				echo "<tr>";
		
				echo "

			

				<td> $f[subject]</td>												


																				


							
				";								
				echo "</tr>";
			  }		 
		?>
      
  </table>                   
                  
                  
                  
				<br>
                
				<input  type="button"  name="button"   onclick="this.form.action='profile.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$iduser";?>'; this.form.submit();"   value="OK" width="500">
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
  <div class="container">
    <div class="row">
      <div class="grid_12"> 
        <div class="copyright"> <a href="#">Все права защищены</a>
        </div>
      </div>
    </div>
  </div>  
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>


