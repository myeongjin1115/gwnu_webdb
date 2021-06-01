<?
	session_start();
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
	
    $LID = $_POST["choice"];

    $answer = "";

    for($i = 0; $i < 17; $i++) {
        $answer_temp = $_POST[$i];
        if($answer_temp == "") $answer_temp = "0";
        $answer = $answer.$answer_temp;
    }
	
	$query="update class set Answer='$answer'
			where LID=$LID and SID='$_SESSION[userSID]'";
	$result=mysql_query($query, $con);

    echo('
        <script>
            alert("등록되었습니다!");
            window.close();
        </script>
    ');
?>