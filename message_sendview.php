<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="mystyle.css"/>
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
		$bno = $_GET['num']; /* bno함수에 message idx값을 받아와 넣음*/
		$sql = mq("select * from message where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		
		$message = $sql->fetch_array();
		$send_id=$message['send_id'];
		$_SESSION['message_idx'] = $bno; 
		
	?>
	<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
  <div id="board_read">
	  	<div id="msg_header">
					<p>받는사람  <?php echo $message['rv_id'];?> </p>
					<p>보낸시간  <?php echo $message['regist_day'];?> </p>
			<div id="bo_line"></div> 
		</div>
		<div id="bo_content">
			<?php echo nl2br("$message[content]"); ?>
		</div>
		<br><br><br>
		<div id="bo_line"></div> 
 </div>
</div>
</div>

	<!-- 목록, 수정, 삭제 -->

	    <div id="bo_ser">
		     <ul>
			     <li>
                     <a href="my_message_result.php?info=message&board=send">[목록으로]</a>
                </li>
				<li>
					<a href="message_delete.php?board=send">[삭제]</a>
				</li>
		    </ul>
		</div> 
		</div>	
</div>
			 
</body>
</html>