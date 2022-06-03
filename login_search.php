<?php

  //$connect = mysqli_connect("localhost","root","","site_db");
  include ('db_connect.php');

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


  $sql = mq("select * from user where id='$id'");
  //$result = mysqli_query($db,$sql);
  $num1 = mysqli_num_rows($sql);

  $sql = mq("select * from user where id='$id' and pw='$pw'");
  //$result = mysqli_query($db,$sql);
  $num2 = mysqli_num_rows($sql);

  $sql = mq("select * from user where id='$id' and pw='$pw' and active='1'");
  //$result = mysqli_query($db,$sql);
  $num3 = mysqli_num_rows($sql);

  
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
  elseif (!$num3) {
    echo "
    <script>
      window.alert('활성화 되지 않은 계정입니다. 이메일 인증을 진행 해 주세요')
      history.go(-1)
      </script>";
  }
  else {
    session_start();
    $user = mysqli_fetch_array($sql);
    $_SESSION['userid'] = $id;
    $_SESSION['user_nic'] = $user[2];
    echo "
    <script>
      location.href='index1.php'
    </script>";
  }
}

?>

<meta charset="utf-8">
