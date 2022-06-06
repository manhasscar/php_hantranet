<?php
  session_start();

  unset($_SESSION['userid']);
  session_destroy();
  echo"
  <script>
    location.href='index.php'
    </script>";
?>
