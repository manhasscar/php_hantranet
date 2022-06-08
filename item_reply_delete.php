<?php
include ("db_connect.php");


$item_num = $_GET['num']; //게시글 번호
$ino = $_GET['idx']; //댓글 번호

	
$sql = mq("delete from item_board_reply where idx='".$ino."'"); 
?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.href = "item_read.php?num=<?php echo $item_num; ?>";</script>