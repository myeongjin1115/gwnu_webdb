<?
if(!isset($_SESSION['userid'])){
echo('	
<center>
	<form action="login.php" method="POST">
		<div id="title"><font size="6"><a href="/main.html"> �������ִ� �л����� �ý��� </a></font></div>
		<div id="log">
			<font size="2">
				ID : <input type="text" size="12" name="ID" required>&nbsp&nbsp
				PW : <input type="password" size="12" name="PW" required>
			</font>
		</div>
		<div id="logsubmit"><input type="submit" value="�α���"></div>
	</form>
</center>
');
}else{
	echo('
<center>
	<form action="logout.php" method="POST">
		<div id="title"><font size="6"><a href="/main.html"> �������ִ� �л����� �ý��� </a></font></div>
		<div id="log"><font size="2"> "'.$_SESSION["username"].'"�� �ȳ��ϼ���.</font></div>
		<div id="logsubmit"><input type="submit" value="�α׾ƿ�"></div>
	</form>
</center>');
}
?>