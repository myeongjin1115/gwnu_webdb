<?
	session_start();
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<!-- header -->
	<div id='header'>
		<?php include "header.php";?>
	</div>

	<!-- navigator -->
	<div id='nav'>
		<?php include "nav.php";?>
	</div>



<div id='article_head'><center><font size=5>��������</font></center> </div>
<div id='article_subhead'><font size=10 align="center">������������</font>

<table align="right">



<form action="a1.php" method=post>
<tr>
	<td><input type="submit" name="��ȸ" value ="��ȸ">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</form>
<form action="a2.php" method=post>
	<td><input type="submit" name="����" value ="����">&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

</table>

</div>

<?
	
	if(!isset($_SESSION['userid'])){
		echo ('<script>alert("���ǵ������� ���");window.location.href="/main.html";</script>');
	}
	else if($_SESSION['userid'] == "�л�"){
		echo ("<div id='article_main'>
		<center><strong>���������� �ڵ���,�̸���,�ּ�,���ּҸ� �ٲܼ��ֽ��ϴ�.</strong><br><br>
		
		�̸�&nbsp;<input type = 'text' name ='name'   readonly size='5'>&nbsp;&nbsp;&nbsp;
		�а�&nbsp;<input type = 'text' name ='subject'  readonly size='10'>&nbsp;&nbsp;&nbsp;
		�й�&nbsp;<input type = 'text' name ='number'  readonly size='10'>&nbsp;&nbsp;&nbsp;
		�г�&nbsp;<input type = 'text' name ='years'  readonly size='1'><br><br>
		��������&nbsp;<input type = 'text' name ='get'  readonly size='2'>&nbsp;&nbsp;&nbsp;
		�̸���&nbsp;<input type = 'text' name ='email'  size='30'>&nbsp;&nbsp;&nbsp;
		�ڵ���&nbsp;<input type = 'text' name ='phone'  size='10'><br><br>
		�ּ�&nbsp;<input type = 'text' name ='adress'  size='60'><br><br>
		���ּ�&nbsp;<input type = 'text' name ='Dadress'  size='60'><br><br>
		</center>
		</div>
		");	
	} else if($_SESSION['userid'] == "����"){
		echo ("<div id='article_main'>
		<center>
		<strong>���������� �ڵ���,�̸���,�ּ�,���ּҸ� �ٲܼ��ֽ��ϴ�.</strong><br><br>
		�̸�&nbsp;<input type = 'text' name ='name'   readonly size='5'>
		�а�&nbsp;<input type = 'text' name ='subject'  readonly size='10'>
		���<input type = 'text' name ='number'  readonly size='10'><br><br><br>
		�̸���<input type = 'text' name ='email'  size='30'>
		�ڵ���<input type = 'text' name ='phone'  size='10'><br><br>
		�ּ�<input type = 'text' name ='adress'  size='60'><br><br>
		���ּ�<input type = 'text' name ='Dadress'  size='60'><br><br>
		</center>
		</div>
		");	
	}
?>
</form>
</body>
</html>
