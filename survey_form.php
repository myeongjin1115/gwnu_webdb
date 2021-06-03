<?
	session_start();
	$today = date("Y-m-d");
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
	$query = "select EndDay from term where StartDay < '$today' and '$today' < EndDay";
	$result1 = mysql_query($query, $con);
	if((!mysql_num_rows($result1))){
		echo('
		<script>
		 alert("학기중이 아닙니다.") ;
		 self.close();
		 </script>
		');
	}
	$row=mysql_fetch_array($result1);
	$EndDay1 = strtotime($row[0].'-10 days');
	$EndDay2 = strtotime($row[0]);
	$todayunix = strtotime(date("Y-m-d"));
	if(!($todayunix<$EndDay2&&$todayunix>$EndDay1)){
		echo('
        <script>
            alert("설문조사는 종강 10일전 부터 가능합니다.")
            self.close();
        </script>
        ');
	}	
    if(!$_POST["choice"]) {
        echo('
        <script>
            alert("설문조사를 진행할 강의를 선택해주세요!")
            self.close();
        </script>
        ');
    }
?>

<html>
    
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="survey_func.php" method="post">
        <div id="article_subhead">
            <font size="5" align="center">설문조사</font>
            <input type="submit" value="완료">
        </div>

        <div id="article_main" style="height: 1200px;">
<?php
	
$i=0;
$LID = $_POST["choice"];
echo "<input type = 'hidden' name ='choice' value=$LID>";
echo "<br><br>";
function checkbo($value){
    echo("
    <center>
    아니다&nbsp;
    1&nbsp;<input type = 'radio' name =$value value='1'>&nbsp;
    2&nbsp;<input type = 'radio' name =$value value='2'>&nbsp;
    3&nbsp;<input type = 'radio' name =$value value='3'>&nbsp;
    4&nbsp;<input type = 'radio' name =$value value='4'>&nbsp;
    5&nbsp;<input type = 'radio' name =$value value='5'>&nbsp;
    그렇다</center><br>"
    );	
    $i=$i+1;
}
echo "교수님은 담당과목에 대해 풍부한 전문가적 지식을 가지고 있다.";
checkbo(0);
echo "교수님은 학생의 노력에 대하여 인정해주신다.";
checkbo(1);
echo "교수님은 학생들에 대하여 깊은 관심을 보인다";
checkbo(2);
echo "교수님은 학생들에게 적절한 칭찬과 격려를 해주신다";
checkbo(3);
echo "교수님은 학생들이 최선의 노력을 다하도록 동기부여해 주신다.";
checkbo(4);
echo "나는 공부할 때 도표와 그림 등의 학습 자료에 내포된 의미를 해석하려고 노력한다.";
checkbo(5);
echo "나는 학습할 내용을 무작정 외우기보다 그 내용을 먼저 상세히 고찰해본다.";
checkbo(6);
echo "나는 공부할 때 막히는 부분이 있으면 전후맥락을 파악하여 내용을 추측한다.";
checkbo(7);
echo "나는 과제를 해결할 때 항상 해왔던 방법이 아닌 다른 방법을 찾아본다.";
checkbo(8);
echo "나는 다른 친구보다 독특한 의견을 제시하려고 노력한다.";
checkbo(9);
echo "나는 과제를 해결할 때 남들과 차별화된 방법을 사용한다.";
checkbo(10);
echo "나는 과제를 해결할 때 실제 데이터에 근거하여 결론을 도출한다.";
checkbo(11);
echo "나는 학습 자료 수집할 때 정확한 근거를 토대로 오류가 없는지 찾아본다.";
checkbo(12);
echo "나는 과제해결 시 여러 가지 자료를 근거로 하여 결론을 도출해내는 편이다.";
checkbo(13);
echo "나는 토론할 때 여러 가지 분분한 의견을 하나로 종합하여 새로운 의견을 제시한다.";
checkbo(14);
echo "나는 여러 개의 쟁점을 묶어서 문제해결에 직접적으로 도움이 되는 방안을 제시하려고 노력한다.";
checkbo(15);
echo "나는 여러 사람 의견의 장단점을 따져서 하나의 의견으로 수렴한다.";
checkbo(16);
?>

        </div>
    </form>
</body>

</html>
