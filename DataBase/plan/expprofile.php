<?
require "option.php";//���� � ����������� ����������� � ��
$fio=$_REQUEST["fio"];
$iduser=$_REQUEST['iduser'];
date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");   

	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=������ �� '.$date. ' ('. $fio.')'.'.xls');
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
<title>������</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<br>
 
   <?
$r=mysql_query("SELECT * FROM user, chair where chair.idchair=user.idchair and iduser=$iduser");
$f=mysql_fetch_array($r);//���������� �������� ������
	 ?>
     
<font  size="+1" >   ������ ��  <? echo $date. " (" .$fio. ")";?>  </font> 

 
   		  <table  border="1" align="">
                                   
                    <tr>
                      <td ><font color="#000000" >   ���: </font> </td>
                      <td><? echo "$f[user]";  ?></td>  
                                      
                      <? 
					  //echo "<td> <a href='http://localhost/plan/upload/$f[file]'> ������ �� ���� </a>&nbsp; </td>";
					  echo "<td rowspan=10><img  width='220' height='220' src='http://plan/upload/$f[file]'></td>   ";   
					  ?>
                    </tr>
                      
<tr> 
 <td><font color="#000000" >   �������: </font></td>
 <td >
   <?

	echo $f["chair"];
 
?>
   
</td>
                    </tr>  
                    
                                        
                      <tr>
                      <td><font color="#000000" > �������: </font> </td>
                      <td><? echo "$f[degree]";  ?></td>
                    </tr>                     	                                                                 
                    <tr>
                      <td><font color="#000000" > ���������: </font> </td>
                      <td><? echo "$f[post]";  ?></td>
                    </tr> 
                      <tr>
                      <td><font color="#000000" > ����: </font> </td>
                      <td><? echo "$f[experience]";  ?></td>
                    </tr>                       
			       	<tr>
                      <td><font color="#000000" > ���� ��������: </font> </td>
                      <td><? echo "$f[datebirth]";  ?></td>
                    </tr>                 

                      	<tr>
                      <td><font color="#000000" > ����� ����������: </font> </td>
                      <td><? echo "$f[address]";  ?></td>
                    </tr> 
                         	<tr>
                      <td><font color="#000000" > �������� ���������: </font> </td>
                      <td><? echo "$f[family]";  ?></td>
                    </tr>                    
                              	<tr>
                      <td><font color="#000000" > �������: </font> </td>
                      <td><? echo "$f[phone]";  ?></td>
                    </tr>   
                              	<tr>
                      <td><font color="#000000" > �����: </font> </td>
                      <td><? echo "$f[mail]";  ?></td>
                    </tr>                                  
                  </table>
<br>                  
                ������������� ��������:
                <br>
			<?
                $s="SELECT usersubject.*,  subject  FROM usersubject, subject where usersubject.idsubject=subject.idsubject and usersubject.iduser=$iduser";  

				$r=mysql_query($s);				
			?>
               
<table WIDTH=100% border="1" cellspacing=0 cellpadding=2  >
									<tr >
                            

          

        <td>�������</td>          
		      	     								
    	     								                
     	     								    
                                         
		</tr>
        
        
      <?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//����� ������ � ����� �� ���������� �������
			  {
				$f=mysql_fetch_array($r);//���������� �������� ������				
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
