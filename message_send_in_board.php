<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>쪽지 보내기 </title>
<link rel="stylesheet" type="text/css" href="css/board.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
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
<body id="top"> 
	<header>
        <?php include "header.php";?>
    </header>
<?php
	 if(isset($_SESSION['board_idx']))
		 $board_idx=$_SESSION['board_idx'];
   	else $board_idx="";
   	$rv_id = $_GET['rv_id'];
   
	if (!$usernic )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>
<div class="wrapper row3">
<main class="hoc container clear"> 
<div class="content"> 
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
				<li><button type="button" class="btn" onclick="check_input()">보내기</li>
				<li><button type="button" class="btn" onclick="location.href='book_list.php'">취소</button></li>
			</ul>
	    </form>
	</div> 
</div>
</main>
</div>
</body>
</html>
