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
		<div id='article_subhead'><font size=10> 휴학신청 </font>
			<form action=b1.php method=post>
				<input type="submit" name="변경" value ="변경">
			</form>
		</div>
		<?
		#id가 존재하지않을때= 로그인하지않음
		if(!isset($_SESSION['userid'])){
			echo ("<div id='article_main'><script>alert('정의되지않은 사람');
				history.back();
				</script></div>");
			
		}
		#로그인id가 학생일때
		else if($_SESSION['userid']=="학생"){
			
			echo ("<div id='article_main'>
				<font size='5'>휴학 신청시 유의사항</font>		
				<ul style='width: 800px;'>
				<li>학적 상태가 재학상태에서만 신청이 가능합니다</li>
				</ul>
				</div>");
		#로그인id가 교수일때
		}else if($_SESSION['userid']=="교수"){
			
			echo ("<div id='article_maint'>
				<script>alert('정의되지않은 사람');
				history.back();
				</script></div>
				</div>");
			
		}
		?>
	</body>
</html>
