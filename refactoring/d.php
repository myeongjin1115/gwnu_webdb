<?
	session_start();
	
	global $con;
	global $table;
    global $errormsg;
	

        	
	
?>
<html><head>

 <style>
  input[type=text]{
  
  font-size:20px;
}</style>
<link rel="stylesheet" type="text/css" href="style.css">
 </head>
    <body>
	

<div id='header'>
	 <?php include "header.php";?>
</div>
<div id='nav'>
 <?php include "nav.php";?>
</div>



<div id='article_head'><font size=15>���ǰ��� </font></div>
<div id='article_subhead'><font size=10>���ǰ��� </font>

<table align="right">



<form action="d4.php" method=post>
<tr>
	<td><input target="_blank" type="submit" name="��ȸ" value ="��ȸ">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>
<form action="d1.php" method=post>
	<td><input target="_blank" type="submit" name="���" value ="���">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>

</tr>

</table>
</div>

<?
	
	if(!isset($_SESSION['userid'])){
		
		echo ("<div id='article_main'><script>alert('���ǵ������� ���');</script></div>
");
		
	}
	
	else if($_SESSION['userid']=="�л�"){
		
		echo ("<div id='article_main'><script>alert('���ǵ������� ���');</script></div>
");
		
	}else if($_SESSION['userid']=="����"){
		
		echo ("<div id='article_main'>
		
		</div>
		
");
		
	}
?>

</body>
</html>
