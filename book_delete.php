<?php
  include ('db_connect.php');

  if(isset($_SESSION['board_idx']))
  $board_idx = $_SESSION['board_idx'];
  else $board_idx = "";
  if(isset($_SESSION['board_id']))
  $board_id = $_SESSION['board_id'];
  else $board_idx = "";
  if(isset($_GET['idx'])) 
  $book_idx = $_GET['idx'];
  else $book_idx="";
  if(isset($_POST['item']))
  $mypage_num = $_POST['item'];
  else $mypage_num ="";

  if($board_idx && $board_id){
  $sql = mq("delete from book_board where idx='$book_idx';");
  $sql2 = mq("delete from book_board_reply where con_num='$book_idx';");
  }
  
  if($mypage_num){
    for($i=0; $i<count($_POST["item"]); $i++){
      $num = $_POST["item"][$i];
  
      $sql = mq("select * from book_board where idx = $num");
      $row = mysqli_fetch_array($sql);
  
      $copied_name = $row["file_copied"];
  
      if ($copied_name)
      {
          $file_path = "./uploads/".$copied_name;
          unlink($file_path);
      }
  
      $sql = mq("delete from book_board where idx='$num';");
      $sql2 = mq("delete from book_board_reply where con_num='$book_idx';");
  }       
  
  echo "
       <script>
           location.href = 'my_page_result.php?info=content&board=book';
       </script>
     ";
  }
  if($sql&&$sql2){
    
    echo "<script>alert('게시글이 삭제되었습니다.');
    location.href='book_list.php';</script>";
  }else{
      echo "<script>alert('게시글 삭제에 실패했습니다.');
      history.back();</script>";
  }
  
  
  ?>

?>