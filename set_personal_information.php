<?
	session_start();
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="header">
		<?php include "header.php";?>
	</div>
	<div id="nav">
		<?php include "nav.php";?>
	</div>
	<div id="article_head">
		<font size="5"> �������� </font>
	</div>
	<div id="article_subhead">
		<font size="5"> ������������ </font>
		<table>
			<tr>
				<form action="get_personal_information.php" method=post>
					<td>
						<input type="submit" name="��ȸ" value="��ȸ">
						&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</form>


				<form action="set_personal_information.php" method=post>
					<td>
						<input type="submit" name="����" value="����">
					</td>
			</tr>
		</table>
	</div>
	<?

		$con=mysql_connect("localhost", "qwerty", "1234");
		mysql_select_db("webdb", $con);
		#$login_result = login($userid, $passwd);
		if($_SESSION["userid"]=="�л�"){
			$name = $_POST["name"];
			$subject = $_POST["subject"];
			$number = $_POST["number"];
			$years = $_POST["years"];
			$get = $_POST["get"];
		
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$adress = $_POST["adress"];
			$Dadress = $_POST["Dadress"];
			
			$table="student";
			$query="update $table set Address='$adress',Detail='$Dadress',TEL='$phone',Email='$email' where SNAME='$name'";
			mysql_query($query, $con);
			

			
			echo ('<div id="article_main">
		<center><br><br>
		�̸�<input type = "text" name ="name" readonly value="'.$name.'"  size="5">&nbsp;&nbsp;&nbsp;
		�а�<input type = "text" name ="subject" readonly value="'.$subject.'"  size="10">&nbsp;&nbsp;&nbsp;
		�й�<input type = "text" name ="number" readonly value="'.$number.'"  size="10">&nbsp;&nbsp;&nbsp;
		�г�<input type = "text" name ="years" readonly value="'.$years.'"  size="1"><br><br>
		��������<input type = "text" name ="get" readonly value="'.$get.'"  size="2">&nbsp;&nbsp;&nbsp;
		�̸���<input type = "text" name ="email" value="'.$email.'"  size="30">&nbsp;&nbsp;&nbsp;
		�ڵ���<input type = "text" name ="phone" value="'.$phone.'"  size="10"><br><br>
		�ּ�<input type = "text" name ="adress" value="'.$adress.'"  size="60"><br><br>
		���ּ�<input type = "text" name ="Dadress" value="'.$Dadress.'"  size="60">
		</center>
		</div>
');

			
		}
		else if($_SESSION["userid"]=="����"){
			$name = $_POST["name"];
			$subject = $_POST["subject"];
			$number = $_POST["number"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$adress = $_POST["adress"];
			$Dadress = $_POST["Dadress"];
			
		$table="professor";
		$query="update $table set Address='$adress',Detail='$Dadress',TEL='$phone',Email='$email' where PNAME='$name'";
		$result=mysql_query($query, $con);
		
			
		echo ('<div id="article_main">
		<center><br><br><br>
		�̸�<input type = "text" name ="name" readonly value="'.$name.'"  size="5">
		�а�<input type = "text" name ="subject" readonly value="'.$subject.'"  size="10">
		���<input type = "text" name ="number" readonly value="'.$number.'"  size="10"><br><br><br>
		�̸���<input type = "text" name ="email" value="'.$email.'"  size="30">
		�ڵ���<input type = "text" name ="phone" value="'.$phone.'"  size="10"><br><br>
		�ּ�<input type = "text" name ="adress" value="'.$adress.'"  size="60"><br><br>
		���ּ�<input type = "text" name ="Dadress" value="'.$Dadress.'"  size="60">
		</center></div>
		');
		
		
	}
	
	
		
	mysql_close($con);
	
?>

	</form>
</body>

</html>