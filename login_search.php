<?php

  $connect = mysqli_connect("localhost","root","","site_db");
  

  $id = $_POST['userid'];
  $pw = $_POST['userpw'];

  if (!$id) {
    echo "
    <script>
      window.alert('아이디를 입력하세요');
      history.go(-1);
      </script>";
  }
  elseif (!$pw) {
    echo "
    <script>
      window.alert('패스워드를 입력하세요')
      history.go(-1)
      </script>";

  }
  else {


  $sql = "select * from user where id='$id'";
  $result = mysqli_query($connect,$sql);
  $num1 = mysqli_num_rows($result);

  $sql = "select * from user where id='$id' and pw='$pw'";
  $result = mysqli_query($connect,$sql);
  $num2 = mysqli_num_rows($result);
  if (!$num1) {
    echo "
    <script>
      window.alert('아이디/비밀번호가 틀렸습니다 다시 입력하세요')
      history.go(-1)
      </script>";
  }
  elseif (!$num2) {
    echo "
    <script>
      window.alert('아이디/비밀번호가 틀렸습니다 다시 입력하세요')
      history.go(-1)
      </script>";
  }
  else {
    session_start();
    $user = mysqli_fetch_array($result);
    $_SESSION['userid'] = $id;
    $_SESSION['user_nic'] = $user[2];
    echo "
    <script>
      location.href='index.php'
    </script>";
  }
}
mysql_close($connect);
?>

<meta charset="utf-8">
