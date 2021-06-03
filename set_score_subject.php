<?php
    session_start();
    $id = $_SESSION["userPID"];
    $subject = $_POST["subject"];
    //echo $subject;
    //$subject = 'WebDB';
    $num = $_POST["aa"];
    echo $num;
    $con = mysql_connect('localhost', 'qwerty', '1234') or die("MYSQL ?? 楷搬 Error");
    mysql_select_db('webdb', $con);
    $query = "select student.SNAME, student.Grade, student.SID 
	from lecture,student,class
	where lecture.PID = '$id' and class.LID= lecture.LID and 
	student.SID = class.SID and '$subject' = lecture.LID" ;
	
	

    $result = mysql_query($query, $con);
    $z = 0;
	while($row=mysql_fetch_array($result)) {
	$name[$z]=$row[0];
	$grade[$z]=$row[1];
	$SID[$z] = $row[2];
	$z=$z+1;
	}
    //echo $name[1];
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>   <!-- header -->
    <div id="header">
        <?php include "header.php";?>
    </div>

    <!-- navigator -->
    <div id="nav">
        <?php include "nav.php";?>
    </div>

    <!-- article -->
    <!-- article header -->
    <div id="article_head">
        <font size="5">과목선택</font>
    </div>

    <!-- article subheader -->
    <div id="article_subhead">
        <font size="5">과목선택</font>
    </div>

    <!-- article main -->
    <div id="article_main">
        <form action="set_score_subject_func.php" method="post">
            <p style = "text-align:right;"><input type="submit" value="과목선택"></p>
            <center>
            <?php 
				;
                for($i = 0 ; $i < $z; $i++){
                    echo("$name[$i]"."&nbsp;&nbsp;"."$grade[$i]"."&nbsp;&nbsp;"."$SID[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;");

                    echo("<SELECT name='score$i' size=1>
                        <option value='6'>A+</option>
                        <option value='5'>A0 </option>
                        <option value='4'>B+</option>
                        <option value='3'>B0</option>
                        <option value='2'>C+</option>
                        <option value='1'>C0</option>
                        <option value='0'>F</option>
                        </SELECT>");
                    echo("<br>");
                }
                        
                for($a = 0 ; $a < $z; $a++)
                    echo "<input type = 'text' style='display:none' name = 'SID$a' value = '$SID[$a]'>";	
            ?>

            <input type = 'text' style='display:none' name = 'num' value = <?php echo $i;?> >
            <input type = 'text' style='display:none' name = 'subject' value = <?php echo $subject; ?> >
            </center>
        </form>
    </div>
</body>

</html>