<?php
  session_start();

  unset($_SESSION['userid']);
  session_destroy();
  echo"
  <script>
    location.href='index1.php'
    </script>";
?>
