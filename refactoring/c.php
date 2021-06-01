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
		<div id='article_head'><font size=5> 수업관리 </font></div>
		<div id='article_subhead'><font size=10> 복학신청 </font>
			<form action=c1.php method=post> <!--복학신청 -->
			<input type="submit" name="변경" value ="변경">
			</form>
		</div>
	<?	
		#존재하지않을때
		if(!isset($_SESSION['userid'])){	
			echo ("<div id='content'><script>alert('정의되지않은 사람');
				history.back();
				</script></div>");
		}else if($_SESSION['userid']=="학생"){#학생일때	
			echo ("<div id='article_main'>
				<font size='6'>복학 신청시 유의사항</font>
				<ul style='width: 800px;'>
				<li>학적 상태가 휴학상태에서만 신청이 가능합니다</li>
				</ul>
				</div>");		
		}else if($_SESSION['userid']=="교수"){#교수일때 
			
			echo"<script>alert('정의되지않은 사람');
				history.back();
				</script>";	
		}
	?>
	</body>
</html>
