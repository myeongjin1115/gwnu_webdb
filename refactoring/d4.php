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



<div id='article_head'><font size=15>���ǰ��� </font></div>
<div id='article_subhead'><font size=10>���ǰ��� </font>

<table align="right">



<form action="d4.php" method=post>
<tr>
	<td><input type="submit" name="��ȸ" value ="��ȸ">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>
<form action="d1.php" target="_blank" method=post>
	<td><input type="submit" name="���" value ="���">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>

<form action="d2.php" target="_blank" method=post>
	<td><input  type="submit" name="����" value ="����">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><input  type="submit" onclick=opener.parent.location.reload() name="����" value ="����">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

</table>
</div>

<?	$con=mysql_connect('localhost', 'qwerty', '1234');
	mysql_select_db('webdb', $con);
	$table="Lecture";
	$query="select LNAME,LID,LPID from $table where PID='$_SESSION[userPID]'";
	$result=mysql_query($query, $con);
	
	if(!mysql_num_rows($result)){
	$errormsg="������ �����ϴ�";
	return 0;
	}else{
	
	
	echo ("<div id='article_main'>
		<table>
		<tr>
		<td width=500><center><strong>�������</strong></center></td>
		<td width=200><center><strong>�����ڵ�</strong></center></td>
		<td><center><strong>������ȹ��</strong></center></td>
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