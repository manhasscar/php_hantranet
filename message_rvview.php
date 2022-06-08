<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" type="text/css" href="css/common.css"/>
  <link rel="stylesheet" type="text/css" href="css/read.css"/>
  <style>
  #bo_ser {
    font-size:14px;
    color:black;
    position: relative;
    right: 0;
	float:right;
  }

#re_content {
	width:80%;
	height: 56px;
  resize: none;
}
  </style>
</head>
<body>
<header>
        <?php include "header.php";?>
    </header>
	<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
	<?php
		$bno = $_GET['num']; /* bno함수에 idx값을 받아와 넣음*/
		$sql = mq("select * from message where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		
		$message = $sql->fetch_array();
		$send_id=$message['send_id'];
		$_SESSION['message_idx'] = $bno; 
		
	?>
  <div id="board_read">
	  	<div id="msg_header">
                <p>보낸사람  <?php echo $message['send_id']; ?></p>
				<p>받은시간  <?php echo $message['regist_day'];?> </p>
			<div id="bo_line"></div> 
		</div>
		<div id="bo_content">
			<?php echo nl2br("$message[content]"); ?>
		</div>
		<br><br><br>
		<div id="bo_line"></div> 
	<!--- 답장 입력 폼 -->
	<div class="dap_ins">
		<form method="post" action="message_reply.php" enctype="multipart/form-data">
			<input type="hidden" name="send_id" id="send_id" class="send_id" size="15" placeholder="받은사람" value="<?php echo $user_nic;?>">
			<input type="hidden" name="rv_id" id="rv_id" class="rv_id" size="15" placeholder="보낸사람" value="<?php echo $send_id;?>">
			<div style="margin-top:10px;display:flex; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">보내기</button>
			</div>
		</form>
	</div>

<?php 
$sql = mq("update message set read_ok = 1 where idx='".$bno."'");
?>

	<!-- 목록, 수정, 삭제 -->
	
	     <div id="bo_ser">
		     <ul>
			     <li>
                     <a href="my_message_result.php?info=message&board=rv">[목록으로]</a>
                </li>
			    <li>
					<a href="message_delete.php?board=rv">[삭제]</a>
				</li>
			
		    </ul>
	  </div>


  </div>
</div>

</body>
</html>
