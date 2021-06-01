<?
	session_start();
	
	global $con;
	global $table;
    global $errormsg;
	if($_POST[choice]==''){
		echo("<script>self.close();</script>");
	}
	$con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);
    $table="Lecture";
			$query="select * from $table  where LID='$_POST[choice]'";
			$result=mysql_query($query, $con);
			$row=mysql_fetch_array($result);
	$LID=$row[0];
	$LNAME=$row[1];
	$Class=$row[2];
	$Person= $row[3];
	$PID=$row[4];
	$Day=$row[5];
	$start=$row[6];
	$End=$row[7];
	$credit=$row[8];
	$room=$row[9];
	$LPID=$row[10];
	
	$_SESSION['code']=$LID;
	if($_POST['수정']==삭제){
	
	
	
	global $con;
	global $table;
    global $errormsg;
	if($_SESSION['code']==''){
		echo("<script>self.close();</script>");
	}
	$con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);
    $table="Lecture";
	$query="delete from $table  where LID='$_SESSION[code]'";
	$result=mysql_query($query, $con);
	
	unset($_SESSION['code']);
	echo("<script>self.close();</script>");
	}
?>
<html><head>

 <style>
  input[type=text]{
  
  font-size:20px;
}</style>
<link rel="stylesheet" type="text/css" href="style.css">
 </head>
<body>
<form action="d2-1.php" method=post>
<div id='article_main'>
	<center>
	강의 계획서 수정/삭제
	<br><br><br>
	교수이름<input type = 'text' name='PNAME' value="<? echo $_SESSION['username'] ?>"readonly size='5'>&nbsp;&nbsp;&nbsp; 
	강의코드<input type = 'text' name ='LID'  value="<? echo $LID ?>" size='10'>&nbsp;&nbsp;&nbsp;
	강의명<input type = 'text' name ='LNAME'  value="<? echo $LNAME ?>" size='20' value="<?  ?>">&nbsp;&nbsp;&nbsp;<br>
	
		전공<input type = 'radio' name ='Classification' value="0" <? if($Class==0){echo("checked");}?>>&nbsp;&nbsp;&nbsp;
		비전공<input type = 'radio' name ='Classification' value="1" <? if($Class==1){echo('checked');}?>>&nbsp;&nbsp;&nbsp;<br>
	
		
	
	정원<input type = 'text' name ='Personnel' value="<? echo $Person ?>"  size='2'>&nbsp;&nbsp;&nbsp;
	요일
	<select name='DayOfWeek'>
    <option value="0" <? if($Day==0){echo 'selected';}?> >월</option>   
    <option value="1" <? if($Day==1){echo 'selected';}?> >화</option> 
    <option value="2" <? if($Day==2){echo 'selected';}?> >수</option> 
	<option value="3" <? if($Day==3){echo 'selected';}?> >목</option> 
	<option value="4" <? if($Day==4){echo 'selected';}?> >금</option> 
	<option value="5" <? if($Day==5){echo 'selected';}?> >토</option> 
	<option value="6" <? if($Day==6){echo 'selected';}?> >일</option>   
	</select>
	시작시간<select name='StartTime'>
    <option value="0" <? if($start==0){echo 'selected';}?>>0교시</option>   
    <option value="1" <? if($start==1){echo 'selected';}?> >1교시</option> 
    <option value="2" <? if($start==2){echo 'selected';}?>>2교시</option> 
	<option value="3" <? if($start==3){echo 'selected';}?>>3교시</option> 
	<option value="4" <? if($start==4){echo 'selected';}?>>4교시</option> 
	<option value="5" <? if($start==5){echo 'selected';}?>>5교시</option> 
	<option value="6" <? if($start==6){echo 'selected';}?>>6교시</option>
	<option value="7" <? if($start==7){echo 'selected';}?>>7교시</option>   
	<option value="8" <? if($start==8){echo 'selected';} ?>>8교시</option>   
	<option value="9" <? if($start==9){echo 'selected';}?>>9교시</option>   
	<option value="10" <? if($start==10){echo 'selected';} ?>>10교시</option>   
	<option value="11" <? if($start==11){echo 'selected';} ?>>11교시</option>   
	<option value="12" <? if($start==12){echo 'selected';} ?>>12교시</option>   
	<option value="13" <? if($start==13){echo 'selected';} ?>>13교시</option>   
	<option value="14" <? if($start==14){echo 'selected';}?>>14교시</option>   
	<option value="15" <? if($start==15){echo 'selected';} ?>>15교시</option>   
	<option value="16" <? if($start==16){echo 'selected';}?>>16교시</option>   
	<option value="17" <? if($start==17){echo 'selected';} ?>>17교시</option>   
	<option value="18" <? if($start==18){echo 'selected';} ?>>18교시</option> 
	<option value="19" <? if($start==19){echo 'selected';} ?>>19교시</option>   	
	</select>
	종료시간<select name='EndTime'>
    <option value="0" <? if($End==0){echo 'selected';} ?>>0교시</option>   
    <option value="1" <? if($End==1){echo 'selected';} ?> >1교시</option> 
    <option value="2" <? if($End==2){echo 'selected';} ?>>2교시</option> 
	<option value="3" <? if($End==3){echo 'selected';} ?>>3교시</option> 
	<option value="4" <? if($End==4){echo 'selected';} ?>>4교시</option> 
	<option value="5" <? if($End==5){echo 'selected';} ?>>5교시</option> 
	<option value="6" <? if($End==6){echo 'selected';} ?>>6교시</option>
	<option value="7" <? if($End==7){echo 'selected';} ?>>7교시</option>   
	<option value="8" <? if($End==8){echo 'selected';} ?>>8교시</option>   
	<option value="9" <? if($End==9){echo 'selected';} ?>>9교시</option>   
	<option value="10" <? if($End==10){echo 'selected';} ?>>10교시</option>   
	<option value="11" <? if($End==11){echo 'selected';} ?>>11교시</option>   
	<option value="12" <? if($End==12){echo 'selected';} ?>>12교시</option>   
	<option value="13" <? if($End==13){echo 'selected';} ?>>13교시</option>   
	<option value="14" <? if($End==14){echo 'selected';} ?>>14교시</option>   
	<option value="15" <? if($End==15){echo 'selected';} ?>>15교시</option>   
	<option value="16" <? if($End==16){echo 'selected';} ?>>16교시</option>   
	<option value="17" <? if($End==17){echo 'selected';} ?>>17교시</option>   
	<option value="18" <? if($End==18){echo 'selected';} ?>>18교시</option> 
	<option value="19" <? if($End==19){echo 'selected';} ?>>19교시</option>   	  
	</select><br>
	취득학점<input type = 'text' name ='Credit'  value="<? echo $credit ?>" size='2'>&nbsp;&nbsp;&nbsp;
	강의실<input type = 'text' name ='Room' value="<? echo $room ?>" size='5'>&nbsp;&nbsp;&nbsp;
	강의계획서<input type = 'text' name ='LPID'  value="<? echo $Person ?>" size='30'>&nbsp;&nbsp;&nbsp;
	<br><input type="submit" onclick=opener.parent.location.reload() name="변경" value ="변경">
	</center>
	
</form>
</div>


</body>
</html>
