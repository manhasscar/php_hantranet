<?php
  include ('db_connect.php');

  $message_idx = $_SESSION['message_idx'];

  if(isset($_POST["item"]))
  $message_num=$_POST["item"];
  else $message_num ="";
  if(isset($_GET["board"]))
  $board = $_GET["board"];
  else $board = "";

  $sql = mq("delete from message where idx='$message_idx';");

  if($message_num){

    for($i=0; $i<count($_POST["item"]); $i++){
      $num = $_POST["item"][$i];

        $sql = mq("delete from message where idx ='$num';");

    }  
    if($board == "send"){     
  
  echo "
       <script>
           location.href = 'my_message_result.php?info=message&board=send';
       </script>
     ";
  }
  else {
  echo "
  <script>
      location.href = 'my_message_result.php?info=message&board=rv';
  </script>
";
  }
}
  if($sql){
    
    if($board == "send"){
    echo "<script>alert('쪽지가 삭제되었습니다.');
    location.href='my_message_result.php?info=message&board=send';</script>";
    }else{
      echo "<script>alert('쪽지가 삭제되었습니다.');
      location.href='my_message_result.php?info=message&board=rv';</script>";
    }
}else{
    echo "<script>alert('쪽지 삭제에 실패했습니다.');
    history.back();</script>";
}


?>