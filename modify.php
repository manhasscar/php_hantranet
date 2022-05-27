<!--- 게시글 수정 -->

<?php
	include ('db_connect.php');
  $board_id = $_SESSION['board_id'];
  $board_idx = $_SESSION['board_idx'];
	$bno = $_GET['idx'];
	$sql = mq("select * from ".$board_id." where idx='$bno';");
	$board = $sql->fetch_array();
    
 ?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<style>
  #board_write {
    width:900px;
    position:relative;
    margin:0 auto;
  }
  #write_area {
    margin-top:70px;
    font-size:14px;
  }
  #in_title {
    margin-top:30px;
  }
  #in_title textarea {
    font-weight:bold;
    font-size:26px;
    color:#333;
    width: 900px;
    border:none;
    resize: none;
  }
  .wi_line {
    border:solid 1px lightgray;
    margin-top:10px;
  }
  #in_content {
    margin-top:10px;
  }
  #in_content textarea {
    font:14px;
    color:#333;
    width: 900px;
    height: 400px;
    resize: none;
  }
  .bt_se {
    margin-top:20px;
    text-align:center;
  }
  .bt_se button {
    width:100px;
    height:30px;
  }
  button{
      background-color: white;
      padding: 2px;
      border: solid 1px gray;
    }
</style>
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <!--<div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php// echo $board['name']; ?></textarea>
                    </div>-->
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                   
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>