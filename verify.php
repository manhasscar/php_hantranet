<?php
include ('db_connect.php');
$db;

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // 넘어온 데이터 검증
    $email = $_GET['email'];
    $hash = $_GET['hash']; 
                 
    $search = mq("SELECT email, hash, active FROM user WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
                 
    if($match > 0){
        // 조건에 매치되는 계정있으면 활성화
        mq("UPDATE user SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">계정이 활성화 되었습니다.</div>';
    }else{
        // 이미 활성화됐거나 인자랑 매치되는 계정없거나 아몰라 여튼 뭐가 안된거
        echo '<div class="statusmsg">인증 주소가 잘못되었거나 이미 활성화된 계정입니다..</div>';
    }
                 
}else{
    // 주소에 인자값 안받고 접근 이상하게할때
    echo '<div class="statusmsg">허가되지 않은 접근입니다.</div>';
}

?>