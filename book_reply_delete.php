<?php
include ("db_connect.php");


$book_num = $_GET['num'];
$rno = $_GET['idx']; 

	
$sql = mq("delete from book_board_reply where idx='".$rno."'"); 
?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.href = "book_read.php?num=<?php echo $book_num; ?>";</script>
