<?
if(!isset($_SESSION['userid'])){
echo('	
<center>
	<form action="login.php" method="POST">
		<div id="title"><font size="6"><a href="/main.html"> 강릉원주대 학사정보 시스템 </a></font></div>
		<div id="log">
			<font size="2">
				ID : <input type="text" size="12" name="ID" required>&nbsp&nbsp
				PW : <input type="password" size="12" name="PW" required>
			</font>
		</div>
		<div id="logsubmit"><input type="submit" value="로그인"></div>
	</form>
</center>
');
}else{
	echo('
<center>
	<form action="logout.php" method="POST">
		<div id="title"><font size="6"><a href="/main.html"> 강릉원주대 학사정보 시스템 </a></font></div>
		<div id="log"><font size="2"> "'.$_SESSION["username"].'"님 안녕하세요.</font></div>
		<div id="logsubmit"><input type="submit" value="로그아웃"></div>
	</form>
</center>');
}
?>