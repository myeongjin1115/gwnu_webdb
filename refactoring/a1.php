<?
	session_start();
?>
<html><head>

<link rel="stylesheet" type="text/css" href="style.css">
<style>
  input[type=text]{
 
  
  font-size:20px;
}</style>
  </head>
    <body>
<div id='header'>
	<?php include "header.php";?>
</div>
<div id='nav'>
<?php include "nav.php";?>
</div>
<div id='article_head'><font size=5> �������� </font></div>
<div id='article_subhead'><font size=10> ������������ </font>
<table>
<tr>
<form action="a1.php" method=post>
<td>
	<input type="submit" name="��ȸ" value = "��ȸ">
&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>


<form action="a2.php" method=post>
<td>
	<input type="submit" name="����" value = "����">
</td>
</tr>
</table>	
</div>
<?

		$con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);
		if($_SESSION['userid']=='�л�'){
			
			$table="student";
			$query="select * from $table where SID='$_SESSION[userSID]'";
			$result=mysql_query($query, $con);
			$query2="select DNAME from $table,Department where $table.DID = Department.DID";
			$result2=mysql_query($query2, $con);
			if(!mysql_num_rows($result)){
				$errormsg="������ �����ϴ�";
				return 0;
			}else{
			$row=mysql_fetch_array($result);
			$row2=mysql_fetch_array($result2);			
			$SNAME =$row[1];
			$SID = $row[0];
			$DID =$row[2];
			$password =$row[3];
			$Attend =$row[4];
			if($Attend == 0){
				$Attend_name ='����';
			}else{
				$Attend_name ='����';
			}
			$Grade=$row[5];
			$Email=$row[6];
			$TEL=$row[7];
			$Address=$row[8];
			$Detail=$row[9];
			$DNAME = $row2[0];
			echo ("<div id='article_main'>
			<center><br><br>
		�̸�<input type = 'text' name ='name' readonly value=".$SNAME."  size='5'>&nbsp;&nbsp;&nbsp;
		�а�<input type = 'text' name ='subject' readonly value='".$DNAME."'  size='10'>&nbsp;&nbsp;&nbsp;
		�й�<input type = 'text' name ='number' readonly value=".$SID."  size='10'>&nbsp;&nbsp;&nbsp;
		�г�<input type = 'text' name ='years' readonly value=".$Grade."  size='1'><br><br>
		��������<input type = 'text' name ='get' readonly value='".$Attend_name."'  size='2'>&nbsp;&nbsp;&nbsp;
		�̸���<input type = 'text' name ='email' value=".$Email."  size='30'>&nbsp;&nbsp;&nbsp;
		�ڵ���<input type = 'text' name ='phone' value=".$TEL."  size='10'><br><br>
		�ּ�<input type = 'text' name ='adress' value='".$Address."'  size='60'><br><br>
		���ּ�<input type = 'text' name ='Dadress' value='".$Detail."'  size='60'>
		</center></div>");
			}
		}
		else if($_SESSION['userid']=='����'){
			$table="professor";
			$query="select * from $table where PID='$_SESSION[userPID]'";
			$result=mysql_query($query, $con);
			$query2="select DNAME from $table,Department where $table.DID = Department.DID";
			$result2=mysql_query($query2, $con);
			if(!mysql_num_rows($result)){
				$errormsg="������ �����ϴ�";
				return 0;
			}else{
			$row=mysql_fetch_array($result);
			$row2=mysql_fetch_array($result2);			
			$SNAME =$row[1];
			$SID = $row[0];
			$DID =$row[2];
			$password =$row[3];
			$Email=$row[4];
			$TEL=$row[5];
			$Address=$row[6];
			$Detail=$row[7];
			$DNAME = $row2[0];
					echo ("<div id='article_main'><center><br><br><br>
		�̸�<input type = 'text' name ='name' readonly value=".$SNAME."  size='5'>
		�а�<input type = 'text' name ='subject' readonly value='".$DNAME."'  size='10'>
		���<input type = 'text' name ='number' readonly value=".$SID."  size='10'><br><br><br>
		�̸���<input type = 'text' name ='email'  value=".$Email."  size='30'>
		�ڵ���<input type = 'text' name ='phone' value='".$TEL."'  size='10'><br><br>
		�ּ�<input type = 'text' name ='adress' value='".$Address."'  size='60'><br><br>
		���ּ�<input type = 'text' name ='Dadress'value='".$Detail."'  size='60'>
		</center></div>");
		}
		
	}
	
	
		
	mysql_close($con);
	
?>

</form>
</body>
</html>
