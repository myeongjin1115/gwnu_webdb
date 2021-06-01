<?php
    session_start();
    
    $_SESSION['id'] = $_POST['ID'];
    $_SESSION['password'] = $_POST['PW'];

    $user_id = $_SESSION['id'];
    $user_password = $_SESSION['password'];

    function login($id, $password) {
		if($_SESSION['id'] == null || $_SESSION['password'] == null) {
			return false;
		}

        if(!strchr($id, "A")) {
            $database="webdb";
	        $table = "Student";
            $con=mysql_connect('localhost', 'qwerty', '1234');
            mysql_select_db($database,$con);
            $query="select SID, password, SNAME from Student where SID='$id'";
            $result =mysql_query($query, $con);
    	 
	        $data = mysql_fetch_row($result);
            $db_id=$data[0];
            $db_password = $data[1];
			$db_name = $data[2];
			
            if($db_id==$_SESSION['id'] && $db_password === $_SESSION['password']) {
                $_SESSION['userid']="학생";
                $_SESSION['userSID']=$db_id;
                $_SESSION['username']=$db_name;
                return 1;
            }
            else {
                return false;
            }
        }
        else {
            $database="webdb";
 	        $table = "Professor";
            $con=mysql_connect('localhost', 'qwerty', '1234'); 
            mysql_select_db($database,$con);
            $query="select PID, password,PNAME from Professor where PID='$id'";
            $result =mysql_query($query, $con);
			$data = mysql_fetch_row($result);
            $db_id=$data[0];
            $db_password = $data[1];
			$db_name = $data[2];
            if($db_id==$_SESSION['id'] and $db_password === $_SESSION['password']) {
                $_SESSION['userid']="교수";
                $_SESSION['userPID']=$db_id;
                $_SESSION['username']=$db_name;
                return 2;
            }
            else {
                return false;
            }
        }
    }

    $login_result = login($user_id, $password);
    echo "$login_result";

    if($login_result == 1){
        echo "<script>alert('로그인성공(학생)');history.back(); </script>";
    }
    else if($login_result == 2){
        echo "<script>alert('로그인성공(교수)');history.back();</script> ";
    }

    else if($login_result == false){
        echo "<script>alert('?로그인실패.');history.back(); </script>";
    }
?>