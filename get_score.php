<?
    if(!isset($_SESSION['userid'])) {
        echo('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else {
        echo('
        <!-- article header -->
        <div id="article_head">
            <font size="5">성적관리</font>
        </div>

        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">성적확인</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="get_score_func.php" method="post">
                            <input type="submit" name="get_score" value="조회">
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <!-- article main -->
        <div id="article_main">
        <center>조회버튼을 누르면 성적이 확인됩니다.</center>
        </div>
    ');
    }
?>