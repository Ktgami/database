<?
require "option.php";//���� � ����������� ����������� � ��
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>����������</title>
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
               <li><a href="index.php">�������</a></li>
               <li class="current"><a href="faculty.php">����������</a></li>
               <li ><a href="spec.php">�������������</a></li>
               <li ><a href="chair.php">�������</a></li>
               <li><a href="subject.php">��������</a></li>            
      
             
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
        <h3>���������� (����� ��������������)</h3>       
      </div>
 
      <div class="grid_12">
        


 <form name="form2"  method="post"  >
 
   <?
		$filter=$_GET["filter"];//���������� ��������� �������
		$sort=$_GET["sort"];//���������� ��������� �������		

if ($filter==1)/*���� �� ���������� ������*/
{
		 
$value1 = $_POST['FilterValue1'];//�������� ������� ����
$s="SELECT faculty.* FROM faculty where faculty" ;
if ($value1!="���")
$s=$s." LIKE '%$value1"."%'  ";
else
$s=$s."=faculty ";

}
else
		 $s="SELECT faculty.*FROM faculty";


if ($sort==1)/*���� �� ���������� ������*/
{
$fieldsort = $_POST['sortname'];//������ ����
$s=$s." order by $fieldsort";
}

		 $r=mysql_query($s);
	 ?>
         
     		<div align="right">	
����������:
				<select name="sortname"  style="height:22; width:auto" onChange="this.form.action='faculty.php?sort=1&filter=<? echo $filter;?>'; this.form.submit();" >
					<option value="faculty"  <? if ($fieldsort=="faculty") {?> selected="selected" <? }?>>��������� </option>	                	              	                                                            

			  </select>            	
���������: 
                
				<input   name="FilterValue1"  onFocus="if (this.value=='���') this.value=''"  value="<? if ($filter==1)/*���� �� ���������� ������*/ echo "$value1"; else echo("���"); ?>" onBlur="checkFilterValue1()"  type="text">


				<br>
				<input  type="button"  name="button1"  onclick="this.form.action='faculty.php?filter=1&sort=<? echo $sort;?>'; this.form.submit();"   value="������">
				<input  type="button"  name="button2"  onclick="this.form.action='faculty.php?filter=0&sort=<? echo $sort;?>'; this.form.submit();"   value="��������">
           <br>            
          </div>   
 
<input  type="button"  name="button4"   onclick="this.form.action='updfaculty.php?upd=0&step=1'; this.form.submit();" value="��������">
<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="this.form.action='updfaculty.php?upd=1&step=1'; this.form.submit();" value="�������������">   
<input  type="button"  name="button" <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="qwest=window.confirm('�� ������������ ������ ������� ������?');  if (qwest) {this.form.action='delfaculty.php'; this.form.submit();}" value="�������">
<table WIDTH=100% border="1" cellspacing=0 cellpadding=2  >
									<tr >
		<td ><font color=white>&nbsp;</font></td>                                     
		<td><h1>���������</h1></td> 
            

                      
                            

		</tr>
        
        
      <?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//����� ������ � ����� �� ���������� �������
			  {
				$f=mysql_fetch_array($r);//���������� �������� ������				
				echo "<tr>";

			
	if ($i==0)
    echo "<td><input type=radio checked=checked name=Arr[] value=".$f["idfaculty"]."> </td>";
	else
    echo "<td><input type=radio name=Arr[] value=".$f["idfaculty"]."> </td>";				
				echo "
				<td> $f[faculty]</td>								


											
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