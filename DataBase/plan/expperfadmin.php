<?
require "option.php";//файл с параметрами подключения к БД
date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");   

	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=Учебный план от '.$date.'.xls');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0'); 
    header('Cache-Control: must-revalidate');
    header('Pragma: public');   


 	?>				   
		
<html >
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<title>Учебный план</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<br>
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
     
<font  size="+1" >   Учебный план от <? echo $date;?>  </font> 

 
                 
  <table WIDTH=100% border=1 cellspacing=0 cellpadding=3>
									<tr>
                          
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

       

</body>
</html>
