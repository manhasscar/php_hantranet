<?php
 	include ('db_connect.php');
	 if(isset($_SESSION['user_nic'])) $usernic=$_SESSION['user_nic'];
	 else $usernic="";
	 if(isset($_SESSION['board_idx']))
	  $board_idx=$_SESSION['board_idx'];
	else $board_idx="";
	
?>

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>쪽지 보내기 </title>
<link rel="stylesheet" type="text/css" href="css/board.css">
<script>
  function check_input() {
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body>
<header>
        <?php include "header.php";?>
    </header>
<?php
	if (!$usernic )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
	else{
		$sql=mq("select * from book_board where idx='".$board_idx."'"); 
		$board = $sql -> fetch_array();
		$rv_id= $board['nic_name'];
	}
?>
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		쪽지 보내기 
		</h3>
	    <form  name="board_form" method="post" action="message_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">보내는 사람 : </span>
					<input type="hidden" name="send_id" value="<?php echo $usernic;?>">
					<span class="col2">
						<?=$usernic?>
					</span>
	    		</li>	   
                <li>
	    			<span class="col1">받는 사람 : </span>
					<input type="hidden" name="rv_id" value="<?php echo $rv_id;?>">
	    			<span class="col2">
						<?=$rv_id?>
					</span>
	    		</li>
                <li>
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
						<textarea name="content"></textarea>
					</span>
	    		</li>
			</ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">보내기</li>
				<li><button type="button" onclick="location.href='book_list.php'">취소</button></li>
			</ul>
	    </form>
	</div> 
</setion>
</body>
</html>
