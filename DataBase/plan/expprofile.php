<?
require "option.php";//файл с параметрами подключения к БД
$fio=$_REQUEST["fio"];
$iduser=$_REQUEST['iduser'];
date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");   

	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=Анкета от '.$date. ' ('. $fio.')'.'.xls');
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
<title>Анкета</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<br>
 
   <?
$r=mysql_query("SELECT * FROM user, chair where chair.idchair=user.idchair and iduser=$iduser");
$f=mysql_fetch_array($r);//считывание текующей записи
	 ?>
     
<font  size="+1" >   Анкета от  <? echo $date. " (" .$fio. ")";?>  </font> 

 
   		  <table  border="1" align="">
                                   
                    <tr>
                      <td ><font color="#000000" >   ФИО: </font> </td>
                      <td><? echo "$f[user]";  ?></td>  
                                      
                      <? 
					  //echo "<td> <a href='http://localhost/plan/upload/$f[file]'> Ссылка на фото </a>&nbsp; </td>";
					  echo "<td rowspan=10><img  width='220' height='220' src='http://plan/upload/$f[file]'></td>   ";   
					  ?>
                    </tr>
                      
<tr> 
 <td><font color="#000000" >   Кафедра: </font></td>
 <td >
   <?

	echo $f["chair"];
 
?>
   
</td>
                    </tr>  
                    
                                        
                      <tr>
                      <td><font color="#000000" > Степень: </font> </td>
                      <td><? echo "$f[degree]";  ?></td>
                    </tr>                     	                                                                 
                    <tr>
                      <td><font color="#000000" > Должность: </font> </td>
                      <td><? echo "$f[post]";  ?></td>
                    </tr> 
                      <tr>
                      <td><font color="#000000" > Стаж: </font> </td>
                      <td><? echo "$f[experience]";  ?></td>
                    </tr>                       
			       	<tr>
                      <td><font color="#000000" > Дата рождения: </font> </td>
                      <td><? echo "$f[datebirth]";  ?></td>
                    </tr>                 

                      	<tr>
                      <td><font color="#000000" > Место жительства: </font> </td>
                      <td><? echo "$f[address]";  ?></td>
                    </tr> 
                         	<tr>
                      <td><font color="#000000" > Семейное положение: </font> </td>
                      <td><? echo "$f[family]";  ?></td>
                    </tr>                    
                              	<tr>
                      <td><font color="#000000" > Телефон: </font> </td>
                      <td><? echo "$f[phone]";  ?></td>
                    </tr>   
                              	<tr>
                      <td><font color="#000000" > Почта: </font> </td>
                      <td><? echo "$f[mail]";  ?></td>
                    </tr>                                  
                  </table>
<br>                  
                Преподаваемые предметы:
                <br>
			<?
                $s="SELECT usersubject.*,  subject  FROM usersubject, subject where usersubject.idsubject=subject.idsubject and usersubject.iduser=$iduser";  

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

       

</body>
</html>
