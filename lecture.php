<?php
    if(!isset($_SESSION["userid"])) {
        echo('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "학생") {
        echo('
        <script>
            alert("접근 권한이 없습니다!");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "교수") {
        echo('
            <div id="article_head">
                <font size="5">강의관리</font>
            </div>

            <div id="article_subhead">
                <font size="5">강의관리</font>
                <table align="right">
                    <tr>
                        <td>
                            <form action="lecture_lookup.php" method="post">
                                <input type="submit" name="lookup" value="조회">&nbsp;&nbsp;&nbsp;&nbsp;
                            </form>
                        </td>
                        <td>
                            <form action="lecture_create.php" target="_blank" method="post">
                                <input type="submit" name="create" value="등록">&nbsp;&nbsp;&nbsp;&nbsp;
                            </form>
                        </td>
            <form action="lecture_update_delete.php" target="_blank" method="post">
                        <td>
                            <input type="submit" name="update_delete" value="수정">&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            <input type="submit" name="update_delete" value="삭제">&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </div>

            <div id="article_main">
                
            </div>
            </form>
        ');
    }
?>
