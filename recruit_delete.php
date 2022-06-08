<?php
  include ('db_connect.php');

  if(isset($_GET['idx']))
  $recruit_idx = $_GET['idx'];
  else $recruit_idx="";
  if(isset($_POST['item']))
  $mypage_num = $_POST['item']; //게시글 번호 
  else
  $mypage_num ="";

  $sql = mq("delete from recruit_board where idx='$recruit_idx';");
  $sql2 = mq("delete from book_board_reply where con_num='$recruit_idx';");

  if($mypage_num){
  for($i=0; $i<count($_POST["item"]); $i++){
    $num = $_POST["item"][$i];

    $sql = mq("select * from recruit_board where idx = $num");
    $row = mysqli_fetch_array($sql);

    $copied_name = $row["file_copied"];

    if ($copied_name)
    {
        $file_path = "./uploads/".$copied_name;
        unlink($file_path);
    }

    $sql = mq("delete from recruit_board where idx='$num';");
    $sql2 = mq("delete from recruit_board_reply where con_num='$num';");
}       

echo "
     <script>
         location.href = 'my_page_result.php?info=content&board=recruit';
     </script>
   ";
}
  
  if($sql&&$sql2){
    
    echo "<script>alert('게시글이 삭제되었습니다.');
    location.href='recruit.php';</script>";
}else{
    echo "<script>alert('게시글 삭제에 실패했습니다.');
    history.back();</script>";
}


?>