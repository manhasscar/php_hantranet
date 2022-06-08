<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css"/>
  <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
  <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" type="text/css" href="css/common.css"/>
  <link rel="stylesheet" type="text/css" href="css/read.css"/>
  <style>
 #comments li{
    color: inherit;
    background-color: #FBFBFB;
}
.comment{
	margin-top: 80px ;
}
#comments .comcont {
    display: block;
    margin: 0;
	padding: 10px 0 15px 0;
    border-bottom: solid 1px gray;
}
  .board_img > img{
	  width: 60%;
  }
  </style>
</head>
<body id="top">
<header>
    <?php include "header.php";?>
</header>
<div class="wrapper row3">
	<main class="hoc container clear">
		<div class="content"> 
	<h1>
	<?php
	
    	$board_id = $_GET['board_id'];
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from ".$board_id." where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update ".$board_id." set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from ".$board_id." where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		
		$board = $sql->fetch_array();
		$_SESSION['board_id'] = $board_id;
		$_SESSION['board_idx'] = $bno; 
		
	?>
	</h1>
<!-- 글 불러오기 -->

  <div id="board_read">

	  <div id="board_title">
		  <h2><?php echo $board['title'];?></h2>
		</div>
		   <div id="user_info">
			      <p><?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?></p>
				  <div id="bo_line"></div> 
			</div>
			<div></div>
			
			<?php
			if ($board['file']){
			?>
			<div>
				파일 : <a href="uploads/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
			</div>
			<div class="borad_img">
			<?php
				echo "<br><br><img src = 'uploads/$board[file]' style='width:420px;height:320px;'></img>";
			?>
			</div>
			<?php
			}
			?>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>

	<!-- 목록, 수정, 삭제 -->

	   <div id="bo_ser">
		     <ul>
			        <li><a href="board.php?board_id=<?php echo $board_id;?>">[목록으로]</a></li>
              <?php
			  if (isset($_SESSION['userid']) && $board['id'] == $_SESSION['userid']){
				 
				  ?>
			  	
			        <li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			        <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
			  
              <?php
			}
			elseif(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){?>
				<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			    <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
			<?php
			}
			?>
		    </ul>
	  </div>

  </div>
  <!--- 댓글 불러오기 -->
  <div id="comments" style="margin-top:100px;">
        <h2>댓글목록</h2>
        <ul>
          <li>
            <article>
              
                
				<?php
					$sql3 = mq("select * from ".$board_id."_reply where con_num='".$bno."' order by idx asc");
					while($reply = $sql3->fetch_array()){
				?>
               	<b><?php echo $reply['name'];?></b>
                
             
              <div class="dap_lo">
                <p><?php echo nl2br("$reply[content]"); ?></p>
				<p><?php echo $reply['date']; ?></p>
				<?php
					if (isset($_SESSION['userid']) && $reply['id'] == $_SESSION['userid']){
				?>
				<a class="dat_delete_bt" href="reply_delete.php?idx=<?php echo $reply['idx']; ?>">삭제</a>
             	<?php
				}
				elseif(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){?>
				<a class="dat_delete_bt" href="reply_delete.php?idx=<?php echo $reply['idx']; ?>">삭제</a>
				<?php
				}
				?>	
              </div>
			  <?php }
			  ?>
            </article>
          </li>
        </ul>
	</div>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="reply_ok.php?board_id=<?php echo $board_id;?>&idx=<?php echo $bno; ?>" method="post">
			<input type="hidden" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" value=<?php isset($_SESSION['userid'])?>>
			<div style="margin-top:10px;display:flex; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>
</body>
</html>
