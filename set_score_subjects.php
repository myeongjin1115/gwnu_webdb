<?php
    session_start();
    $id = $_SESSION["userPID"];
    $con = mysql_connect('localhost', 'qwerty', '1234') or die("MYSQL ���� ���� Error");
    mysql_select_db('webdb', $con);
    $query = "select LNAME, LID from Lecture where PID = '$id'";

    $result = mysql_query($query, $con);

    $subject_count=0;
	while($row = mysql_fetch_array($result)) {
		$subject[$subject_count]=$row[0];
		$subject_code[$subject_count] = $row[1];
		$subject_count=$subject_count+1;
	}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <!-- header -->
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
        <font size="5">��������</font>
    </div>

    <!-- article subheader -->
    <div id="article_subhead">
        <font size="5">�����ο�</font>
    </div>

    <!-- article main -->
    <div id="article_main">
	    <form action = "set_score_subject.php" method = "POST">
            <p style = "text-align:right;"><input type="submit" value="������"></p>
            <center>    
	        <?php
                echo "<br>";
                echo "<br>";
                for($i = 0 ; $i < $subject_count; $i++){
                    echo "$subject[$i]"."&nbsp;&nbsp;&nbsp;"."$subject_code[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<input type = 'radio' name = 'subject' value ='$subject[$i]'>";
                    echo "<br>";                            
                }
	        ?>
            </center>			 
        </form>
    </div>
</body>

</html>