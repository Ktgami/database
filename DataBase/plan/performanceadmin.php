<?
require "option.php";//файл с параметрами подключения к БД
?>
<!DOCTYPE html>
<html lang="en">
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
               <li><a href="about.php">О сайте</a></li>
               <li><a href="contacts.php">Контакты</a></li>
               <li class="current"><a href="#">Учебный план</a></li>

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
        <h3>Учебный план (режим администратора)</h3>       
      </div>
 
      <div class="grid_12">
        


 <form name="form2"  method="post"  >
 
   <?
		$filter=$_GET["filter"];//считывание параметра фильтра
		$sort=$_GET["sort"];//считывание параметра фильтра		



$s="SELECT plan.*,  user,   subject, category FROM  subject,  category, plan LEFT JOIN user ON plan.iduser=user.iduser where plan.idsubject=subject.idsubject and plan.idcategory=category.idcategory  ";


if ($filter==1)/*есть ли фильтрация данных*/
{

$date1=$_POST['date1'];    
$date2=$_POST['date2'];    
		 
$fieldfind = $_POST['findname'];//первое поле
$value1 = $_POST['FilterValue1'];//значение первого поля

$s=$s." and $fieldfind" ;
if ($value1!="Все")
$s=$s." LIKE '%$value1"."%'  ";
else
$s=$s."=$fieldfind ";


}



if ($sort==1)/*есть ли сортировка данных*/
{
$fieldsort = $_POST['sortname'];//первое поле
$s=$s." order by $fieldsort";
}
else
$s=$s." order by category";


		 $r=mysql_query($s);
	 ?>
         
     		<div align="right">	
Сортировка:
				<select name="sortname"  style="height:22; width:auto" onChange="this.form.action='performanceadmin.php?sort=1&filter=<? echo $filter;?>'; this.form.submit();" >


					<option value="category"  <? if ($fieldsort=="category") {?> selected="selected" <? }?>>Вид занятия </option>	
					<option value="subject"  <? if ($fieldsort=="subject") {?> selected="selected" <? }?>>Предмет </option>	                                       	                                        
					<option value="user"  <? if ($fieldsort=="user") {?> selected="selected" <? }?>>Преподаватель </option>	                      
				</select>            	


    &nbsp;                     	
по полю 
 &nbsp;  
				<select name="findname"  style="height:22; width:auto"  >


					<option value="category"  <? if ($fieldfind=="category") {?> selected="selected" <? }?>>Вид занятия </option>	
					<option value="subject"  <? if ($fieldfind=="subject") {?> selected="selected" <? }?>>Предмет </option>	   
					<option value="user"  <? if ($fieldfind=="user") {?> selected="selected" <? }?>>Преподаватель </option>	                                                                                                    
 
                                           
                                
			  </select>  
                
				<input   name="FilterValue1"  onFocus="if (this.value=='Все') this.value=''"  value="<? if ($filter==1)/*есть ли фильтрация данных*/ echo "$value1"; else echo("Все"); ?>" onBlur="checkFilterValue1()"  type="text">


				<br>
				<input  type="button"  name="button1"  onclick="this.form.action='performanceadmin.php?filter=1&sort=<? echo $sort;?>'; this.form.submit();"   value="Фильтр">
				<input  type="button"  name="button2"  onclick="this.form.action='performanceadmin.php?filter=0&sort=<? echo $sort;?>'; this.form.submit();"   value="Очистить">
           <br>            
          </div>   
 
<input  type="button"  name="button"  onclick="qwest=window.confirm('Вы дествительно хотите очистить план?');  if (qwest) {this.form.action='clearperformance.php'; this.form.submit();}" value="Очистить">   
<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="this.form.action='updperformance.php?upd=1&step=1'; this.form.submit();" value="Назначить">   
<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="qwest=window.confirm('Вы дествительно хотите удалить запись?');  if (qwest) {this.form.action='delperformance.php'; this.form.submit();}" value="Удалить">    
 


<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="this.form.action='expperfadmin.php?sort=<? echo $sort;?>&filter=<? echo $filter;?>'; this.form.submit();" value="Печать">
             
              
  <table WIDTH=100% border="1" cellspacing=0 cellpadding=2  >
									<tr >
		<td ><font color=white>&nbsp;</font></td>                                     

  
		<td>Преподаватель</td>                              
		<td>Вид занятия</td>       
        <td>Предмет</td>          
		<td>Объём</td>        	     								      	     								
    	     								                
     	     								    
                                         
		</tr>
        
        
      <?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи	
								if ($f['user']==null)	echo "<tr bgcolor=LightCoral>";
								else				echo "<tr>";

			
	if ($i==0)
    echo "<td><input type=radio checked=checked name=Arrplan[] value=".$f["idplan"]."> </td>";
	else
    echo "<td><input type=radio name=Arrplan[] value=".$f["idplan"]."> </td>";				


				if 	($f['user']==null)																	
					echo "<td>Не назначен</td>";
				else
					echo "<td> ".$f['user']."</td>";
				echo "
				
				<td> $f[category]</td>	
				<td> $f[subject]</td>																								
				<td> $f[plan]</td>	
																				


							
				";								
				echo "</tr>";
			  }		 
		?>
      
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