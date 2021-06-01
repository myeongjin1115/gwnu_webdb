<?
    if(!isset($_SESSION['userid'])) {
        echo('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "학생"){
        echo('
        <script>
            alert("교수만 이용 가능합니다.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "교수") {
        echo('
        <!-- article header -->
        <div id="article_head">
            <font size="5">성적관리</font>
        </div>

        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">성적부여</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="set_score_subjects.php" method="post">
                            <input type="submit" name="get_subject" value="조회">
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <!-- article main -->
        <div id="article_main">
        <center>조회버튼을 누르면 교과목이 조회됩니다.</center>
        </div>
    ');
    }
?>