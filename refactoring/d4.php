<?
	session_start();
    $con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);    	
	
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
	<td><input type="submit" name="조회" value ="조회">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>
<form action="d1.php" target="_blank" method=post>
	<td><input type="submit" name="등록" value ="등록">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>

<form action="d2.php" target="_blank" method=post>
	<td><input  type="submit" name="수정" value ="수정">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input  type="submit" onclick=opener.parent.location.reload() name="수정" value ="삭제">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

</table>
</div>

<?	$con=mysql_connect('localhost', 'qwerty', '1234');
	mysql_select_db('webdb', $con);
	$table="Lecture";
	$query="select LNAME,LID,LPID from $table where PID='$_SESSION[userPID]'";
	$result=mysql_query($query, $con);
	
	if(!mysql_num_rows($result)){
	$errormsg="계정이 없습니다";
	return 0;
	}else{
	
	
	echo ("<div id='article_main'>
		<table>
		<tr>
		<td width=500><center><strong>교과목명</strong></center></td>
		<td width=200><center><strong>과목코드</strong></center></td>
		<td><center><strong>수업계획서</strong></center></td>
		<td></td>
		");
		while($row=mysql_fetch_array($result)){
			
			echo("
			<tr>
			<td width=500><center>'$row[0]'</center></td>
			<td><center>'$row[1]'</center></td>
			<td width=200><center>".($row[2]!=''?'O':'X')."<center></td>
			<td><input type='radio' name='choice'  value='$row[1]'</td>
			</tr>");
		}
		
	echo("	
		</table>
	</div>
		
");
	}
?>

</form>
</body>
</html>