<?php
  include ('db_connect.php');
  include ('send_mail.php');
  $id = $_POST['id'];
  $nic = $_POST['name'];
  $pw = $_POST['passw'];
  $email = $_POST['email'];
  $hash = md5( rand(0,1000) );
  $date=date("Y-m-d H:i:s");
  $sql = mq("insert into user (id, nic_name, pw, email, hash, user_date) values ('".$id."','".$nic."','".$pw."','".$email.'@gm.hannam.ac.kr'."','".$hash."','".$date."')");

  $msg = "링크를 클릭해 계정을 활성화 해 주세요.:
  http://localhost/site/verify.php?email=".$email."@gm.hannam.ac.kr"."&hash=".$hash."";

  mailer("웹사이트관리자","vvs234@naver.com","$email@gm.hannam.ac.kr","한트라넷 인증메일","$msg");
  echo "
  <script>
    location.href='login.php'
  </script>";
?>
