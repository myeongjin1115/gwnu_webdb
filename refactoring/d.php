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



<div id='article_head'><font size=15>강의관리 </font></div>
<div id='article_subhead'><font size=10>강의관리 </font>

<table align="right">



<form action="d4.php" method=post>
<tr>
	<td><input target="_blank" type="submit" name="조회" value ="조회">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>
<form action="d1.php" method=post>
	<td><input target="_blank" type="submit" name="등록" value ="등록">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>

</tr>

</table>
</div>

<?
	
	if(!isset($_SESSION['userid'])){
		
		echo ("<div id='article_main'><script>alert('정의되지않은 사람');</script></div>
");
		
	}
	
	else if($_SESSION['userid']=="학생"){
		
		echo ("<div id='article_main'><script>alert('정의되지않은 사람');</script></div>
");
		
	}else if($_SESSION['userid']=="교수"){
		
		echo ("<div id='article_main'>
		
		</div>
		
");
		
	}
?>

</body>
</html>
