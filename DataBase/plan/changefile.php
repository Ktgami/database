<?
$step=$_REQUEST["step"];
require "option.php";//���� � ����������� ����������� � ��
$file=$_COOKIE["file"];


if (isset ($_REQUEST['Arr']))
{
	$Arr=$_REQUEST["Arr"];
	$iduser=$Arr[0];
}
if (isset ($_REQUEST['iduser']))
{
	$iduser=$_REQUEST['iduser'];
}

if ($step==2)
{

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename($_FILES["file"]["name"]);


//phpinfo(32);
if ($_FILES['file']['size'] > 104857600)
{
?>
	 <script language="javascript">
	 alert ('������� ������� ����!');
	 </script>
<?
exit();
}
else
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) 
    echo "���� ��������� � ��� ������� ��������.\n";
 else 
    exit();


$file=basename($_FILES["file"]["name"]);
 

	
	 mysql_query("UPDATE user SET  file='$file' where iduser=$iduser");		


 
?>

 <script language="javascript">
 location.href='profile.php?iduser=<? echo"$iduser";?>';
 </script>
<?


 
}

?>
<!DOCTYPE html>

<head>
<title>������� ������������</title>
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
               <li><a href="about.php">� �����</a></li>
               <li><a href="contacts.php">��������</a></li>
<?
if ($mode=="�������������")
{
?> 
               <li ><a href="user.php">������������</a></li>
<?

?>
               <li class="current"><a href="profile.php?iduser=<? echo"$iduser";?>">�������</a></li>
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



	
$r=mysql_query("SELECT * FROM user where iduser="."$iduser");
$f=mysql_fetch_array($r);//���������� �������� ������



  ?>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
  
        <h3>������� ������������</h3>   
 
     
      </div>
 
      <div  class="grid_12">

<form name="form2" method="post" enctype="multipart/form-data" >
				  <table  border="0" align="">
                                   
                    <tr>
                      <td ><font color="#000000" >   ���: </font> </td>
                      <td><input   name="user"  readonly  type="text"  value="<? echo "$f[user]";  ?>" size="40" ></td>                     
                    </tr>
     
                     <tr>
                      <td><font color="#000000" >��������:  </font></td>
                      <td> 

						<input name="file" type="file" size="19" />  
                         <input type="button"  name="button"  value="���������" onClick="this.form.action='changefile.php?iduser=<? echo"$iduser";?>&step=3'; this.form.submit();">
                      </td>
                    </tr> 
		            <tr>
      
  </table>                   
                  
                  
                  
				<br>
				<input  type="button"  name="button"   onclick="this.form.action='changefile.php?step=2&iduser=<? echo"$iduser";?>'; this.form.submit();"   value="OK" width="500">
				<input  type="button"  name="button"  onClick="javascript:history.back();"  value="������">

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
        <div class="copyright"> <a href="#">��� ����� ��������</a>
        </div>
      </div>
    </div>
  </div>  
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>


