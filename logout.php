<?php
    session_start();

    echo('
    <script>
        alert("�α׾ƿ��ϼ̽��ϴ�.");
        window.location = "main.html";
    </script>
    ');
    
    session_unset();
    session_destroy();
?>