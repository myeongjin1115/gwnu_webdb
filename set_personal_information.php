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
		<font size="5"> 학적관리 </font>
	</div>
	<div id="article_subhead">
		<font size="5"> 개인정보관리 </font>
		<table>
			<tr>
				<form action="get_personal_information.php" method=post>
					<td>
						<input type="submit" name="조회" value="조회">
						&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
				</form>


				<form action="set_personal_information.php" method=post>
					<td>
						<input type="submit" name="수정" value="수정">
					</td>
			</tr>
		</table>
	</div>
	<?

		$con=mysql_connect("localhost", "qwerty", "1234");
		mysql_select_db("webdb", $con);
		#$login_result = login($userid, $passwd);
		if($_SESSION["userid"]=="학생"){
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
		이름<input type = "text" name ="name" readonly value="'.$name.'"  size="5">&nbsp;&nbsp;&nbsp;
		학과<input type = "text" name ="subject" readonly value="'.$subject.'"  size="10">&nbsp;&nbsp;&nbsp;
		학번<input type = "text" name ="number" readonly value="'.$number.'"  size="10">&nbsp;&nbsp;&nbsp;
		학년<input type = "text" name ="years" readonly value="'.$years.'"  size="1"><br><br>
		학적상태<input type = "text" name ="get" readonly value="'.$get.'"  size="2">&nbsp;&nbsp;&nbsp;
		이메일<input type = "text" name ="email" value="'.$email.'"  size="30">&nbsp;&nbsp;&nbsp;
		핸드폰<input type = "text" name ="phone" value="'.$phone.'"  size="10"><br><br>
		주소<input type = "text" name ="adress" value="'.$adress.'"  size="60"><br><br>
		상세주소<input type = "text" name ="Dadress" value="'.$Dadress.'"  size="60">
		</center>
		</div>
');

			
		}
		else if($_SESSION["userid"]=="교수"){
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
		이름<input type = "text" name ="name" readonly value="'.$name.'"  size="5">
		학과<input type = "text" name ="subject" readonly value="'.$subject.'"  size="10">
		사번<input type = "text" name ="number" readonly value="'.$number.'"  size="10"><br><br><br>
		이메일<input type = "text" name ="email" value="'.$email.'"  size="30">
		핸드폰<input type = "text" name ="phone" value="'.$phone.'"  size="10"><br><br>
		주소<input type = "text" name ="adress" value="'.$adress.'"  size="60"><br><br>
		상세주소<input type = "text" name ="Dadress" value="'.$Dadress.'"  size="60">
		</center></div>
		');
		
		
	}
	
	
		
	mysql_close($con);
	
?>

	</form>
</body>

</html>