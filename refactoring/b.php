<?
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>

		<div id='header'><?php include "header.php";?></div>
		<div id='nav'>
			<?php include "nav.php";?>
		</div>

		<div id='article_head'><font size=5> �������� </font></div>
		<div id='article_subhead'><font size=10> ���н�û </font>
			<form action=b1.php method=post>
				<input type="submit" name="����" value ="����">
			</form>
		</div>
		<?
		#id�� ��������������= �α�����������
		if(!isset($_SESSION['userid'])){
			echo ("<div id='article_main'><script>alert('���ǵ������� ���');
				history.back();
				</script></div>");
			
		}
		#�α���id�� �л��϶�
		else if($_SESSION['userid']=="�л�"){
			
			echo ("<div id='article_main'>
				<font size='5'>���� ��û�� ���ǻ���</font>		
				<ul style='width: 800px;'>
				<li>���� ���°� ���л��¿����� ��û�� �����մϴ�</li>
				</ul>
				</div>");
		#�α���id�� �����϶�
		}else if($_SESSION['userid']=="����"){
			
			echo ("<div id='article_maint'>
				<script>alert('���ǵ������� ���');
				history.back();
				</script></div>
				</div>");
			
		}
		?>
	</body>
</html>
