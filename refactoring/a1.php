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
<div id='article_head'><font size=5> 수업관리 </font></div>
<div id='article_subhead'><font size=10> 개인정보관리 </font>
<table>
<tr>
<form action="a1.php" method=post>
<td>
	<input type="submit" name="조회" value = "조회">
&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>


<form action="a2.php" method=post>
<td>
	<input type="submit" name="수정" value = "수정">
</td>
</tr>
</table>	
</div>
<?

		$con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);
		if($_SESSION['userid']=='학생'){
			
			$table="student";
			$query="select * from $table where SID='$_SESSION[userSID]'";
			$result=mysql_query($query, $con);
			$query2="select DNAME from $table,Department where $table.DID = Department.DID";
			$result2=mysql_query($query2, $con);
			if(!mysql_num_rows($result)){
				$errormsg="계정이 없습니다";
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
				$Attend_name ='휴학';
			}else{
				$Attend_name ='재학';
			}
			$Grade=$row[5];
			$Email=$row[6];
			$TEL=$row[7];
			$Address=$row[8];
			$Detail=$row[9];
			$DNAME = $row2[0];
			echo ("<div id='article_main'>
			<center><br><br>
		이름<input type = 'text' name ='name' readonly value=".$SNAME."  size='5'>&nbsp;&nbsp;&nbsp;
		학과<input type = 'text' name ='subject' readonly value='".$DNAME."'  size='10'>&nbsp;&nbsp;&nbsp;
		학번<input type = 'text' name ='number' readonly value=".$SID."  size='10'>&nbsp;&nbsp;&nbsp;
		학년<input type = 'text' name ='years' readonly value=".$Grade."  size='1'><br><br>
		학적상태<input type = 'text' name ='get' readonly value='".$Attend_name."'  size='2'>&nbsp;&nbsp;&nbsp;
		이메일<input type = 'text' name ='email' value=".$Email."  size='30'>&nbsp;&nbsp;&nbsp;
		핸드폰<input type = 'text' name ='phone' value=".$TEL."  size='10'><br><br>
		주소<input type = 'text' name ='adress' value='".$Address."'  size='60'><br><br>
		상세주소<input type = 'text' name ='Dadress' value='".$Detail."'  size='60'>
		</center></div>");
			}
		}
		else if($_SESSION['userid']=='교수'){
			$table="professor";
			$query="select * from $table where PID='$_SESSION[userPID]'";
			$result=mysql_query($query, $con);
			$query2="select DNAME from $table,Department where $table.DID = Department.DID";
			$result2=mysql_query($query2, $con);
			if(!mysql_num_rows($result)){
				$errormsg="계정이 없습니다";
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
		이름<input type = 'text' name ='name' readonly value=".$SNAME."  size='5'>
		학과<input type = 'text' name ='subject' readonly value='".$DNAME."'  size='10'>
		사번<input type = 'text' name ='number' readonly value=".$SID."  size='10'><br><br><br>
		이메일<input type = 'text' name ='email'  value=".$Email."  size='30'>
		핸드폰<input type = 'text' name ='phone' value='".$TEL."'  size='10'><br><br>
		주소<input type = 'text' name ='adress' value='".$Address."'  size='60'><br><br>
		상세주소<input type = 'text' name ='Dadress'value='".$Detail."'  size='60'>
		</center></div>");
		}
		
	}
	
	
		
	mysql_close($con);
	
?>

</form>
</body>
</html>
