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
			<form action=c1.php method=post> <!--���н�û -->
			<input type="submit" name="����" value ="����">
			</form>
		</div>
	<?	
		#��������������
		if(!isset($_SESSION['userid'])){	
			echo ("<div id='content'><script>alert('���ǵ������� ���');
				history.back();
				</script></div>");
		}else if($_SESSION['userid']=="�л�"){#�л��϶�	
			echo ("<div id='article_main'>
				<font size='6'>���� ��û�� ���ǻ���</font>
				<ul style='width: 800px;'>
				<li>���� ���°� ���л��¿����� ��û�� �����մϴ�</li>
				</ul>
				</div>");		
		}else if($_SESSION['userid']=="����"){#�����϶� 
			
			echo"<script>alert('���ǵ������� ���');
				history.back();
				</script>";	
		}
	?>
	</body>
</html>
