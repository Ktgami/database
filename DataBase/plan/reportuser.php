<?
require "option.php";//���� � ����������� ����������� � ��
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>�������� ��������</title>
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
               <li><a href="index.php">�������</a></li>
               <li><a href="about.php">� �����</a></li>
               <li><a href="contacts.php">��������</a></li>
               <li class="current"><a href="#">�������� ��������</a></li>

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
        <h3>�������� �������� (����� �������������)</h3>       
      </div>
 
      <div class="grid_12">
        


 <form name="form2"  method="post"  >
 
   <?
		$filter=$_GET["filter"];//���������� ��������� �������
		$sort=$_GET["sort"];//���������� ��������� �������		

if ($filter==0)/*���� �� ���������� ������*/
{
date_default_timezone_set("Europe/Moscow");
$date1=(date("Y")-1)."-".date("m")."-".date("d");    
$date2=(date("Y")+1)."-".date("m")."-".date("d");    
}

$s="SELECT  squad,   subject, category, form, SUM(hoursprfm) as hoursprfm   FROM performance, subject,  squad, category, form where performance.idsquad=squad.idsquad and performance.idsubject=subject.idsubject and performance.idcategory=category.idcategory and form.idform=subject.idform and performance.iduser=$iduser";


if ($filter==1)/*���� �� ���������� ������*/
{

$date1=$_POST['date1'];    
$date2=$_POST['date2'];    
		 
$fieldfind = $_POST['findname'];//������ ����
$value1 = $_POST['FilterValue1'];//�������� ������� ����

$s=$s." and $fieldfind" ;
if ($value1!="���")
$s=$s." LIKE '%$value1"."%'  ";
else
$s=$s."=$fieldfind ";
$s=$s." and dateprfm>='$date1' and dateprfm<='$date2' ";

}

$s=$s." GROUP BY  squad,   subject, category, form";

if ($sort==1)/*���� �� ���������� ������*/
{
$fieldsort = $_POST['sortname'];//������ ����
$s=$s." order by $fieldsort";
}
else
$s=$s." order by squad";


		 $r=mysql_query($s);
	 ?>
         
     		<div align="right">	
����������:
				<select name="sortname"  style="height:22; width:auto" onChange="this.form.action='performanceuser.php?sort=1&filter=<? echo $filter;?>'; this.form.submit();" >


					<option value="squad"  <? if ($fieldsort=="squad") {?> selected="selected" <? }?>>������ </option>	
					<option value="subject"  <? if ($fieldsort=="subject") {?> selected="selected" <? }?>>������� </option>	                                       	                                        

				</select>            	
                         

        &nbsp;    &nbsp;    &nbsp;                              
            �:
				<input   name="date1"  value="<? echo "$date1";?>"   size="8" type="text">
            ��:
                <input   name="date2"   type="text"  value="<? echo "$date2";?>" size="8">
                                        

    &nbsp;                     	
�� ���� 
 &nbsp;  
				<select name="findname"  style="height:22; width:auto"  >


					<option value="squad"  <? if ($fieldfind=="squad") {?> selected="selected" <? }?>>������ </option>	
					<option value="subject"  <? if ($fieldfind=="subject") {?> selected="selected" <? }?>>������� </option>	   

 
                                           
                                
			  </select>  
                
				<input   name="FilterValue1"  onFocus="if (this.value=='���') this.value=''"  value="<? if ($filter==1)/*���� �� ���������� ������*/ echo "$value1"; else echo("���"); ?>" onBlur="checkFilterValue1()"  type="text">


				<br>
				<input  type="button"  name="button1"  onclick="this.form.action='reportuser.php?filter=1&sort=<? echo $sort;?>'; this.form.submit();"   value="������">
				<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="this.form.action='expreportuser.php?sort=<? echo $sort;?>&filter=<? echo $filter;?>'; this.form.submit();" value="������">    			
            	<input  type="button"  name="button2"  onclick="this.form.action='reportuser.php?filter=0&sort=<? echo $sort;?>'; this.form.submit();"   value="��������">
           <br>            
          </div>   
 


        
              
  <table WIDTH=100% border="1" cellspacing=0 cellpadding=2  >
									<tr >
                          

                         
		<td>������</td>       
        <td>�������</td>          
		<td>��� �������</td>   
		<td>����� �����</td>        	     								        
		<td>�����</td>        	     								      	     								
    	     								                
     	     								    
                                         
		</tr>
        
        
      <?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//����� ������ � ����� �� ���������� �������
			  {
				$f=mysql_fetch_array($r);//���������� �������� ������				
				echo "<tr>";

			
		
				echo "

			
			
				<td> $f[squad]</td>	
				<td> $f[subject]</td>												
				<td> $f[category]</td>	
				<td> $f[form]</td>												
				<td> $f[hoursprfm]</td>	
																				


							
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
        <div class="copyright"><a href="#">��� ����� ��������</a>
        </div>
    </div>
  </div>  
  </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>